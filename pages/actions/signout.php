<?php

include 'db.php';
// Change all users to be signed out
$sql = "UPDATE receptionist SET SignedIn = '0' WHERE SignedIn = '1'";
$result = $conn->query($sql);

$conn->close();
header("location: ../index.php");

?>