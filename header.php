<?php
require_once('config/config.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
} else {
    $users = $_SESSION['username'];
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - NTavern's</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar" id="navbar">
        <a href="dash.php">
            <h1 class="navbar-title" style="letter-spacing: 1.8px;"><span style="color: yellow">N</span>Tavern's</h1>
        </a>
        <div class="navbar-toggler" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </div>
        <div class="sidebar" id="sidebar">
            <h1 class="navbar-title" style="letter-spacing: 1.8px;"><span style="color: yellow">N</span>Tavern's</h1>
            <div class="short">
                <a href="dash.php"><i class="fas fa-home"></i><span>Dashboard</span></a>

                <a href="data_client.php"><i class="fas fa-users"></i><span>Data Client</span></a>

                <a href="menu_manage.php"><i class="fas fa-utensils"></i><span>Menu Manage</span></a>

                <a href="add_menu.php"><i class="fas fa-plus"></i><span>Add Menu</span></a>

                <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Log out</span></a>
            </div>
            <span class="close-btn" onclick="toggleSidebar()">
                <i class="fas fa-times"></i>
            </span>
        </div>
    </nav>