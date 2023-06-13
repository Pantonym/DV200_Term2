<?php
error_reporting(0);

include 'actions/db.php';

// Find if the superuser is signed in
$sql_test = "SELECT * FROM receptionist WHERE SignedIn = '1'";
$result_test = $conn->query($sql_test);

while ($row_test = $result_test->fetch_assoc()) {

    if ($row_test['Rank'] == 'Head Receptionist') {
        $SuperUser_Global = true;
    } else if ($row_test['Rank'] == 'Receptionist') {
        $SuperUser_Global = false;
    }

}

// Find the ID of the receptionist that is currently signed in
$sql_ID = "SELECT RecepID FROM receptionist WHERE SignedIn = '1'";
$result_ID = $conn->query($sql_ID);

while ($row_ID = $result_ID->fetch_assoc()) {
    $signedInID = $row_ID['RecepID'];
}

// Get the ID of the user that was just clicked
$id = $_GET['id'];

if ($SuperUser_Global == true) {

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
        echo '<img src="../assets/images/NoImage.png" alt="Profile Image">';

        echo '<ul style="list-style-type: none; margin-top: 10px;">';
        echo '<li style="display: inline-block; margin-top: 5px;">';
        echo '<p style="font-size: 30px;">Edit</p>';
        echo '</li>';
        echo '<li style="display: inline-block; margin-left: 15px; margin-top: 12px; position: absolute;"><img src="../assets/images/Edit.svg" alt="Edit Information"></li>';
        echo '</ul>';
        echo '</div>';

    } else if ($id != null) {

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
        echo '<img src="../assets/images/NoImage.png" alt="Profile Image">';

        echo '<ul style="list-style-type: none; margin-top: 10px;">';
        echo '<li style="display: inline-block; margin-top: 5px;">';
        echo '<p style="font-size: 30px;">Edit</p>';
        echo '</li>';
        echo '<li style="display: inline-block; margin-left: 15px; margin-top: 12px; position: absolute;"><img src="../assets/images/Edit.svg" alt="Edit Information"></li>';
        echo '</ul>';
        echo '</div>';

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
        echo '<img src="../assets/images/NoImage.png" alt="Profile Image">';
        echo '</div>';

    } else if ($id != null) {
        // Each receptionist is able to edit their own profile
        if ($id == $signedInID) {

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
            echo '<img src="../assets/images/NoImage.png" alt="Profile Image">';

            echo '<ul style="list-style-type: none; margin-top: 10px;">';
            echo '<li style="display: inline-block; margin-top: 5px;">';
            echo '<p style="font-size: 30px;">Edit</p>';
            echo '</li>';
            echo '<li style="display: inline-block; margin-left: 15px; margin-top: 12px; position: absolute;"><img src="../assets/images/Edit.svg" alt="Edit Information"></li>';
            echo '</ul>';
            echo '</div>';

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
            echo '<img src="../assets/images/NoImage.png" alt="Profile Image">';
            echo '</div>';

        }

    }

}

$conn->close();

?>