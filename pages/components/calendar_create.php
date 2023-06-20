<?php
// Get the current day, month and year
$SelectedDay = date("d");
$SelectedMonth = date("m");
// --Get teh current month in a separate format for displaying
$SelectedMonth2 = date("M");
$SelectedYear = date("Y");

// Title (current month & year + arrows)
echo '
<div class="month">
    <ul class="calendar">
        <li class="prev">&#10094;</li>
        <li class="next">&#10095;</li>
        <li>' . $SelectedMonth2 . '<br><span style="font-size:18px"> ' . $SelectedYear . '</span></li>
    </ul>
</div>';

// Days Title
echo '
<div class="weekdays calendar" style="text-align: center;">
    <form method="post" action="actions/calendar_change.php">
        <input type="date" name="date_input" value="' . $SelectedYear . '-' . $SelectedMonth . '-' . $SelectedDay . '">
        <button>Select Date</button>
    </form>
</div>';

echo '
<ul class="days calendar">';

// Populate Calendar
switch ($SelectedMonth) {
    // --January
    case "01":

        for ($k = 1; $k <= 31; $k++) {

            if ($k == intval($SelectedDay)) {
                echo '<li><span class="active">' . $k . '</span></li>';
            } else {
                echo '<li>' . $k . '</li>';
            }

        }

        break;
    // --February
    case "02":

        // ----test for leap years
        if ((intval($SelectedYear) % 4) == 0) {
            for ($k = 1; $k <= 29; $k++) {

                if ($k == intval($SelectedDay)) {
                    echo '<li><span class="active">' . $k . '</span></li>';
                } else {
                    echo '<li>' . $k . '</li>';
                }

            }
        } else {

            for ($k = 1; $k <= 28; $k++) {

                if ($k == intval($SelectedDay)) {
                    echo '<li><span class="active">' . $k . '</span></li>';
                } else {
                    echo '<li>' . $k . '</li>';
                }

            }
        }

        break;
    // --March
    case "03":

        for ($k = 1; $k <= 31; $k++) {

            if ($k == intval($SelectedDay)) {
                echo '<li><span class="active">' . $k . '</span></li>';
            } else {
                echo '<li>' . $k . '</li>';
            }

        }

        break;
    // --April
    case "04":

        for ($k = 1; $k <= 30; $k++) {

            if ($k == intval($SelectedDay)) {
                echo '<li><span class="active">' . $k . '</span></li>';
            } else {
                echo '<li>' . $k . '</li>';
            }

        }

        break;
    // --May
    case "05":

        for ($k = 1; $k <= 31; $k++) {

            if ($k == intval($SelectedDay)) {
                echo '<li><span class="active">' . $k . '</span></li>';
            } else {
                echo '<li>' . $k . '</li>';
            }

        }

        break;
    // --June
    case "06":

        for ($k = 1; $k <= 30; $k++) {

            if ($k == intval($SelectedDay)) {
                echo '<li><span class="active">' . $k . '</span></li>';
            } else {
                echo '<li>' . $k . '</li>';
            }

        }

        break;
    // --July
    case "07":

        for ($k = 1; $k <= 31; $k++) {

            if ($k == intval($SelectedDay)) {
                echo '<li><span class="active">' . $k . '</span></li>';
            } else {
                echo '<li>' . $k . '</li>';
            }

        }

        break;
    // --August
    case "08":

        for ($k = 1; $k <= 31; $k++) {

            if ($k == intval($SelectedDay)) {
                echo '<li><span class="active">' . $k . '</span></li>';
            } else {
                echo '<li>' . $k . '</li>';
            }

        }

        break;
    // --September
    case "09":

        for ($k = 1; $k <= 30; $k++) {

            if ($k == intval($SelectedDay)) {
                echo '<li><span class="active">' . $k . '</span></li>';
            } else {
                echo '<li>' . $k . '</li>';
            }

        }

        break;
    // --October
    case "10":

        for ($k = 1; $k <= 31; $k++) {

            if ($k == intval($SelectedDay)) {
                echo '<li><span class="active">' . $k . '</span></li>';
            } else {
                echo '<li>' . $k . '</li>';
            }

        }

        break;
    // --November
    case "11":

        for ($k = 1; $k <= 30; $k++) {

            if ($k == intval($SelectedDay)) {
                echo '<li><span class="active">' . $k . '</span></li>';
            } else {
                echo '<li>' . $k . '</li>';
            }

        }

        break;
    // --December
    case "12":

        for ($k = 1; $k <= 31; $k++) {

            if ($k == intval($SelectedDay)) {
                echo '<li><span class="active">' . $k . '</span></li>';
            } else {
                echo '<li>' . $k . '</li>';
            }

        }

        break;
}

echo '</ul>';

?>