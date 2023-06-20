<!DOCTYPE html>
<html lang="en">
    <!-- This page adds a new receptionist -->

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
                    <a class="nav-link nav_item" href="appointments.php">Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_item" href="patients.php">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_item" href="doctors.php">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav_item nav_active" href="receptionists.php">Receptionists</a>
                </li>
            </ul>

        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Content -->
    <div class="row" style="margin-top: 20px;">
        <!-- --Text on left side of the screen -->
        <div class="col">
            <h1 style="margin-left: 150px; font-size: 60px; width: 600px;">New Here? <br> Create an Account!</h1>
        </div>

        <!-- --Input Form -->
        <form method="post" action="actions/create.php?db=receptionist" class="col" style="margin-left: 15%;">

            <!-- --Title -->
            <h2 style="text-align: center; font-size: 46px; width: 400px;">Welcome Superuser</h2>
            <br>

            <!-- --Inputs -->
            <!-- ----Name & Surname -->
            <div class="input-group mb-3 input_signin">
                <input type="text" style="border-right: 0px; border-color: black;" class="form-control" name="name"
                    placeholder="Enter Name">

                <button class="btn btn_signin" type="button" style="width: 50px;"><span>&#10005;</span></button>

                <input type="text" style="border-right: 0px; border-color: black;" class="form-control" name="surname"
                    placeholder="Enter Surname">

                <button class="btn btn_signin" type="button" style="width: 50px;"><span>&#10005;</span></button>
            </div>

            <!-- ----Password -->
            <div class="input-group mb-3 input_signin">
                <input type="password" style="border-right: 0px; border-color: black;" class="form-control"
                    name="password" placeholder="Search" id="SignUp_Pass_Input">

                <button class="btn btn_signin" type="button" style="width: 50px;" onclick="ShowPass()">
                    <span><img src="../assets/images/PasswordShowHide.svg" alt="Show/Hide Password"></span>
                </button>
            </div>

            <!-- ----Age & Gender -->
            <div class="input-group mb-3 input_signin">
                <input type="text" style="border-right: 0px; border-color: black;" class="form-control" name="age"
                    placeholder="Age" id="SignUp_Pass_Input">
                <input type="text" style="border-right: 0px; border-color: black;" class="form-control" name="gender"
                    placeholder="Gender" id="SignUp_Pass_Input">
                <button class="btn btn_signin" type="button" style="width: 50px;"><span>&#10005;</span></button>
            </div>

            <!-- ----Email -->
            <div class="input-group mb-3 input_signin">
                <input type="text" style="border-right: 0px; border-color: black;" class="form-control" name="email"
                    placeholder="Enter Email">
                <button class="btn btn_signin" type="button" style="width: 50px;"><span>&#10005;</span></button>
            </div>

            <!-- ----Phone Number -->
            <div class="input-group mb-3 input_signin">
                <input type="text" style="border-right: 0px; border-color: black;" class="form-control" name="phonenum"
                    placeholder="Phone Number" id="SignUp_Pass_Input">
                <button class="btn btn_signin" type="button" style="width: 50px;"><span>&#10005;</span></button>
            </div>

            <!-- ----Rank -->
            <div class="input-group mb-3 input_signin">
                <input type="text" style="border-right: 0px; border-color: black;" class="form-control" name="rank"
                    placeholder="Enter Rank" id="SignUp_Pass_Input">
                <button class="btn btn_signin" type="button" style="width: 50px;"><span>&#10005;</span></button>
            </div>

            <!-- --Submit Button -->
            <button type="submit" class="btn btn-primary button_signin">Register</button>
        </form>
    </div>
    <!-- Content End -->

</body>