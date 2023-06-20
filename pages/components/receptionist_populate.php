<?php
// See doctors_populate.php, this page works similar except for what data is displayed as it uses a different table.
error_reporting(0);

include 'actions/db.php';

// Find wether or not the current user is a superuser
if ($_SESSION["UserType"] == 'Head Receptionist') {
    $SuperUser_Global = true;
} else if ($_SESSION["UserType"] == 'Receptionist') {
    $SuperUser_Global = false;
}

$sql = "SELECT * FROM receptionist";
$result = $conn->query($sql);

if ($SuperUser_Global == true) {

    echo '<tr>';

    echo '<th class="th_all_table">Name</th>';
    echo '<th class="th_all_table">Rank</th>';

    echo '<th class="th_all_table">Email</th>';
    echo '<th class="th_all_table">Phone Number</th>';

    echo '<th class="th_all_table" style="border-right: 0px;"><a href="register.php" role="button">ADD NEW</a></th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {

        echo '<tr>';
        echo '<td style="color: #0098c7;"> <a href="receptionists.php?id=' . $row['RecepID'] . '">' . $row['Name'] . ' ' . $row['Surname'] . '</a></td>';
        echo '<td>' . $row['Rank'] . '</td>';

        echo '<td>' . $row['Email'] . '</td>';
        echo '<td>' . $row['PhoneNumber'] . '</td>';
        echo '<td style="border-right: 0px;"><a class="btn btn-danger" href="actions/delete.php?id=' . $row['RecepID'] . '&page=receptionist" role="button">Delete</a></td>';
        echo '<tr>';

    }

} else if ($SuperUser_Global == false) {

    echo '<tr>';

    echo '<th class="th_all_table">Name</th>';
    echo '<th class="th_all_table">Rank</th>';

    echo '<th class="th_all_table">Email</th>';
    echo '<th class="th_all_table">Phone Number</th>';

    while ($row = $result->fetch_assoc()) {

        echo '<tr>';
        echo '<td style="color: #0098c7;"> <a href="receptionists.php?id=' . $row['RecepID'] . '">' . $row['Name'] . ' ' . $row['Surname'] . '</a></td>';
        echo '<td>' . $row['Rank'] . '</td>';

        echo '<td>' . $row['Email'] . '</td>';
        echo '<td>' . $row['PhoneNumber'] . '</td>';
        echo '<tr>';

    }

}

$conn->close();

?>