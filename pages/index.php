<?php
// Create a session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- This is the login page -->
<!-- Sign In Information:
    SuperUser:
        Username: Clint
        Password: Clint
    Normal User:
        Username: Janet
        Password: Password
-->

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- https://www.w3schools.com/bootstrap5/bootstrap_navbar.php -->
    <link rel="stylesheet" href="../css/main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/index.js"></script>

</head>

<body id="bg_signin" class="actor" style="width: 99%;">

    <!-- Background effects -->
    <div class="Circle_BG_1"></div>
    <div class="Circle_BG_2"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm bg-none navbar-light" style="margin-left: 50px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/images/Logo.svg" alt="VeriCalm Logo" style="width:auto;" class="rounded-pill">
            </a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Content -->
    <div class="row" style="margin-top: 100px;">
        <!-- --Text on left side of the screen -->
        <div class="col">
            <h1 style="margin-left: 150px; font-size: 60px; width: 600px;">Sign in to <br> manage appointments</h1>
        </div>

        <!-- --Input Form -->
        <form class="col" style="margin-left: 15%;" action="actions/signin.php">

            <!-- --Title -->
            <h2 style="text-align: center; font-size: 46px; width: 400px;">Welcome Back</h2>

            <br>

            <!-- --Inputs -->
            <div class="input-group mb-3 input_signin">
                <input type="text" style="border-right: 0px; border-color: black;" class="form-control"
                    name="signin_name" placeholder="Enter Name">
                <button class="btn btn_signin" type="button" style="width: 50px;"><span>&#10005;</span></button>
            </div>

            <div class="input-group mb-3 input_signin">
                <input type="password" style="border-right: 0px; border-color: black;" class="form-control"
                    name="signin_pass" placeholder="Search" id="SignUp_Pass_Input">
                <button class="btn btn_signin" type="button" style="width: 50px;" onclick="ShowPass()">
                    <span><img src="../assets/images/PasswordShowHide.svg" alt="Show/Hide Password"></span>
                </button>
            </div>

            <!-- --Submit Button -->
            <button type="Submit" class="btn btn-primary button_signin">Sign In</button>
            <?php
            if (isset($_GET['error'])) { ?>

                <p style="color: red; width: 400px; text-align: center; font-size: 24px;">
                    <?php echo $_GET['error']; ?>
                </p>

            <?php } ?>

        </form>
    </div>
    <!-- Content End -->


</body>