<?php
include 'actions/db.php';

if (isset($_GET['date'])) {
    // Collect the selected date from the header
    $date = $_GET['date'];

    // Build the SQL to get all appointments for this date
    $sql = "SELECT * FROM appointments WHERE AppointmentDate= '$date'";
    $result = $conn->query($sql);

    // Header (displays the current date)
    echo '
    <div id="dayplan_header">
        <h1 style="width: 450px; text-align: center; padding-top: 3.5%; color: white;"> ' . $date . ' </h1>
    </div>';

    // Body (displays appointment information)
    echo '
    <div id="dayplan_body">
        <table id="dayplan_table">

            <tbody>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Room</th>
                    <th style="border-right: 0px; font-size: 18px;"> <a style="margin-left: 5px; color: black;" href="appointmentNew.php?date=' . $date . '" role="button">ADD NEW</a> </th>
                </tr>';

    // Display the relevant appointment information
    while ($row = $result->fetch_assoc()) {

        // --Collect relevant doctor and patient ID's
        $PatientID = $row['PatientID'];
        $DoctorID = $row['DoctorID'];

        // --Build sql queries to build their names because the database links their ID's to appointments to ensure there is no confusion in case someone has the same name as someone else.
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

        // --Display the collected information
        echo '<tr>';
        echo '<td style="border-bottom: 3px solid black;">' . $PatientName . '</td>';

        echo '<td style="border-bottom: 3px solid black;">' . $DoctorName . '</td>';
        echo '<td style="border-bottom: 3px solid black;">' . $row['DoctorRoom'] . '</td>';
        echo '<td style="border-right: 0px; border-bottom: 3px solid black;"> <a href="appointmentUpdate.php?id=' . $row['AppointmentID'] . '" style="color: black;">Edit</a> </td>';
        echo '<tr>';

    }

    echo '
    </tbody>
        </table>
    </div>';

} else {
    // Use the current date if no date has been selected. The output is built in a similar way to the selected date's output.
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
                    <th>Room</th>
                    <th style="border-right: 0px; font-size: 18px;"> <a style="margin-left: 5px; color: black;" href="appointmentNew.php?date=' . $date_unselected . '" role="button">ADD NEW</a> </th>
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
        echo '<td style="border-bottom: 3px solid black;">' . $PatientName . '</td>';

        echo '<td style="border-bottom: 3px solid black;">' . $DoctorName . '</td>';
        echo '<td style="border-bottom: 3px solid black;">' . $row['DoctorRoom'] . '</td>';
        echo '<td style="border-right: 0px; border-bottom: 3px solid black;"> <a href="appointmentUpdate.php?id=' . $row['AppointmentID'] . '" style="color: black;">Edit</a> </td>';
        echo '<tr>';

    }

    echo '
    </tbody>
        </table>
    </div>';
}

$conn->close();

?>