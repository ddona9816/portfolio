<?php
session_start();
require 'functions.php';

if(isset($_SESSION["login"])){
    header("Location: index.php?s=1");
    exit;
}


if(isset($_POST["login"])){
    $verify = verify_login($_POST["username"],$_POST["password"]);
    if($verify["s"]){
        $_SESSION["login"]=true;
        $_SESSION["user_id"]=$verify["id"];

        header("Location: index.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?= inc("styles"); ?>
    <style>
        /* Navbar Styling */
        .navbar {
            background-color: #333;
            padding: 15px 30px;
        }

        .navbar .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #fff;
        }

        .navbar .navbar-nav .nav-link {
            color: #ddd;
            font-size: 1rem;
            padding: 10px 15px;
        }

        .navbar .navbar-nav .nav-link:hover {
            background-color: #555;
            color: #fff;
        }

        .navbar-toggler {
            border: none;
            background-color: #444;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        .hire-btn {
            background-color: #28a745;
            color: #fff;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 30px;
            border: none;
            transition: background-color 0.3s;
        }

        .hire-btn:hover {
            background-color: #218838;
        }

        /* Login Form Styling */
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-form .form-title {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .login-form .form-label {
            font-size: 1rem;
            font-weight: bold;
        }

        .login-form .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 1rem;
        }

        .login-form button {
            width: 100%;
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .login-form button:hover {
            background-color: #218838;
        }

        .signup-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .signup-link a {
            color: #28a745;
            font-weight: bold;
        }

        /* Footer Styling */
        footer {
            background-color: #f8f9fa;
            padding: 40px 0;
        }

        footer h1 {
            font-size: 2rem;
            color: #333;
            font-weight: bold;
        }

        .address {
            font-size: 1rem;
            color: #666;
        }

        .address span {
            display: block;
            margin: 5px 0;
        }

        footer .row span {
            color: #888;
            font-size: 0.9rem;
        }

        footer .row span:hover {
            color: #333;
            text-decoration: underline;
            cursor: pointer;
        }

        /* Responsive Design for Smaller Screens */
        @media (max-width: 768px) {
            .navbar .navbar-brand {
                font-size: 1.2rem;
            }

            .navbar .navbar-nav .nav-link {
                font-size: 0.9rem;
            }

            footer h1 {
                font-size: 1.5rem;
            }

            footer .row span {
                font-size: 0.8rem;
            }

            .login-container {
                padding: 15px;
            }

            .login-form .form-title {
                font-size: 1.5rem;
            }
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-black">
        <div class="container">
            <a class="navbar-brand text-white" href="">2203010062 DWI FAJAR SARI ROMA DONA C</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href=""><b>HOME</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#education-section"><b>EDUCATION</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#project-section"><b>PROJECT</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact"><b>CONTACT</b></a></li>
                    <li class="nav-item">
                        <button class="btn hire-btn"><b>Hire me</b></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Form Login -->
    <div class="container login-container">
        <?php if($_SERVER["REQUEST_METHOD"]=="GET"): ?>
            <?php if(isset($_GET["s"]) && $_GET["s"]=="1"): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <div>Success Create Account</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <form action="" method="POST" class="login-form">
            <h2 class="form-title">Login</h2>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" autofocus required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
            <span class="signup-link">
                Don't have an account? 
                <a href="signup.php" class="btn text-primary">Signup</a>
                Now!
            </span>
        </form>
    </div>

    <!-- Footer -->
    <footer class="mt-5" id="contact">
        <div class="container-fluid bg-body-tertiary text-dark pt-3">
            <div class="row mb-4">
                <div class="col-md-5">
                    <h1>Contact</h1>
                    <div class="address row">
                        <span><b>Address</b></span>
                        <span>Jl air tanjung, Tasikmalaya</span>
                        <span>Jawa Barat, Indonesia</span>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 d-flex flex-row justify-content-evenly">
                    <span>&copy; 2025 muhamad_taufikakbar.ct.ws</span><span> </span> <span>All rights reserved</span><span> </span><span>Privacy Policy</span>
                </div>
            </div>

        </div>
    </footer>
<?= inc("scripts"); ?>
</body>
</html>


<!-- 

<div class="alert alert-${type} alert-dismissible" role="alert">
    <div>${message}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
wrapper.innerHTML = [
    ``,
    `   `,
    '   ',
    ''
  ].join('')



-->