<?php
include 'db.php';

$id = $_GET['id'];
$page = $_GET['page'];

// --Receptionist Delete
if ($page == "receptionist") {
    $sql = "DELETE FROM receptionist WHERE RecepID = $id";

    $header_return = '../receptionists.php';
    // --doctors Delete
} else if ($page == "doctor") {
    $sql = "DELETE FROM doctors WHERE DoctorID = $id";

    $header_return = '../doctors.php';
    // --patients delete
} else if ($page == "patient") {
    $sql = "DELETE FROM patients WHERE PatientID = $id";

    $header_return = '../patients.php';
}

$conn->query($sql);

$conn->close();
header("location:" . $header_return);

?>