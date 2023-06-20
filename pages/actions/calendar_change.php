<?php
// This action is called when the user changes which date is selected in the appointments page.

// Collect the chosen date from the input
$date = $_POST['date_input'];

// Break the date down into its different parts (day, month, year)
$year = substr($date, 0, 4);
$month = substr($date, 5, 2);
$day = substr($date, 8, 2);

// Return the different sections of the date to the header to change the displayed date
header("location: ../appointments.php?date=" . $date . "&year=" . $year . "&month=" . $month . "&day=" . $day);

?>