<?php
include 'db.php';

// This will change which variables are collected, as well as which page will be opened after a new entity is created
$db = $_GET["db"];

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

        // --Create a secure password from the supplied password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // --sql query:
        $sql = "INSERT INTO receptionist (RecepID, ProfileImg, Name, Surname, Age, Gender, PhoneNumber, Email, Password, Rank, SignedIn) 
        VALUES('','http','$name','$surname','$age','$gender','$phonenum','$email','$password_hash','$rank', '0')";

        $conn->query($sql);

        // --Return to the receptionists page
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

        // --Create a secure password from the supplied password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // --sql query:
        $sql = "INSERT INTO doctors (ProfileImg, Name, Surname, Age, Gender, Email, Password, PhoneNumber, DoctorID, Specialization, DoctorRoom) 
        VALUES ('http','$name','$surname','$age','$gender','$email','$password_hash','$phonenum','','$spec','$room')";

        $conn->query($sql);

        // --Return to the doctors page
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

        // --Create a secure password from the supplied password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // --sql query:
        $sql = "INSERT INTO patients (ProfileImg, Name, Surname, Age, Gender, Email, Password, PhoneNumber, PatientID, MedicalAidNumber, PrevAppointments) 
        VALUES ('http','$name','$surname','$age','$gender','$email','$password_hash','$phonenum','','$medaid','')";

        $conn->query($sql);

        // --Return to the patients page
        $header = "../patients.php";

} else if ($db == "appointment") {
        // --Appointment Add
        $doctor = $_POST['app_doctor'];
        $patient = $_POST['app_patient'];

        // --convert the date to the correct sql format
        $input_date = $_POST['app_date'];
        $date = date("Y-m-d H:i:s", strtotime($input_date));

        // --Find the receptionist that added this appointment
        $sqlR = "SELECT RecepID FROM receptionist WHERE SignedIn = '1'";
        $resultR = $conn->query($sqlR);

        while ($rowR = $resultR->fetch_assoc()) {
                $receptionist = $rowR['RecepID'];
        }

        // --Find the doctor room of the doctor that was chosen
        $sqlDR = "SELECT DoctorRoom FROM doctors WHERE DoctorID = $doctor";
        $resultDR = $conn->query($sqlDR);

        while ($rowDR = $resultDR->fetch_assoc()) {
                $app_room = $rowDR['DoctorRoom'];
        }

        // --sql query:
        $sql = "INSERT INTO appointments (AppointmentID, DoctorID, PatientID, RecepID, DoctorRoom, AppointmentDate) 
        VALUES ('','$doctor','$patient','$receptionist','$app_room','$date')";

        $conn->query($sql);

        // --Return to the appointments page
        $header = "../appointments.php";
}

$conn->close();

// return to the page the user just came from
header("location: " . $header);

?>