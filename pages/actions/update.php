<?php
include 'db.php';

// This will change which variables are collected, as well as which page will be opened after a new entity is created
$db = $_GET["db"];
$id = $_GET["id"];

// If-else statement controlling which INSERT INTO statement is ran
if ($db == "receptionist") {
    // --Receptionist Add
    $name = $_POST["name"];
    $surname = $_POST["surname"];

    $age = $_POST["age"];
    $gender = $_POST["gender"];

    $phonenum = $_POST["phonenum"];
    $email = $_POST["email"];

    $password = $_POST["password"];
    $rank = $_POST["rank"];

    // --sql query:
    // ----If no new password is chosen, it will not update the password
    if ($password == "New Password") {

        $sql = "UPDATE receptionist 
        SET Name = '$name', Surname = '$surname', Age = '$age', Gender = '$gender', PhoneNumber = '$phonenum', Email = '$email', Rank = '$rank' 
        WHERE RecepID = $id";

    } else {

        $sql = "UPDATE receptionist 
        SET Name = '$name', Surname = '$surname', Age = '$age', Gender = '$gender', PhoneNumber = '$phonenum', Email = '$email', Password = '$password', Rank = '$rank' 
        WHERE RecepID = $id";

    }

    $conn->query($sql);
    $header = "../receptionists.php";

} else if ($db == "doctor") {
    // --Doctor Add
    $name = $_POST["name"];
    $surname = $_POST["surname"];

    $age = $_POST["age"];
    $gender = $_POST["gender"];

    $phonenum = $_POST["phonenum"];
    $email = $_POST["email"];

    $password = $_POST["password"];
    $spec = $_POST["specialization"];

    $room = $_POST["doctorroom"];

    // --sql query:
    if ($password == "New Password") {

        $sql = "UPDATE doctors SET Name = '$name', Surname = '$surname', Age = '$age', Gender = '$gender', Email = '$email', 
        PhoneNumber = '$phonenum', Specialization = '$spec', DoctorRoom = '$room' 
        WHERE DoctorID = $id";

    } else {

        $sql = "UPDATE doctors SET Name = '$name', Surname = '$surname', Age = '$age', Gender = '$gender', Email = '$email', 
        Password = '$password', PhoneNumber = '$phonenum', Specialization = '$spec', DoctorRoom = '$room' 
        WHERE DoctorID = $id";

    }

    $conn->query($sql);
    $header = "../doctors.php";

} else if ($db == "patient") {
    // --Doctor Add
    $name = $_POST["name"];
    $surname = $_POST["surname"];

    $age = $_POST["age"];
    $gender = $_POST["gender"];

    $phonenum = $_POST["phonenum"];
    $email = $_POST["email"];

    $password = $_POST["password"];
    $medaid = $_POST["medaid"];

    $prevapp = $_POST["prev_app"];

    // --sql query:
    if ($password == "New Password") {

        $sql = "UPDATE patients SET Name = '$name', Surname = '$surname', Age = '$age', Gender = '$gender', Email = '$email', 
        PhoneNumber = '$phonenum', MedicalAidNumber = '$medaid', PrevAppointments = '$prevapp' 
        WHERE PatientID = $id";

    } else {

        $sql = "UPDATE patients SET Name = '$name', Surname = '$surname', Age = '$age', Gender = '$gender', Email = '$email', Password = '$password', 
        PhoneNumber = '$phonenum', MedicalAidNumber = '$medaid', PrevAppointments = '$prevapp' 
        WHERE PatientID = $id";

    }

    $conn->query($sql);
    $header = "../patients.php";
} else if ($db == "appointment") {
    $doctor = $_POST['app_doctor'];
    $patient = $_POST['app_patient'];
    $appID = $_POST['appID'];

    // convert the date to the correct sql format
    $input_date = $_POST['app_new_date'];
    $date = date("Y-m-d H:i:s", strtotime($input_date));

    // Find the receptionist that added this appointment
    $sqlR = "SELECT RecepID FROM receptionist WHERE SignedIn = '1'";
    $resultR = $conn->query($sqlR);

    while ($rowR = $resultR->fetch_assoc()) {
        $receptionist = $rowR['RecepID'];
    }

    // Find the doctor room of the doctor that was chosen
    $sqlDR = "SELECT DoctorRoom FROM doctors WHERE DoctorID = $doctor";
    $resultDR = $conn->query($sqlDR);

    while ($rowDR = $resultDR->fetch_assoc()) {
        $app_room = $rowDR['DoctorRoom'];
    }

    // --sql query:
    $sql = "UPDATE appointments SET DoctorID = '$doctor', PatientID = '$patient', RecepID = '$receptionist',
    DoctorRoom = '$app_room', AppointmentDate = '$date' 
    WHERE AppointmentID = $appID";

    $conn->query($sql);
    $header = "../appointments.php";
}

$conn->close();

// return to the page the user just came from
header("location: " . $header);

?>