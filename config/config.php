<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "restaurant";
    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        die("Koneksi gagal : " . mysqli_connect_error());
    }

    // Adhim Niokagi
    // Github : Nioka666
?>