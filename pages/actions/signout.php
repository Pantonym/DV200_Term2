<?php
//session_start();

include 'db.php';

// remove all variables and close the session
session_unset();
session_destroy();

$conn->close();

// Return to the sign in page
header("location: ../index.php");

?>