<?php
include "header.php";

$alertMessage = "";
$nama = "";
$username = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["edit_client"])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!empty($id) && !empty($nama) && !empty($username) && !empty($password)) {
      $sql = "SELECT * FROM account WHERE id = $id";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $sql = "UPDATE account SET nama = '$nama', username = '$username', password = '$password' WHERE id = $id";
      
        if ($conn->query($sql) === TRUE) {
          $alertMessage = '<div class="alert alert-success" role="alert">
                            Data client berhasil diperbarui!
                          </div>';
        } else {
          $alertMessage = '<div class="alert alert-danger" role="alert">
                            Terjadi kesalahan. Gagal memperbarui data client.
                          </div>';
        }
      } else {
        $alertMessage = '<div class="alert alert-danger" role="alert">
                          Data client tidak ditemukan.
                        </div>';
      }
    } else {
      $alertMessage = '<div class="alert alert-danger" role="alert">
                        Harap lengkapi semua kolom input.
                      </div>';
    }
  }
}

$id = isset($_GET["id"]) ? $_GET["id"] : "";

if (!empty($id)) {
  $sql = "SELECT * FROM account WHERE id = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama = $row["nama"];
    $username = $row["username"];
    $password = $row["password"];
  } else {
    $alertMessage = '<div class="alert alert-danger" role="alert">
                    Data client tidak ditemukan.
                  </div>';
    header("Location: data_client.php");
    exit();
  }
  
} else {
  $alertMessage = '<div class="alert alert-danger" role="alert">
                    Data client tidak ditemukan.
                  </div>';
  header("Location: data_client.php");
  exit();
}

$conn->close();
?>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#000000" fill-opacity="1" d="M0,192L30,186.7C60,181,120,171,180,170.7C240,171,300,181,360,186.7C420,192,480,192,540,170.7C600,149,660,107,720,117.3C780,128,840,192,900,213.3C960,235,1020,213,1080,181.3C1140,149,1200,107,1260,96C1320,85,1380,107,1410,117.3L1440,128L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg>

<div class="container-form">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="form-add-menu">
    <center><h1>Data Client</h1></center>
    <?php echo $alertMessage; ?>
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <label for="nama" class="label-nama-menu">Name :</label>
    <input type="text" name="nama" id="nama" required class="input-nama-menu" placeholder="Masukkan nama client" value="<?php echo $nama; ?>">

    <label for="username" class="label-harga-menu">Username :</label>
    <input type="text" name="username" id="username" required class="input-harga-menu" placeholder="Masukkan username client" value="<?php echo $username; ?>">

    <label for="password" class="label-harga-menu">Password :</label>
    <input type="text" name="password" id="password" required class="input-harga-menu" placeholder="Masukkan password client" value="<?php echo $password; ?>">
    
    <input type="submit" name="edit_client" value="Update" class="btn-add-menu">
  </form>
  <div class="content-add-form" id="main_course">
    <div class="hero">
      <h2>Edit Data Client</h2>
      <p>Editing client data is easy: simply fill in the ID, name, username, password, and click the update button. Enjoy the convenience of updating client data effortlessly!</p>
      <a href="data_client.php"><button>Go back to Client Data</button></a>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>
