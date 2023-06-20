<?php
// Create a session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- This page creates a new appointment -->

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
    <nav class="navbar navbar-expand-sm bg-none navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="appointments.php" style="margin-left: 50px; margin-top: -10px;">
                <img src="../assets/images/Logo.svg" alt="VeriCalm Logo" style="width:auto;" class="rounded-pill">
            </a>

            <ul class="navbar-nav" style="margin-right: 100px; padding-top: 15px;">
                <li class="nav-item" style="padding-top: 5px;">
                    <a class="nav-link nav_sign_out" href="actions/signout.php">Sign Out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_item nav_active" href="appointments.php">Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_item" href="patients.php">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_item" href="doctors.php">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_item" href="receptionists.php">Receptionists</a>
                </li>
            </ul>

        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Content -->
    <div class="row" style="margin-top: 20px;">
        <!-- --Text on left side of the screen -->
        <div class="col">
            <h1 style="margin-left: 150px; font-size: 60px; width: 600px;">New Appointment? <br> Create here!</h1>
        </div>

        <!-- --Input Form: callas the create.php action -->
        <form method="post" action="actions/create.php?db=appointment" class="col" style="margin-left: 15%;">

            <!-- --Title -->
            <h2 style="text-align: center; font-size: 46px; width: 400px;">Welcome</h2>
            <!-- --Inputs -->
            <div style="width: 400px; text-align: center;">
            <!-- call the appointment_inputs.php component -->
                <?php include 'components/appointment_inputs.php' ?>
            </div>

            <!-- --Submit Button -->
            <button type="submit" class="btn btn-primary button_signin" style="font-size: 20px;">Add Appointment</button>
        </form>
    </div>
    <!-- Content End -->

</body>