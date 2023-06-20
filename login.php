<?php
session_start();
require_once('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST["username"];
  $pass = $_POST["password"];

  if (!empty($user) && !empty($pass)) {
    $sql = "SELECT * FROM account WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
      $_SESSION["username"] = $user;
      header("Location: dash.php");
      exit();
    } else {
      $error = "Username atau password salah!";
      echo "<script>alert('$error'); window.location.href = 'index.php';</script>";
      exit();
    }
  } else {
    $error = "Harap isi semua kolom!";
    header("Location: index.php");
    exit();
  }
}

$conn->close();
?>