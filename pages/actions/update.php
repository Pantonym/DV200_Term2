<?php
//WORK IN PROGRESS

include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$score = $_POST['score'];

$sql = "UPDATE demo_table SET name = '$name', score = '$score' WHERE id = '$id' ";

$result = $conn->query($sql);

$conn->close();
header("location: index.php");

?>