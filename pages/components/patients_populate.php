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

$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

if ($SuperUser_Global == true) {

    echo '<tr>';
    echo '<th class="th_all_table">Name</th>';
    echo '<th class="th_all_table">ID</th>';
    echo '<th class="th_all_table">Medical Aid Number</th>';

    echo '<th class="th_all_table">Email</th>';
    echo '<th class="th_all_table">Upcoming Appointments: </th>';
    echo '<th class="th_all_table" style="border-right: 0px;"><a href="patientRegister.php" role="button">ADD NEW</a></th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {

        echo '<tr>';
        echo '<td style="color: #0098c7;"> <a href="patients.php?id=' . $row['PatientID'] . '">' . $row['Name'] . ' ' . $row['Surname'] . '</a></td>';
        echo '<td>' . $row['PatientID'] . '</td>';

        echo '<td>' . $row['MedicalAidNumber'] . '</td>';
        echo '<td>' . $row['Email'] . '</td>';
        echo '<td>' . $row['PrevAppointments'] . '</td>';
        echo '<td style="border-right: 0px;"><a class="btn btn-danger" href="actions/delete.php?id=' . $row['PatientID'] . '&page=patient" role="button">Delete</a></td>';
        echo '<tr>';

    }

} else if ($SuperUser_Global == false) {

    echo '<tr>';
    echo '<th class="th_all_table">Name</th>';
    echo '<th class="th_all_table">ID</th>';
    echo '<th class="th_all_table">Medical Aid Number</th>';

    echo '<th class="th_all_table">Email</th>';
    echo '<th class="th_all_table">Upcoming Appointments: </th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {

        echo '<tr>';
        echo '<td style="color: #0098c7;"> <a href="patients.php?id=' . $row['PatientID'] . '">' . $row['Name'] . ' ' . $row['Surname'] . '</a></td>';
        echo '<td>' . $row['PatientID'] . '</td>';

        echo '<td>' . $row['MedicalAidNumber'] . '</td>';
        echo '<td>' . $row['Email'] . '</td>';
        echo '<td>' . $row['PrevAppointments'] . '</td>';
        echo '<tr>';

    }

}

$conn->close();

?>