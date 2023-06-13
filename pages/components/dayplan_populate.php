<?php
include 'actions/db.php';

if (isset($_GET['date'])) {
    // Assign date variable
    $date = $_GET['date'];

    // Build the SQL to get all appointments for this date
    $sql = "SELECT * FROM appointments WHERE AppointmentDate= '$date'";
    $result = $conn->query($sql);

    // Header (displays the current date)
    echo '
    <div id="dayplan_header">
        <h1 style="width: 450px; text-align: center; padding-top: 3.5%; color: white;"> ' . $date . ' </h1> 
    </div>';

    // Body Header (displays Patient | Doctor | Room)
    echo '
    <div id="dayplan_body">
        <table id="dayplan_table">

            <tbody>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th style="border-right: 0px;">Room</th>
                </tr>';

    // Collect all of the appointment dates
    while ($row = $result->fetch_assoc()) {

        // --Assign the current appointment date's ID's to variables
        $PatientID = $row['PatientID'];
        $DoctorID = $row['DoctorID'];

        // --Build a nested SQL statement that will find the Doctor whose name and surname connects with the ID in the appointments table
        $sqlD = "SELECT Name, Surname FROM doctors WHERE DoctorID = '$DoctorID'";
        $resultD = $conn->query($sqlD);
        while ($rowD = $resultD->fetch_assoc()) {
            // ----Build the name output
            $DoctorName = $rowD['Name'] . ' ' . $rowD['Surname'];
        }

        // --Build a nested SQL statement that will find the patient whose name and surname connects with the ID in the appointments table
        $sqlP = "SELECT Name, Surname FROM patients WHERE PatientID = '$PatientID'";
        $resultP = $conn->query($sqlP);
        while ($rowP = $resultP->fetch_assoc()) {
            // ----Build the name output 
            $PatientName = $rowP['Name'] . ' ' . $rowP['Surname'];
        }

        // --Display the names and the doctor room
        echo '<tr>';
        echo '<td>' . $PatientName . '</td>';

        echo '<td>' . $DoctorName . '</td>';
        echo '<td style="border-right: 0px;">' . $row['DoctorRoom'] . '</td>';
        echo '<tr>';

    }

    echo '
    </tbody>
        </table>
        <a style="margin-left: 5px; color: black;" href="appointmentNew.php?date=' . $date . '" role="button">ADD NEW</a>
    </div>';

} else {
    $date_unselected = date("Y-m-d");

    $sql = "SELECT * FROM appointments WHERE AppointmentDate= '$date_unselected'";
    $result = $conn->query($sql);

    echo '
    <div id="dayplan_header">
        <h1 style="width: 450px; text-align: center; padding-top: 3.5%; color: white;"> ' . $date_unselected . ' </h1>
    </div>';

    echo '
    <div id="dayplan_body">
        <table id="dayplan_table">

            <tbody>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th style="border-right: 0px;">Room</th>
                </tr>';

    while ($row = $result->fetch_assoc()) {

        $PatientID = $row['PatientID'];
        $DoctorID = $row['DoctorID'];

        $sqlD = "SELECT Name, Surname FROM doctors WHERE DoctorID = '$DoctorID'";
        $resultD = $conn->query($sqlD);
        while ($rowD = $resultD->fetch_assoc()) {
            $DoctorName = $rowD['Name'] . ' ' . $rowD['Surname'];
        }

        $sqlP = "SELECT Name, Surname FROM patients WHERE PatientID = '$PatientID'";
        $resultP = $conn->query($sqlP);
        while ($rowP = $resultP->fetch_assoc()) {
            $PatientName = $rowP['Name'] . ' ' . $rowP['Surname'];
        }

        echo '<tr>';
        echo '<td>' . $PatientName . '</td>';

        echo '<td>' . $DoctorName . '</td>';
        echo '<td style="border-right: 0px;">' . $row['DoctorRoom'] . '</td>';
        echo '<tr>';

    }

    echo '
    </tbody>
        </table>
        <a style="margin-left: 5px; color: black;" href="appointmentNew.php?date=' . $date_unselected . '" role="button">ADD NEW</a>
    </div>';
}

$conn->close();

?>