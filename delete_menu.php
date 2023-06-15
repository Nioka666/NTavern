<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $menuId = $_GET["id"];

  $checkQuery = "SELECT * FROM menu WHERE id_menu = '$menuId'";
  $checkResult = $conn->query($checkQuery);

  if ($checkResult->num_rows > 0) {
    $deleteQuery = "DELETE FROM menu WHERE id_menu = '$menuId'";
    $deleteResult = $conn->query($deleteQuery);

    if ($deleteResult) {
      session_start();
      $_SESSION['success_message'] = "Menu successfully deleted.";
      header("Location: menu_manage.php");
      exit();
    } else {
      session_start();
      $_SESSION['error_message'] = "Failed to delete menu.";
      header("Location: menu_manage.php");
      exit();
    }
  } else {
    session_start();
    $_SESSION['error_message'] = "Menu not found.";
    header("Location: menu_manage.php");
    exit();
  }
} else {
  session_start();
  $_SESSION['error_message'] = "Invalid request.";
  header("Location: menu_manage.php");
  exit();
}

$conn->close();

?>
