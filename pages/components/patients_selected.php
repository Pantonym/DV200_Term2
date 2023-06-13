<?php
error_reporting(0);

include 'actions/db.php';

$sql_test = "SELECT * FROM receptionist WHERE SignedIn = '1'";
$result_test = $conn->query($sql_test);

while ($row_test = $result_test->fetch_assoc()) {

    if ($row_test['Rank'] == 'Head Receptionist') {
        $SuperUser_Global = true;
    } else if ($row_test['Rank'] == 'Receptionist') {
        $SuperUser_Global = false;
    }

}

$id = $_GET['id'];

if ($SuperUser_Global == true) {

    if ($id == null) {

        $sql = "SELECT * FROM patients WHERE PatientID = 1";
        $header_return = '../patients.php';

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {

            $Selected_Name = $row["Name"];
            $Selected_Surname = $row["Surname"];

            $Selected_Age = $row["Age"];
            $Selected_Gender = $row["Gender"];

            $Selected_PhoneNumber = $row["PhoneNumber"];
            $Selected_Email = $row["Email"];

            $Selected_Pass = $row["Password"];
            $Selected_ID = $row["PatientID"];

            $Selected_MedNum = $row["MedicalAidNumber"];
            $Selected_PrevApp = $row["PrevAppointments"];

        }

        echo '<div style="float: left;">';
        echo '<h1 id="Doctor_Name" class="selected_name">' . $Selected_Name . ' ' . $Selected_Surname . '</h1>';

        echo '<ul class="selected_ul">';
        echo '<li id="patient_age" class="selected_li">Age: ' . $Selected_Age . '</li>';
        echo '<li id="patient_gender" class="selected_li">Gender: ' . $Selected_Gender . '</li>';

        echo '<li id="patient_email" class="selected_li">Email: ' . $Selected_Email . '</li>';
        echo '<li id="patient_phone_num" class="selected_li">Phone Number: ' . $Selected_PhoneNumber . '</li>';

        echo '<li id="patient_id" class="selected_li">Patient ID: ' . $Selected_ID . '</li>';
        echo '<li id="patient_aid_num" class="selected_li">Medical Aid Number: ' . $Selected_MedNum . '</li>';

        echo '<li id="patient_prev_appt" class="selected_li">Previous Appointments: ' . $Selected_PrevApp . '</li>';
        echo '<li id="patient_prev_appt" class="selected_li">Upcoming Appointments: ' . $Selected_Room . '</li>';

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

        $sql = "SELECT * FROM patients WHERE PatientID = $id";
        $header_return = '../patients.php';

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {

            $Selected_Name = $row["Name"];
            $Selected_Surname = $row["Surname"];

            $Selected_Age = $row["Age"];
            $Selected_Gender = $row["Gender"];

            $Selected_PhoneNumber = $row["PhoneNumber"];
            $Selected_Email = $row["Email"];

            $Selected_Pass = $row["Password"];
            $Selected_ID = $row["PatientID"];

            $Selected_MedNum = $row["MedicalAidNumber"];
            $Selected_PrevApp = $row["PrevAppointments"];

        }

        echo '<div style="float: left;">';
        echo '<h1 id="Doctor_Name" class="selected_name">' . $Selected_Name . ' ' . $Selected_Surname . '</h1>';

        echo '<ul class="selected_ul">';
        echo '<li id="patient_age" class="selected_li">Age: ' . $Selected_Age . '</li>';
        echo '<li id="patient_gender" class="selected_li">Gender: ' . $Selected_Gender . '</li>';

        echo '<li id="patient_email" class="selected_li">Email: ' . $Selected_Email . '</li>';
        echo '<li id="patient_phone_num" class="selected_li">Phone Number: ' . $Selected_PhoneNumber . '</li>';

        echo '<li id="patient_id" class="selected_li">Patient ID: ' . $Selected_ID . '</li>';
        echo '<li id="patient_aid_num" class="selected_li">Medical Aid Number: ' . $Selected_MedNum . '</li>';

        echo '<li id="patient_prev_appt" class="selected_li">Previous Appointments: ' . $Selected_PrevApp . '</li>';
        echo '<li id="patient_prev_appt" class="selected_li">Upcoming Appointments: ' . $Selected_Room . '</li>';

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