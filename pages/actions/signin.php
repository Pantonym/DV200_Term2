<?php
// Login Admin:
// --Username: Clint
// --Password: Clint
// Login Normal:
// --Username: Janet
// --Password: Password

// ----Create a session
session_start();
include 'db.php';

// Gather all receptionists to test who is logging in
$sql = "SELECT * FROM receptionist";
$result = $conn->query($sql);

// Gather the items that the user submitted
$Username = $_GET['signin_name'];
$Password = $_GET['signin_pass'];

// Test the data with what the user submitted
while ($row = $result->fetch_assoc()) {

    // --If the name is correct
    if ($row['Name'] == $Username) {

        // ----The name has been found. This will be used for error message generation
        $bFoundName = true;

        // ----Collect the encrypted password from the database (It has been encrypted using password_hash() during receptionist update/creation)
        $Password_Hash = $row['Password'];
        // ----Verify the encrypted password with the one the user submitted using the password_verify() function
        $verification_result = password_verify($Password, $Password_Hash);

        // --If the password is correct
        if ($verification_result == true) {
            // ----The password has been found.
            $bFoundPass = true;

            // ----Store session variables
            $_SESSION["UserType"] = $row['Rank'];
            $_SESSION["ID"] = $row['RecepID'];

            //----exit the loop
            break;

            // --If the password is incorrect
        } else {
            $bFoundPass = false;

            // ----Exit the loop
            break;
        }

        // ----If no matching User is found
    } else {
        $bFoundName = false;
    }

}

// Error message generation
if ($bFoundName == false) {

    header("location: ../index.php?error=Incorrect Name");

} else if ($bFoundName == true && $bFoundPass == false) {

    header("location: ../index.php?error=Incorrect Password");

} else if ($bFoundName == true && $bFoundPass == true) {

    header("location: ../appointments.php");

}

$conn->close();

?>