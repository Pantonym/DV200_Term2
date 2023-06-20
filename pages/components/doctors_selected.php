<?php
error_reporting(0);

include 'actions/db.php';

// Find wether or not the current user is a superuser
$sql_test = "SELECT * FROM receptionist WHERE SignedIn = '1'";
$result_test = $conn->query($sql_test);

while ($row_test = $result_test->fetch_assoc()) {

    if ($row_test['Rank'] == 'Head Receptionist') {
        $SuperUser_Global = true;
    } else if ($row_test['Rank'] == 'Receptionist') {
        $SuperUser_Global = false;
    }

}

// Get the ID of whichever entity was just clicked
$id = $_GET['id'];

if ($SuperUser_Global == true) {

    // --If nothing has been selected yet, display this entity:
    if ($id == null) {

        // ----If the page is not in "update mode", display this:
        if (isset($_GET['update']) == false) {
            // ----sql Query to get a default entity's data
            $sql = "SELECT * FROM doctors WHERE Specialization = 'Cardiology'";
            $header_return = '../doctors.php';

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                // ------Get teh relevant variables
                $Selected_Name = $row["Name"];
                $Selected_Surname = $row["Surname"];

                $Selected_Age = $row["Age"];
                $Selected_Gender = $row["Gender"];

                $Selected_PhoneNumber = $row["PhoneNumber"];
                $Selected_Email = $row["Email"];

                $Selected_Pass = $row["Password"];
                $Selected_ID = $row["DoctorID"];

                $Selected_Spec = $row["Specialization"];
                $Selected_Room = $row["DoctorRoom"];

                $Selected_Img = $row["ProfileImg"];

            }

            // ----Display the variables
            echo '<div style="float: left;">';
            echo '<h1 id="Doctor_Name" class="selected_name">' . $Selected_Name . ' ' . $Selected_Surname . '</h1>';

            echo '<ul class="selected_ul">';
            echo '<li id="patient_age" class="selected_li">Age: ' . $Selected_Age . '</li>';
            echo '<li id="patient_gender" class="selected_li">Gender: ' . $Selected_Gender . '</li>';

            echo '<li id="patient_email" class="selected_li">Email: ' . $Selected_Email . '</li>';
            echo '<li id="patient_phone_num" class="selected_li">Phone Number: ' . $Selected_PhoneNumber . '</li>';

            echo '<li id="patient_id" class="selected_li">Doctor ID: ' . $Selected_ID . '</li>';
            echo '<li id="patient_aid_num" class="selected_li">Specialization: ' . $Selected_Spec . '</li>';
            echo '<li id="patient_prev_appt" class="selected_li">Doctor Room: ' . $Selected_Room . '</li>';

            echo '</ul>';
            echo '</div>';

            echo '<div class="selected_img">';
            echo '<img src="../pages/actions/profiles/' . $Selected_Img . '" alt="Profile Image" style="width:400px; height: 400px;">';

            echo '<ul style="list-style-type: none; margin-top: 10px;">';
            echo '<li style="display: inline-block; margin-top: 5px;">';
            echo '<a href="doctors.php?update=true" style="font-size: 30px; color: black;">Edit</a>';
            echo '</li>';
            // ------LI that allows the superuser (or current user if they select their own profile) to change the displayed output to edit the content.
            echo '<li style="display: inline-block; margin-left: 15px; margin-top: 12px; position: absolute;"><img src="../assets/images/Edit.svg" alt="Edit Information"></li>';

            // ------Item to change which picture the user has linked to them
            echo '<form action="actions/upload.php" method="post" enctype="multipart/form-data">

		    <input type="file" name="my_image">
            <input type="hidden" name="page" value="doctors">
            <input type="hidden" name="ID_DB" value="3">
		    <input type="submit" name="submit" value="Upload">

	        </form>';

            echo '</ul>';
            echo '</div>';

            // ----If the page is in "update mode", display this:
        } else if ($_GET['update'] == 'true') {
            // ----sql query to get the default information
            $sql = "SELECT * FROM doctors WHERE Specialization = 'Cardiology'";
            $header_return = '../doctors.php';

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {

                // ------Default information variables
                $Selected_Name = $row["Name"];
                $Selected_Surname = $row["Surname"];

                $Selected_Age = $row["Age"];
                $Selected_Gender = $row["Gender"];

                $Selected_PhoneNumber = $row["PhoneNumber"];
                $Selected_Email = $row["Email"];

                $Selected_Pass = $row["Password"];
                $Selected_ID = $row["DoctorID"];

                $Selected_Spec = $row["Specialization"];
                $Selected_Room = $row["DoctorRoom"];

            }

            // ----Display default information
            echo '<form method="post" action="actions/update.php?db=doctor&id=' . $Selected_ID . '">';
            echo '<div style="float: left;">';
            // ------Change the display to have inputs in a form, which will be sent to update.php to change the values in the database.
            echo '<ul class="selected_ul">';
            echo '<li style="font-size: 28px;" id="patient_age" class="selected_li">Name: <input type="text" name="name" value="' . $Selected_Name . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_age" class="selected_li">Surname: <input type="text" name="surname" value="' . $Selected_Surname . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_age" class="selected_li">Age: <input type="number" name="age" value="' . $Selected_Age . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_gender" class="selected_li">Gender: <input type="text" name="gender" value="' . $Selected_Gender . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_email" class="selected_li">Email: <input type="text" name="email" value="' . $Selected_Email . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_phone_num" class="selected_li">Phone Number: <input type="text" name="phonenum" value="' . $Selected_PhoneNumber . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_id" class="selected_li">Specialization: <input type="text" name="specialization" value="' . $Selected_Spec . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_id" class="selected_li">Doctor Room: <input type="text" name="doctorroom" value="' . $Selected_Room . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_id" class="selected_li">Password: <input type="text" name="password" value="New Password"></li>';
            echo '</ul>';
            echo '</div>';

            echo '<ul style="list-style-type: none; margin-right: 200px;" class="right">';
            echo '<li style="display: inline-block;">';
            echo '<button type="submit" class="btn btn-info" style="font-size: 24px; color: black;">Update</button>';
            echo '</li>';
            echo '<li style="display: inline-block; margin-left: 15px; margin-top: 12px; position: absolute;"><img src="../assets/images/Edit.svg" alt="Edit Information"></li>';
            echo '</ul>';
            echo '</form>';
        }

        // --If something has been selected, display this entity:
    } else if ($id != null) {

        if (isset($_GET['update']) == false) {
            $sql = "SELECT * FROM doctors WHERE DoctorID = $id";
            $header_return = '../doctors.php';

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {

                $Selected_Name = $row["Name"];
                $Selected_Surname = $row["Surname"];

                $Selected_Age = $row["Age"];
                $Selected_Gender = $row["Gender"];

                $Selected_PhoneNumber = $row["PhoneNumber"];
                $Selected_Email = $row["Email"];

                $Selected_Pass = $row["Password"];
                $Selected_ID = $row["DoctorID"];

                $Selected_Spec = $row["Specialization"];
                $Selected_Room = $row["DoctorRoom"];

                $Selected_Img = $row["ProfileImg"];

            }

            echo '<div style="float: left;">';
            echo '<h1 id="Doctor_Name" class="selected_name">' . $Selected_Name . ' ' . $Selected_Surname . '</h1>';

            echo '<ul class="selected_ul">';
            echo '<li id="patient_age" class="selected_li">Age: ' . $Selected_Age . '</li>';
            echo '<li id="patient_gender" class="selected_li">Gender: ' . $Selected_Gender . '</li>';

            echo '<li id="patient_email" class="selected_li">Email: ' . $Selected_Email . '</li>';
            echo '<li id="patient_phone_num" class="selected_li">Phone Number: ' . $Selected_PhoneNumber . '</li>';

            echo '<li id="patient_id" class="selected_li">Doctor ID: ' . $Selected_ID . '</li>';
            echo '<li id="patient_aid_num" class="selected_li">Specialization: ' . $Selected_Spec . '</li>';
            echo '<li id="patient_prev_appt" class="selected_li">Doctor Room: ' . $Selected_Room . '</li>';

            echo '</ul>';
            echo '</div>';

            echo '<div class="selected_img">';
            echo '<img src="../pages/actions/profiles/' . $Selected_Img . '" alt="Profile Image" style="width:400px; height: 400px;">';

            echo '<ul style="list-style-type: none; margin-top: 10px;">';
            echo '<li style="display: inline-block; margin-top: 5px;">';
            echo '<a href="doctors.php?id=' . $id . '&update=true" style="font-size: 30px; color: black;">Edit</a>';
            echo '</li>';
            echo '<li style="display: inline-block; margin-left: 15px; margin-top: 12px; position: absolute;"><img src="../assets/images/Edit.svg" alt="Edit Information"></li>';

            echo '<form action="actions/upload.php" method="post" enctype="multipart/form-data">

		    <input type="file" name="my_image">
            <input type="hidden" name="page" value="doctors">
            <input type="hidden" name="ID_DB" value="' . $id . '">
		    <input type="submit" name="submit" value="Upload">

	        </form>';

            echo '</ul>';
            echo '</div>';

        } else if ($_GET['update'] == 'true') {
            $sql = "SELECT * FROM doctors WHERE DoctorID = $id";
            $header_return = '../doctors.php';

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {

                $Selected_Name = $row["Name"];
                $Selected_Surname = $row["Surname"];

                $Selected_Age = $row["Age"];
                $Selected_Gender = $row["Gender"];

                $Selected_PhoneNumber = $row["PhoneNumber"];
                $Selected_Email = $row["Email"];

                $Selected_Pass = $row["Password"];
                $Selected_ID = $row["DoctorID"];

                $Selected_Spec = $row["Specialization"];
                $Selected_Room = $row["DoctorRoom"];

            }

            echo '<form method="post" action="actions/update.php?db=doctor&id=' . $Selected_ID . '">';
            echo '<div style="float: left;">';

            echo '<ul class="selected_ul">';
            echo '<li style="font-size: 28px;" id="patient_age" class="selected_li">Name: <input type="text" name="name" value="' . $Selected_Name . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_age" class="selected_li">Surname: <input type="text" name="surname" value="' . $Selected_Surname . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_age" class="selected_li">Age: <input type="number" name="age" value="' . $Selected_Age . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_gender" class="selected_li">Gender: <input type="text" name="gender" value="' . $Selected_Gender . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_email" class="selected_li">Email: <input type="text" name="email" value="' . $Selected_Email . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_phone_num" class="selected_li">Phone Number: <input type="text" name="phonenum" value="' . $Selected_PhoneNumber . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_id" class="selected_li">Specialization: <input type="text" name="specialization" value="' . $Selected_Spec . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_id" class="selected_li">Doctor Room: <input type="text" name="doctorroom" value="' . $Selected_Room . '"></li>';
            echo '<li style="font-size: 28px;" id="patient_id" class="selected_li">Password: <input type="text" name="password" value="New Password"></li>';
            echo '</ul>';
            echo '</div>';

            echo '<ul style="list-style-type: none; margin-right: 200px;" class="right">';
            echo '<li style="display: inline-block;">';
            echo '<button type="submit" class="btn btn-info" style="font-size: 24px; color: black;">Update</button>';
            echo '</li>';
            echo '<li style="display: inline-block; margin-left: 15px; margin-top: 12px; position: absolute;"><img src="../assets/images/Edit.svg" alt="Edit Information"></li>';
            echo '</ul>';
            echo '</form>';
        }

    }

} else if ($SuperUser_Global == false) {

    if ($id == null) {

        $sql = "SELECT * FROM doctors WHERE Specialization = 'Cardiology'";
        $header_return = '../doctors.php';

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {

            $Selected_Name = $row["Name"];
            $Selected_Surname = $row["Surname"];

            $Selected_Age = $row["Age"];
            $Selected_Gender = $row["Gender"];

            $Selected_PhoneNumber = $row["PhoneNumber"];
            $Selected_Email = $row["Email"];

            $Selected_Pass = $row["Password"];
            $Selected_ID = $row["DoctorID"];

            $Selected_Spec = $row["Specialization"];
            $Selected_Room = $row["DoctorRoom"];

        }

        echo '<div style="float: left;">';
        echo '<h1 id="Doctor_Name" class="selected_name">' . $Selected_Name . ' ' . $Selected_Surname . '</h1>';

        echo '<ul class="selected_ul">';
        echo '<li id="patient_age" class="selected_li">Age: ' . $Selected_Age . '</li>';
        echo '<li id="patient_gender" class="selected_li">Gender: ' . $Selected_Gender . '</li>';

        echo '<li id="patient_email" class="selected_li">Email: ' . $Selected_Email . '</li>';
        echo '<li id="patient_phone_num" class="selected_li">Phone Number: ' . $Selected_PhoneNumber . '</li>';

        echo '<li id="patient_id" class="selected_li">Doctor ID: ' . $Selected_ID . '</li>';
        echo '<li id="patient_aid_num" class="selected_li">Specialization: ' . $Selected_Spec . '</li>';
        echo '<li id="patient_prev_appt" class="selected_li">Doctor Room: ' . $Selected_Room . '</li>';

        echo '</ul>';
        echo '</div>';

        echo '<div class="selected_img">';
        echo '<img src="../assets/images/NoImage.png" alt="Profile Image">';
        echo '</div>';

    } else if ($id != null) {

        $sql = "SELECT * FROM doctors WHERE DoctorID = $id";
        $header_return = '../doctors.php';

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {

            $Selected_Name = $row["Name"];
            $Selected_Surname = $row["Surname"];

            $Selected_Age = $row["Age"];
            $Selected_Gender = $row["Gender"];

            $Selected_PhoneNumber = $row["PhoneNumber"];
            $Selected_Email = $row["Email"];

            $Selected_Pass = $row["Password"];
            $Selected_ID = $row["DoctorID"];

            $Selected_Spec = $row["Specialization"];
            $Selected_Room = $row["DoctorRoom"];

        }

        echo '<div style="float: left;">';
        echo '<h1 id="Doctor_Name" class="selected_name">' . $Selected_Name . ' ' . $Selected_Surname . '</h1>';

        echo '<ul class="selected_ul">';
        echo '<li id="patient_age" class="selected_li">Age: ' . $Selected_Age . '</li>';
        echo '<li id="patient_gender" class="selected_li">Gender: ' . $Selected_Gender . '</li>';

        echo '<li id="patient_email" class="selected_li">Email: ' . $Selected_Email . '</li>';
        echo '<li id="patient_phone_num" class="selected_li">Phone Number: ' . $Selected_PhoneNumber . '</li>';

        echo '<li id="patient_id" class="selected_li">Doctor ID: ' . $Selected_ID . '</li>';
        echo '<li id="patient_aid_num" class="selected_li">Specialization: ' . $Selected_Spec . '</li>';
        echo '<li id="patient_prev_appt" class="selected_li">Doctor Room: ' . $Selected_Room . '</li>';

        echo '</ul>';
        echo '</div>';

        echo '<div class="selected_img">';
        echo '<img src="../assets/images/NoImage.png" alt="Profile Image">';
        echo '</div>';

    }

}

$conn->close();

?>