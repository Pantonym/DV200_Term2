<?php

// Only run if both the form has been submitted, and the image has been uploaded
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
    include "db.php";

    // --Get the page we came from
    $page = $_POST['page'];
    // --Get the id of the selected element
    $id = $_POST['ID_DB'];

    // --Generate the database name, as well as the specific table's entity ID name
    switch ($page) {
        case 'receptionists':
            $DB_Name = 'receptionist';
            $ID_Name = 'RecepID';
            break;

        case 'doctors':
            $DB_Name = 'doctors';
            $ID_Name = 'DoctorID';
            break;

        case 'patients':
            $DB_Name = 'patients';
            $ID_Name = 'PatientID';
            break;
    }

    // --display the image in a way thats readable by humans (print_r) (Used for debugging in the case of an error)
    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";

    // --Get data about the image
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    // --If there is no error
    if ($error == 0) {
        // ----Test image size (It can't be larger than 600kb)
        if ($img_size > 600000) {
            // ------Error message if the image is too large
            $error = "Sorry, your file is too large.";
            header("Location: ../" . $page . ".php?error=$error");

        } else {

            // ----Returns what type of file it is (ex. jpg, txt, etc.)
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            // ----Converts the extension to a lower case for testing consistency
            $img_ex_lc = strtolower($img_ex);
            // ----Which extensions are allowed
            $allowed_exs = array("jpg", "jpeg", "png");

            // ----Tests if the extension is in the array of allowed extensions
            if (in_array($img_ex_lc, $allowed_exs)) {
                // ------uniqid returns a name based on the current microtime, making it completely unique. "IMG-" is the prefix, and 'true' means it will be MORE unique by being 23 characters long and not 13
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                // ------Moves the image to the specified folder
                $img_upload_path = 'profiles/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // ------Inserts the image name into the database
                $sql = "UPDATE $DB_Name SET ProfileImg = '$new_img_name' WHERE $ID_Name = '$id'";

                mysqli_query($conn, $sql);
                header("Location: ../" . $page . ".php");

            } else {
                // ----If the user uploads an incorrect file type
                $error = "You can't upload files of this type";
                header("Location: ../" . $page . ".php?error=$error");
            }
        }
    } else {
        // --If the error is unknown
        $error = "unknown error occurred!";
        header("Location: ../" . $page . ".php?error=$error");
    }

} else {
    header("Location: ../" . $page . ".php");
}