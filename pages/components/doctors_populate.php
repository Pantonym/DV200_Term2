<?php
error_reporting(0);

include 'actions/db.php';

// Find wether or not the current user is a superuser
if ($_SESSION["UserType"] == 'Head Receptionist') {
    $SuperUser_Global = true;
} else if ($_SESSION["UserType"] == 'Receptionist') {
    $SuperUser_Global = false;
}

// Select all entities to display
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);

// If the user is a superuser
if ($SuperUser_Global == true) {

    // --Headers
    echo '<tr>';
    echo '<th class="th_all_table">Name</th>';
    echo '<th class="th_all_table">ID</th>';
    echo '<th class="th_all_table">Specialization</th>';

    echo '<th class="th_all_table">Email</th>';
    echo '<th class="th_all_table">Doctor Room</th>'; // ----Open the page to register a new doctor
    echo '<th class="th_all_table" style="border-right: 0px;"><a href="doctorRegister.php" role="button">ADD NEW</a></th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {

        // --Create an entry for each entity in the database. An add new and delete button will be available for the superuser to use
        echo '<tr>';
        echo '<td style="color: #0098c7;"> <a href="doctors.php?id=' . $row['DoctorID'] . '">' . $row['Name'] . ' ' . $row['Surname'] . '</a></td>';
        echo '<td>' . $row['DoctorID'] . '</td>';

        echo '<td>' . $row['Specialization'] . '</td>';
        echo '<td>' . $row['Email'] . '</td>';
        echo '<td>' . $row['DoctorRoom'] . '</td>'; // ----send the correct id to the DELETE page, as well as information on which database to target
        echo '<td style="border-right: 0px;"><a class="btn btn-danger" href="actions/delete.php?id=' . $row['DoctorID'] . '&page=doctor" role="button">Delete</a></td>';
        echo '<tr>';

    }

    // If the user is NOT a superuser
} else if ($SuperUser_Global == false) {

    echo '<tr>';
    echo '<th class="th_all_table">Name</th>';
    echo '<th class="th_all_table">ID</th>';
    echo '<th class="th_all_table">Specialization</th>';

    echo '<th class="th_all_table">Email</th>';
    echo '<th class="th_all_table">Doctor Room</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {

        echo '<tr>';
        echo '<td style="color: #0098c7;"> <a href="doctors.php?id=' . $row['DoctorID'] . '">' . $row['Name'] . ' ' . $row['Surname'] . '</a></td>';
        echo '<td>' . $row['DoctorID'] . '</td>';

        echo '<td>' . $row['Specialization'] . '</td>';
        echo '<td>' . $row['Email'] . '</td>';
        echo '<td>' . $row['DoctorRoom'] . '</td>';
        echo '<tr>';

    }

}

$conn->close();

?>