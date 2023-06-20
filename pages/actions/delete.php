<?php
include 'db.php';

// Get the ID of the selected item and the page where the user clicked to delete an entity
$id = $_GET['id'];
$page = $_GET['page'];

// --Receptionist Delete
if ($page == "receptionist") {
    $sql = "DELETE FROM receptionist WHERE RecepID = $id";

    $header_return = '../receptionists.php';
    // --Doctors Delete
} else if ($page == "doctor") {
    $sql = "DELETE FROM doctors WHERE DoctorID = $id";

    $header_return = '../doctors.php';
    // --Patients delete
} else if ($page == "patient") {
    $sql = "DELETE FROM patients WHERE PatientID = $id";

    $header_return = '../patients.php';
}

$conn->query($sql);

$conn->close();
header("location:" . $header_return);

?>