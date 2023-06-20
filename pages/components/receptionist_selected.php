<?php
// See doctors_populate.php, this page works similar except for what data is displayed as it uses a different table. The only other change is an IF statement that tests to see if the current signed in user matches the current selected user.
// This is because the brief states we are required to allow the signed in user to change their own profile, even if they are not a SuperUser.
error_reporting(0);

include 'actions/db.php';

// Find wether or not the current user is a superuser
if ($_SESSION["UserType"] == "Head Receptionist") {
    $SuperUser_Global = true;
} else if ($_SESSION["UserType"] == 'Receptionist') {
    $SuperUser_Global = false;
}

// Find the ID of the receptionist that is currently signed in
$sql_ID = "SELECT RecepID FROM receptionist WHERE SignedIn = '1'";
$result_ID = $conn->query($sql_ID);

while ($row_ID = $result_ID->fetch_assoc()) {
    $signedInID = $row_ID['RecepID'];
}

// Get the ID of the user that was just clicked
$id = $_GET['id'];

// User is a Head Receptionist
if ($SuperUser_Global == true) {

    // --No ID has been clicked
    if ($id == null) {

        if (isset($_GET['update']) == false) {
            $sql = "SELECT * FROM receptionist WHERE Rank = 'Head Receptionist'";
            $header_return = '../receptionists.php';

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {

                $Selected_Name = $row["Name"];
                $Selected_Surname = $row["Surname"];

                $Selected_Age = $row["Age"];
                $Selected_Gender = $row["Gender"];

                $Selected_PhoneNumber = $row["PhoneNumber"];
                $Selected_Email = $row["Email"];

                $Selected_Pass = $row["Password"];
                $Selected_Rank = $row["Rank"];

                $Selected_ID = $row["RecepID"];
                $Selected_Img = $row["ProfileImg"];

            }

            echo '<div style="float: left;">';
            echo '<h1 id="Doctor_Name" class="selected_name">' . $Selected_Name . ' ' . $Selected_Surname . '</h1>';

            echo '<ul class="selected_ul">';
            echo '<li id="patient_age" class="selected_li">Age: ' . $Selected_Age . '</li>';
            echo '<li id="patient_gender" class="selected_li">Gender: ' . $Selected_Gender . '</li>';
            echo '<li id="patient_email" class="selected_li">Email: ' . $Selected_Email . '</li>';
            echo '<li id="patient_phone_num" class="selected_li">Phone Number: ' . $Selected_PhoneNumber . '</li>';
            echo '<li id="patient_id" class="selected_li">Rank: ' . $Selected_Rank . '</li>';
            echo '</ul>';
            echo '</div>';

            echo '<div class="selected_img">';
            echo '<img src="../pages/actions/profiles/' . $Selected_Img . '" alt="Profile Image" style="width:400px; height: 400px;">';

            echo '<ul style="list-style-type: none; margin-top: 10px;">';
            echo '<li style="display: inline-block; margin-top: 5px;">';
            echo '<a href="receptionists.php?update=true" style="font-size: 30px; color: black;">Edit</a>';
            echo '</li>';
            echo '<li style="display: inline-block; margin-left: 15px; margin-top: 12px; position: absolute;"><img src="../assets/images/Edit.svg" alt="Edit Information"></li>';

            echo '<form action="actions/upload.php" method="post" enctype="multipart/form-data">

		    <input type="file" name="my_image">
            <input type="hidden" name="page" value="receptionists">
            <input type="hidden" name="ID_DB" value="1">
		    <input type="submit" name="submit" value="Upload">

	        </form>';

            echo '</ul>';
            echo '</div>';
        } else if ($_GET['update'] == 'true') {
            $sql = "SELECT * FROM receptionist WHERE Rank = 'Head Receptionist'";
            $header_return = '../receptionists.php';

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {

                $Selected_Name = $row["Name"];
                $Selected_Surname = $row["Surname"];

                $Selected_Age = $row["Age"];
                $Selected_Gender = $row["Gender"];

                $Selected_PhoneNumber = $row["PhoneNumber"];
                $Selected_Email = $row["Email"];

                $Selected_Pass = $row["Password"];
                $Selected_Rank = $row["Rank"];

                $Selected_ID = $row["RecepID"];

            }

            echo '<form method="post" action="actions/update.php?db=receptionist&id=' . $Selected_ID . '">';
            echo '<div style="float: left;">';

            echo '<ul class="selected_ul">';
            echo '<li id="patient_age" class="selected_li">Name: <input type="text" name="name" value="' . $Selected_Name . '"></li>';
            echo '<li id="patient_age" class="selected_li">Surname: <input type="text" name="surname" value="' . $Selected_Surname . '"></li>';
            echo '<li id="patient_age" class="selected_li">Age: <input type="number" name="age" value="' . $Selected_Age . '"></li>';
            echo '<li id="patient_gender" class="selected_li">Gender: <input type="text" name="gender" value="' . $Selected_Gender . '"></li>';
            echo '<li id="patient_email" class="selected_li">Email: <input type="text" name="email" value="' . $Selected_Email . '"></li>';
            echo '<li id="patient_phone_num" class="selected_li">Phone Number: <input type="text" name="phonenum" value="' . $Selected_PhoneNumber . '"></li>';
            echo '<li id="patient_id" class="selected_li">Rank: <input type="text" name="rank" value="' . $Selected_Rank . '"></li>';
            echo '<li id="patient_id" class="selected_li">Password: <input type="text" name="password" value="New Password"></li>';
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

    } else if ($id != null) {

        if (isset($_GET['update']) == false) {
            $sql = "SELECT * FROM receptionist WHERE RecepID = $id";
            $header_return = '../receptionists.php';

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {

                $Selected_Name = $row["Name"];
                $Selected_Surname = $row["Surname"];

                $Selected_Age = $row["Age"];
                $Selected_Gender = $row["Gender"];

                $Selected_PhoneNumber = $row["PhoneNumber"];
                $Selected_Email = $row["Email"];

                $Selected_Pass = $row["Password"];
                $Selected_Rank = $row["Rank"];

                $Selected_ID = $row["RecepID"];
                $Selected_Img = $row["ProfileImg"];

            }

            echo '<div style="float: left;">';
            echo '<h1 id="Doctor_Name" class="selected_name">' . $Selected_Name . ' ' . $Selected_Surname . '</h1>';

            echo '<ul class="selected_ul">';
            echo '<li id="patient_age" class="selected_li">Age: ' . $Selected_Age . '</li>';
            echo '<li id="patient_gender" class="selected_li">Gender: ' . $Selected_Gender . '</li>';
            echo '<li id="patient_email" class="selected_li">Email: ' . $Selected_Email . '</li>';
            echo '<li id="patient_phone_num" class="selected_li">Phone Number: ' . $Selected_PhoneNumber . '</li>';
            echo '<li id="patient_id" class="selected_li">Rank: ' . $Selected_Rank . '</li>';
            echo '</ul>';
            echo '</div>';

            echo '<div class="selected_img">';
            echo '<img src="../pages/actions/profiles/' . $Selected_Img . '" alt="Profile Image" style="width:400px; height: 400px;">';

            echo '<ul style="list-style-type: none; margin-top: 10px;">';
            echo '<li style="display: inline-block; margin-top: 5px;">';
            echo '<a href="receptionists.php?id=' . $id . '&update=true" style="font-size: 30px; color: black;">Edit</a>';
            echo '</li>';
            echo '<li style="display: inline-block; margin-left: 15px; margin-top: 12px; position: absolute;"><img src="../assets/images/Edit.svg" alt="Edit Information"></li>';

            echo '<form action="actions/upload.php" method="post" enctype="multipart/form-data">

		    <input type="file" name="my_image">
            <input type="hidden" name="page" value="receptionists">
            <input type="hidden" name="ID_DB" value="' . $id . '">
		    <input type="submit" name="submit" value="Upload">

	        </form>';

            echo '</ul>';
            echo '</div>';

        } else if ($_GET['update'] == 'true') {
            $sql = "SELECT * FROM receptionist WHERE RecepID = $id";
            $header_return = '../receptionists.php';

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {

                $Selected_Name = $row["Name"];
                $Selected_Surname = $row["Surname"];

                $Selected_Age = $row["Age"];
                $Selected_Gender = $row["Gender"];

                $Selected_PhoneNumber = $row["PhoneNumber"];
                $Selected_Email = $row["Email"];

                $Selected_Pass = $row["Password"];
                $Selected_Rank = $row["Rank"];

                $Selected_ID = $id;

            }

            echo '<form method="post" action="actions/update.php?db=receptionist&id=' . $Selected_ID . '">';
            echo '<div style="float: left;">';

            echo '<ul class="selected_ul">';
            echo '<li id="patient_age" class="selected_li">Name: <input type="text" name="name" value="' . $Selected_Name . '"></li>';
            echo '<li id="patient_age" class="selected_li">Surname: <input type="text" name="surname" value="' . $Selected_Surname . '"></li>';
            echo '<li id="patient_age" class="selected_li">Age: <input type="number" name="age" value="' . $Selected_Age . '"></li>';
            echo '<li id="patient_gender" class="selected_li">Gender: <input type="text" name="gender" value="' . $Selected_Gender . '"></li>';
            echo '<li id="patient_email" class="selected_li">Email: <input type="text" name="email" value="' . $Selected_Email . '"></li>';
            echo '<li id="patient_phone_num" class="selected_li">Phone Number: <input type="text" name="phonenum" value="' . $Selected_PhoneNumber . '"></li>';
            echo '<li id="patient_id" class="selected_li">Rank: <input type="text" name="rank" value="' . $Selected_Rank . '"></li>';
            echo '<li id="patient_id" class="selected_li">Password: <input type="text" name="password" value="New Password"></li>';
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

        $sql = "SELECT * FROM receptionist WHERE Rank = 'Head Receptionist'";
        $header_return = '../receptionists.php';

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {

            $Selected_Name = $row["Name"];
            $Selected_Surname = $row["Surname"];

            $Selected_Age = $row["Age"];
            $Selected_Gender = $row["Gender"];

            $Selected_PhoneNumber = $row["PhoneNumber"];
            $Selected_Email = $row["Email"];

            $Selected_Pass = $row["Password"];
            $Selected_Rank = $row["Rank"];

            $Selected_ID = $row["RecepID"];
            $Selected_Img = $row["ProfileImg"];

        }

        echo '<div style="float: left;">';
        echo '<h1 id="Doctor_Name" class="selected_name">' . $Selected_Name . ' ' . $Selected_Surname . '</h1>';

        echo '<ul class="selected_ul">';
        echo '<li id="patient_age" class="selected_li">Age: ' . $Selected_Age . '</li>';
        echo '<li id="patient_gender" class="selected_li">Gender: ' . $Selected_Gender . '</li>';
        echo '<li id="patient_email" class="selected_li">Email: ' . $Selected_Email . '</li>';
        echo '<li id="patient_phone_num" class="selected_li">Phone Number: ' . $Selected_PhoneNumber . '</li>';
        echo '<li id="patient_id" class="selected_li">Rank: ' . $Selected_Rank . '</li>';
        echo '</ul>';
        echo '</div>';

        echo '<div class="selected_img">';
        echo '<img src="../pages/actions/profiles/' . $Selected_Img . '" alt="Profile Image" style="width:400px; height: 400px;">';
        echo '</div>';

    } else if ($id != null) {
        // Each receptionist is able to edit their own profile
        if ($id == $_SESSION["ID"]) {

            if (isset($_GET['update']) == false) {
                $sql = "SELECT * FROM receptionist WHERE RecepID = $id";
                $header_return = '../receptionists.php';

                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {

                    $Selected_Name = $row["Name"];
                    $Selected_Surname = $row["Surname"];

                    $Selected_Age = $row["Age"];
                    $Selected_Gender = $row["Gender"];

                    $Selected_PhoneNumber = $row["PhoneNumber"];
                    $Selected_Email = $row["Email"];

                    $Selected_Pass = $row["Password"];
                    $Selected_Rank = $row["Rank"];

                    $Selected_ID = $row["RecepID"];
                    $Selected_Img = $row["ProfileImg"];

                }

                echo '<div style="float: left;">';
                echo '<h1 id="Doctor_Name" class="selected_name">' . $Selected_Name . ' ' . $Selected_Surname . '</h1>';

                echo '<ul class="selected_ul">';
                echo '<li id="patient_age" class="selected_li">Age: ' . $Selected_Age . '</li>';
                echo '<li id="patient_gender" class="selected_li">Gender: ' . $Selected_Gender . '</li>';
                echo '<li id="patient_email" class="selected_li">Email: ' . $Selected_Email . '</li>';
                echo '<li id="patient_phone_num" class="selected_li">Phone Number: ' . $Selected_PhoneNumber . '</li>';
                echo '<li id="patient_id" class="selected_li">Rank: ' . $Selected_Rank . '</li>';
                echo '</ul>';
                echo '</div>';

                echo '<div class="selected_img">';
                echo '<img src="../pages/actions/profiles/' . $Selected_Img . '" alt="Profile Image" style="width:400px; height: 400px;">';

                echo '<ul style="list-style-type: none; margin-top: 10px;">';
                echo '<li style="display: inline-block; margin-top: 5px;">';
                echo '<a href="receptionists.php?id=' . $id . '&update=true" style="font-size: 30px; color: black;">Edit</a>';
                echo '</li>';
                echo '<li style="display: inline-block; margin-left: 15px; margin-top: 12px; position: absolute;"><img src="../assets/images/Edit.svg" alt="Edit Information"></li>';
                echo '</ul>';
                echo '</div>';

            } else if ($_GET['update'] == 'true') {
                $sql = "SELECT * FROM receptionist WHERE RecepID = $id";
                $header_return = '../receptionists.php';

                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {

                    $Selected_Name = $row["Name"];
                    $Selected_Surname = $row["Surname"];

                    $Selected_Age = $row["Age"];
                    $Selected_Gender = $row["Gender"];

                    $Selected_PhoneNumber = $row["PhoneNumber"];
                    $Selected_Email = $row["Email"];

                    $Selected_Pass = $row["Password"];
                    $Selected_Rank = $row["Rank"];

                    $Selected_ID = $id;

                }

                echo '<form method="post" action="actions/update.php?db=receptionist&id=' . $Selected_ID . '">';
                echo '<div style="float: left;">';

                echo '<ul class="selected_ul">';
                echo '<li id="patient_age" class="selected_li">Name: <input type="text" name="name" value="' . $Selected_Name . '"></li>';
                echo '<li id="patient_age" class="selected_li">Surname: <input type="text" name="surname" value="' . $Selected_Surname . '"></li>';
                echo '<li id="patient_age" class="selected_li">Age: <input type="number" name="age" value="' . $Selected_Age . '"></li>';
                echo '<li id="patient_gender" class="selected_li">Gender: <input type="text" name="gender" value="' . $Selected_Gender . '"></li>';
                echo '<li id="patient_email" class="selected_li">Email: <input type="text" name="email" value="' . $Selected_Email . '"></li>';
                echo '<li id="patient_phone_num" class="selected_li">Phone Number: <input type="text" name="phonenum" value="' . $Selected_PhoneNumber . '"></li>';
                echo '<li id="patient_id" class="selected_li">Rank: <input type="text" name="rank" value="' . $Selected_Rank . '"></li>';
                echo '<li id="patient_id" class="selected_li">Password: <input type="text" name="password" value="New Password"></li>';
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

            // Generate normal content if the user's profile wasn't the one that was clicked.
        } else {

            $sql = "SELECT * FROM receptionist WHERE RecepID = $id";
            $header_return = '../receptionists.php';

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {

                $Selected_Name = $row["Name"];
                $Selected_Surname = $row["Surname"];

                $Selected_Age = $row["Age"];
                $Selected_Gender = $row["Gender"];

                $Selected_PhoneNumber = $row["PhoneNumber"];
                $Selected_Email = $row["Email"];

                $Selected_Pass = $row["Password"];
                $Selected_Rank = $row["Rank"];

                $Selected_ID = $row["RecepID"];
                $Selected_Img = $row["ProfileImg"];

            }

            echo '<div style="float: left;">';
            echo '<h1 id="Doctor_Name" class="selected_name">' . $Selected_Name . ' ' . $Selected_Surname . '</h1>';

            echo '<ul class="selected_ul">';
            echo '<li id="patient_age" class="selected_li">Age: ' . $Selected_Age . '</li>';
            echo '<li id="patient_gender" class="selected_li">Gender: ' . $Selected_Gender . '</li>';
            echo '<li id="patient_email" class="selected_li">Email: ' . $Selected_Email . '</li>';
            echo '<li id="patient_phone_num" class="selected_li">Phone Number: ' . $Selected_PhoneNumber . '</li>';
            echo '<li id="patient_id" class="selected_li">Rank: ' . $Selected_Rank . '</li>';
            echo '</ul>';
            echo '</div>';

            echo '<div class="selected_img">';
            echo '<img src="../pages/actions/profiles/' . $Selected_Img . '" alt="Profile Image" style="width:400px; height: 400px;">';
            echo '</div>';

        }

    }

}

$conn->close();

?>