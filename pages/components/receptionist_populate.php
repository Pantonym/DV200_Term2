<?php
error_reporting(0);

include 'actions/db.php';

$sql_test = "SELECT * FROM receptionist WHERE SignedIn = '1'";
$result_test = $conn->query($sql_test);

while ($row_test = $result_test->fetch_assoc()) {

    if ($row_test['Rank'] == 'Head Receptionist') {
        $SuperUser_Global = true;
    } else if ($row_test['Rank'] == 'Receptionist') {
        $SuperUser_Global = false;
    }

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