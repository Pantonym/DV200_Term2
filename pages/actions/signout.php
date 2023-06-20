<?php

include 'db.php';

// Change the user to be signed out
$sql = "UPDATE receptionist SET SignedIn = '0' WHERE SignedIn = '1'";
$result = $conn->query($sql);

$conn->close();

// Return to the sign in page
header("location: ../index.php");

?>