<?php
include "header.php";

$id_menu = isset($_GET["id_menu"]) ? $_GET["id_menu"] : "";

if (empty($id_menu)) {
  header("Location: menu_manage.php");
  exit();
}

$alertMessage = "";
$name = "";
$price = "";
$category = "";
$imageName = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["edit_menu"])) {
    $name = $_POST["nama_menu"];
    $price = $_POST["harga_menu"];
    $category = $_POST["kategori"];

    if (!empty($name) && !empty($price) && !empty($category)) {
      $sql = "UPDATE menu SET name = '$name', price = '$price', category = '$category' WHERE id_menu = $id_menu";

      if ($conn->query($sql) === TRUE) {
        $alertMessage = '<div id="alert-message" class="alert alert-success" role="alert">
                          Menu data successfully updated!
                        </div>';
      } else {
        $alertMessage = '<div id="alert-message" class="alert alert-danger" role="alert">
                          An error occurred. Failed to update menu data.
                        </div>';
      }
    } else {
      $alertMessage = '<div id="alert-message" class="alert alert-danger" role="alert">Please complete all input fields.</div>';
    }

    if (!empty($_FILES["gambar_menu"]["name"])) {
      $imageName = $_FILES["gambar_menu"]["name"];
      $imageTmp = $_FILES["gambar_menu"]["tmp_name"];
      $imagePath = "/img" . $imageName;
      move_uploaded_file($imageTmp, $imagePath);

      $sql = "UPDATE menu SET image = '$imageName' WHERE id_menu = $id_menu";

      if ($conn->query($sql) === TRUE) {
      } else {
        $alertMessage .= '<div id="alert-message" class="alert alert-danger" role="alert">
                    An error occurred. Failed to upload image.
                  </div>';
      }
    }
  }
}

$sql = "SELECT * FROM menu WHERE id_menu = $id_menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $name = $row["name"];
  $price = $row["price"];
  $category = $row["category"];
  $imageName = $row["image"];
} else {
  $alertMessage = '<div id="alert-message" class="alert alert-danger" role="alert">Menu data not found.</div>';
  header("Location: menu_manage.php");
  exit();
}

$conn->close();
?>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#000000" fill-opacity="1" d="M0,192L30,186.7C60,181,120,171,180,170.7C240,171,300,181,360,186.7C420,192,480,192,540,170.7C600,149,660,107,720,117.3C780,128,840,192,900,213.3C960,235,1020,213,1080,181.3C1140,149,1200,107,1260,96C1320,85,1380,107,1410,117.3L1440,128L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
</svg>

<div class="container-form">
  <form action="<?php echo $_SERVER['PHP_SELF'] . '?id_menu=' . $id_menu; ?>" method="POST" enctype="multipart/form-data" class="form-add-menu">
    <center>
      <h1>Menu Data</h1>
    </center>
    <?php echo $alertMessage; ?>
    <label for="nama_menu" class="label-nama-menu">Nama Menu :</label>
    <input type="text" name="nama_menu" id="nama_menu" required class="input-nama-menu" placeholder="Enter Menu Name" value="<?php echo $name; ?>">

    <label for="harga_menu" class="label-harga-menu">Price (USD) :</label>
    <input type="text" name="harga_menu" id="harga_menu" required class="input-harga-menu" placeholder="Ex : 10.99" value="<?php echo $price; ?>">
    <select name="kategori" id="kategori" required class="input-kategori">
      <option value="" selected disabled>Select Category</option>
      <option value="maincourse" <?php echo ($category == "maincourse") ? "selected" : ""; ?>>Main Course</option>
      <option value="dessert" <?php echo ($category == "dessert") ? "selected" : ""; ?>>Dessert</option>
    </select>
    <div class="upload-container">
      <input type="file" name="gambar_menu" id="gambar_menu" class="input-gambar-menu" accept="image/*">
      <label for="gambar_menu" class="custom-file-upload">
        <i class="fas fa-image"></i><span style="margin-left: 8px;">Choose image</span>
      </label>
      <span style="margin-left: 8px;" id="uploaded-file"><?php echo $imageName; ?></span>
    </div>
    <input type="submit" name="edit_menu" value="Submit" class="btn-add-menu">
  </form>
  <div class="content-add-form" id="main_course">
    <div class="hero">
      <h2>Edit the Menu</h2>
      <p>Adding menus is a breeze: just fill in the name, price, category, upload the image, and click submit. Enjoy the convenience of updating your menu effortlessly!</p>
      <a href="menu_manage.php"><button>Go Menu Manager</button></a><br>
      <a href="dash.php"><button id="kiri">Go Menu</button></a>
    </div>
  </div>
</div>

<script>
  document.getElementById("gambar_menu").addEventListener("change", function() {
    var fileInput = this;
    var fileName = fileInput.files[0].name;
    var uploadedFileElement = document.getElementById("uploaded-file");
    uploadedFileElement.textContent = fileName;
  });

  setTimeout(function() {
    var alertMessage = document.getElementById("alert-message");
    if (alertMessage) {
      alertMessage.style.display = "none";
    }
  }, 2000);
</script>

<?php 
  include "footer.php"; 
  //  Adhim Niokagi
  //  Github : Nioka666
?>