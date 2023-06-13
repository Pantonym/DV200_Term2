<?php

include 'db.php';

$sql = "SELECT * FROM receptionist";
$result = $conn->query($sql);

$Username = $_GET['signin_name'];
$Password = $_GET['signin_pass'];

while ($row = $result->fetch_assoc()) {

    // If the Name is correct
    if ($row['Name'] == $Username) {

        $bFoundName = true;

        // --Test if the password is correct
        if ($row['Password'] == $Password) {
            $bFoundPass = true;

            // ----Change which user is currently signed in
            $sql2 = "UPDATE receptionist SET SignedIn = '1' WHERE Password = '$Password'";
            $result = $conn->query($sql2);

            //----exit the loop
            break;

            // --Password is incorrect
        } else {
            $bFoundPass = false;

            //----exit the loop
            break;
        }

        // ----If no matching User is found
    } else {
        $bFoundName = false;
    }

}

if ($bFoundName == false) {

    header("location: ../index.php?error=Incorrect Name");

} else if ($bFoundName == true && $bFoundPass == false) {

    header("location: ../index.php?error=Incorrect Password");

} else if ($bFoundName == true && $bFoundPass == true) {

    header("location: ../appointments.php");

}

$conn->close();

?>