<?php
session_start();
include "koneksi.php";

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $sql = "DELETE FROM account WHERE id = '$id'";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Client successfully deleted.";
  } else {
    $_SESSION['error_message'] = "Failed to delete client.";
  }
}

$conn->close();
