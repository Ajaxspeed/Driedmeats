<?php session_start()?>
<?php  require 'db/Database.php'?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <title>Driedmeats</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body class="d-flex flex-column min-vh-100" style="color: white">
<nav class="navbar navbar-dark navbar-expand-sm sticky-top bg-primary">
<div class="container-fluid">
    <a class="navbar-brand" href="/">
        <img src="res/logo.png" alt="logo">
    </a>
    <ul class="navbar-nav d-flex h5" style="">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Kategorie</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Hovězí</a></li>
                <li><a class="dropdown-item" href="#">Vepřové</a></li>
                <li><a class="dropdown-item" href="#">Krůtí</a></li>
                <li><a class="dropdown-item" href="#">Zvěřinové</a></li>
            </ul>
        </li>
        <?php if (empty($_SESSION['lg_email'])): ?>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Přihlásit se</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="signup.php">Registrace</a>
        </li>
        <?php endif;?>

        <?php if (!empty($_SESSION['lg_email'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="#">Účet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Odhlásit se</a>
            </li>
        <?php endif;?>

        <li class="nav-item">
            <a class="nav-link" href="cart.php">Košík</a>
        </li>

    </ul>
</div>
</nav>
