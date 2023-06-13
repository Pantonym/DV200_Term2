<?php

$date = $_POST['date_input'];

$year = substr($date, 0, 4);
$month = substr($date, 5, 2);
$day = substr($date, 8, 2);

header("location: ../appointments.php?date=" . $date . "&year=" . $year . "&month=" . $month . "&day=" . $day);

?>