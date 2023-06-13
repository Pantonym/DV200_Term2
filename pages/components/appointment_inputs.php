<?php
include 'actions/db.php';

// Sql query for the doctors table to select the doctor's name, surname and ID
$sqlD = "SELECT Name, Surname, DoctorID FROM doctors ORDER BY DoctorID ASC";
$resultD = $conn->query($sqlD);

// Build select (with label to indicate select's content type)
echo '<label style="font-size: 20px;"> Select Doctor </label><br>';
echo '<select name="app_doctor" style="width: 200px; height: 30px; font-size: 23px;">';

// populate select with the names of each doctor. The doctor's ID will become the value
while ($rowD = $resultD->fetch_assoc()) {

    echo '<option name="doctor_select" value="' . $rowD['DoctorID'] . '"> ' . $rowD['Name'] . ' ' . $rowD['Surname'] . '</option>';

}

echo '</select>';
echo '<br>';
echo '<br>';

// Sql query for the patients table to select the patient's name, surname and ID
$sqlP = "SELECT Name, Surname, PatientID FROM patients ORDER BY PatientID ASC";
$resultP = $conn->query($sqlP);

// Build select (with label to indicate select's content type)
echo '<label style="font-size: 20px;"> Select Patient </label><br>';
echo '<select name="app_patient" style="width: 200px; height: 30px; font-size: 23px;">';

// populate select with the names of each patient. The patient's ID will become the value
while ($rowP = $resultP->fetch_assoc()) {

    echo '<option value="' . $rowP['PatientID'] . '"> ' . $rowP['Name'] . ' ' . $rowP['Surname'] . '</option>';

}

echo "</select>";
echo '<br>';
echo '<br>';

// Display which date will this will be added to
echo '<h4 style="width: 400px; text-align: center;"> Create an appointment for: <br>' . $_GET['date'] . '</h4>';
echo '<input type="hidden" name="app_date" value="' . $_GET['date'] . '">';

$conn->close();

?>