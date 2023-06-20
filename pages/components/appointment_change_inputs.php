<?php
// This component is called when the user wants to change an appointment. This component populates the change appointment page's <select> options.

include 'actions/db.php';

// Get the ID of the chosen appointment
$appID = $_GET['id'];

// Get the data of the chosen appointment
$sqlSt = "SELECT * FROM appointments WHERE AppointmentID = $appID";
$resultSt = $conn->query($sqlSt);

while ($rowSt = $resultSt->fetch_assoc()) {

    // --The starting values of the appointment. This is used to tell the user what is being changed.
    $patientSt = $rowSt['PatientID'];
    $doctorSt = $rowSt['DoctorID'];
    $recepSt = $rowSt['RecepID'];
    $dateSt = $rowSt['AppointmentDate'];

}

// sql Query to collect the relevant information of all the doctors. This will be placed in the <option> tags.
$sqlD = "SELECT Name, Surname, DoctorID FROM doctors ORDER BY DoctorID ASC";
$resultD = $conn->query($sqlD);

// Build the select (with a label to indicate select's content type [doctor or patient])
echo '<label style="font-size: 20px;"> Select Doctor </label><br>';
echo '<select name="app_doctor" style="width: 200px; height: 30px; font-size: 23px;">';

// Populate the select with the names of each doctor. The doctor's ID will become the value.
while ($rowD = $resultD->fetch_assoc()) {

    // --Get the name of the doctor's starting value. This is because the value is saved as the doctor's ID in the database and not the doctor's name, so we need to use the ID to find the name. It also build the full name using the ID.
    if ($rowD['DoctorID'] == $doctorSt) {
        $doctorStName = $rowD['Name'] . ' ' . $rowD['Surname'];
    }

    echo '<option name="doctor_select" value="' . $rowD['DoctorID'] . '"> ' . $rowD['Name'] . ' ' . $rowD['Surname'] . '</option>';

}

echo '</select>';
echo '<br>';
echo '<br>';

// Sql query for the patients table to select the patient's name, surname and ID
$sqlP = "SELECT Name, Surname, PatientID FROM patients ORDER BY PatientID ASC";
$resultP = $conn->query($sqlP);

// Build the select (with label to indicate select's content type [doctor or patient])
echo '<label style="font-size: 20px;"> Select Patient </label><br>';
echo '<select name="app_patient" style="width: 200px; height: 30px; font-size: 23px;">';

// Populate the select with the names of each patient. The patient's ID will become the value.
while ($rowP = $resultP->fetch_assoc()) {

    // --Get the name of the patient's starting value. This is because the value is saved as the patient's ID in the database and not the patient's name, so we need to use the ID to find the name. It also build the full name using the ID.
    if ($rowP['PatientID'] == $patientSt) {
        $patientStName = $rowP['Name'] . ' ' . $rowP['Surname'];
    }

    echo '<option value="' . $rowP['PatientID'] . '"> ' . $rowP['Name'] . ' ' . $rowP['Surname'] . '</option>';

}

echo "</select>";
echo '<br>';
echo '<br>';

//  Collect the new date of the appointment 
echo '<label style="font-size: 20px;"> Select Date </label><br>';
echo '<input type="date" name="app_new_date" value="' . $dateSt . '">';
echo '<br>';
echo '<br>';

// Display the starting values of the doctor, patient and appointment date
echo '<h4 style="width: 400px; text-align: center;"> Currently Editing: <br>' . $doctorStName . ' and ' . $patientStName . ' appointment for ' . $dateSt . '</h4>';
echo '<input type="hidden" name="appID" value="' . $appID . '">';

$conn->close();

?>