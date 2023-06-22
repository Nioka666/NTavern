<?php
session_start();
require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST["fullname"];
  $rusername = $_POST["rusername"];
  $rpassword = $_POST["rpassword"];

  if (empty($fullname) || empty($rusername) || empty($rpassword)) {
    $error = "Harap isi semua kolom!";
    header("Location: ../index.php");
    exit();
  }

  $checkUsernameQuery = "SELECT * FROM account WHERE username = ?";
  $stmt = $conn->prepare($checkUsernameQuery);
  $stmt->bind_param("s", $rusername);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $error = "Username sudah digunakan. Silakan coba dengan username lain.";
    echo "<script>alert('$error'); window.location.href = '../index.php';</script>";
    exit();
  } else {
    $insertQuery = "INSERT INTO account (nama, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sss", $fullname, $rusername, $rpassword);

    if ($stmt->execute()) {
      $succes = "Succes Registered";
      echo "<script>alert('$succes'); window.location.href = '../index.php';</script>";
      exit();
    } else {
      $error = "Terjadi kesalahan. Silakan coba lagi.";
      echo "<script>alert('$error'); window.location.href = '../index.php';</script>";
      exit();
    }
  }
}

$conn->close();

// Adhim Niokagi
// Github : Nioka666

?>