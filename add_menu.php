<?php
include "header.php";
?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#000000" fill-opacity="1" d="M0,192L30,186.7C60,181,120,171,180,170.7C240,171,300,181,360,186.7C420,192,480,192,540,170.7C600,149,660,107,720,117.3C780,128,840,192,900,213.3C960,235,1020,213,1080,181.3C1140,149,1200,107,1260,96C1320,85,1380,107,1410,117.3L1440,128L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
</svg>
<div class="container-form">
  <?php
  $alertMessage = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add_menu"])) {
      $kategori = $_POST["kategori"];
      $nama_menu = $_POST["nama_menu"];
      $harga_menu = $_POST["harga_menu"];
      $gambar_menu = $_FILES["gambar_menu"]["name"];
      $gambar_tmp = $_FILES["gambar_menu"]["tmp_name"];

      if (!empty($kategori) && !empty($nama_menu) && !empty($harga_menu)) {
        if (!empty($gambar_menu)) {
          $folder_tujuan = "img/";
          $file_tujuan = $folder_tujuan . $gambar_menu;
          move_uploaded_file($gambar_tmp, $file_tujuan);

          $sql = "INSERT INTO menu (name, id_menu, price, image, category) VALUES ('$nama_menu', NULL, '$harga_menu', '$gambar_menu', '$kategori')";

          $checkMenuQuery = "SELECT * FROM menu WHERE name = '$nama_menu'";
          $checkMenuResult = $conn->query($checkMenuQuery);

          if ($checkMenuResult->num_rows > 0) {
            $alertMessage = '<div class="alert alert-danger" role="alert">
                            Nama menu sudah ada dalam database!
                          </div>';
            header("refresh:1.8; url=add_menu.php");
          } else {
            if ($conn->query($sql) === TRUE) {
              $alertMessage = '<div class="alert alert-success" role="alert">Menu berhasil ditambahkan!</div>';
              header("refresh:1.8; url=add_menu.php");
            } else {
              $alertMessage = '<div class="alert alert-danger" role="alert">Terjadi kesalahan. Menu gagal ditambahkan.</div>';
              header("refresh:1.8; url=add_menu.php");
            }
          }
        } else {
          $alertMessage = '<div class="alert alert-danger" role="alert">Harap unggah gambar menu.</div>';
          header("refresh:1.8; url=add_menu.php");
        }
      } else {
        $alertMessage = '<div class="alert alert-danger" role="alert">Harap lengkapi semua kolom input.</div>';
        header("refresh:1.8; url=add_menu.php");
      }
    }
  }

  $conn->close();
  ?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="form-add-menu">
    <center>
      <h1>Add Menu</h1>
    </center>
    <?php echo $alertMessage; ?>
    <label for="nama_menu" class="label-nama-menu">Nama Menu:</label>
    <input type="text" name="nama_menu" id="nama_menu" required class="input-nama-menu" placeholder="Enter Menu Name">
    <!-- Nioka666 -->
    <label for="harga_menu" class="label-harga-menu">Price (USD):</label>
    <input type="text" name="harga_menu" id="harga_menu" required class="input-harga-menu" placeholder="Ex : 10.99">
    <!-- Nioka666 -->
    <select name="kategori" id="kategori" required class="input-kategori">
      <option value="" selected disabled>Select Category</option>
      <option value="maincourse" <?php echo (isset($kategori) && $kategori == "maincourse") ? "selected" : ""; ?>>Main Course</option>
      <option value="dessert" <?php echo (isset($kategori) && $kategori == "dessert") ? "selected" : ""; ?>>Dessert</option>
    </select>
    <div class="upload-container">
      <input type="file" name="gambar_menu" id="gambar_menu" class="input-gambar-menu" accept="image/*">
      <label for="gambar_menu" class="custom-file-upload">
        <i class="fas fa-image"></i><span style="margin-left: 8px;">Choose image</span>
      </label>
      <span style="margin-left: 8px;" id="uploaded-file"></span>
    </div>
    <input type="submit" name="add_menu" value="Submit" class="btn-add-menu">
  </form>
  <div class="content-add-form" id="main_course">
    <div class="hero">
      <h2>Add the Menu</h2>
      <p>Adding menus is a breeze: just fill in the name, price, category, upload the image, and click submit. Enjoy the convenience of updating your menu effortlessly!</p>
      <a href="dash.php"><button>Go Menu</button></a>
      <a href="menu_manage.php"><button style="margin-left: 6px;">Go Menu Manager</button></a>
    </div>
  </div>
</div>
<!-- Nioka666 -->
<script>
  const fileInput = document.getElementById('gambar_menu');
  const uploadedFile = document.getElementById('uploaded-file');

  fileInput.addEventListener('change', function() {
    const file = this.files[0];
    const validImageExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (file) {
      const extension = file.name.split('.').pop().toLowerCase();
      const isValidExtension = validImageExtensions.includes(extension);

      if (isValidExtension) {
        uploadedFile.textContent = file.name;
      } else {
        uploadedFile.textContent = 'Ekstensi file tidak valid!';
        this.value = '';
      }
    }
  });
</script>

<?php
  include "footer.php";
?>