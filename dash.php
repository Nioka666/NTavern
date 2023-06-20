<?php
include "header.php";

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status === 'success') {
        $statusClass = 'success';
    } elseif ($status === 'error') {
        $statusClass = 'error';
    }
}

$sql_menu = "SELECT * FROM menu";
$result_menu = $conn->query($sql_menu);

?>

<div class="container" style="background-image: url(img/r1.jpg)">
    <div>
        <h1>Welcome<?= $_SESSION["username"] ?>!</h1>
        <p>Savor the culinary experience of Nioka Brasserie,<br>where every dish is a delight.</p>
        <a href="#main_course"><button>See More</button></a>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#000000" fill-opacity="1" d="M0,192L30,186.7C60,181,120,171,180,170.7C240,171,300,181,360,186.7C420,192,480,192,540,170.7C600,149,660,107,720,117.3C780,128,840,192,900,213.3C960,235,1020,213,1080,181.3C1140,149,1200,107,1260,96C1320,85,1380,107,1410,117.3L1440,128L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z">
    </path>
</svg>
<div class="content">
    <div class="hero" id="main_course">
        <h2>Maincourse</h2>
        <p>Features a selection of our most sought-after and beloved dishes. From perfectly grilled premium steaks to
        tantalizingly sweet desserts, each item in our Poppulars menu is crafted to deliver an unforgettable
        culinary experience. Every bite will indulge your taste buds and satisfy your cravings for exceptional
        flavors.</p>
    </div>
</div>
<div class="blog">
<?php
    if ($result_menu->num_rows > 0) {
        while ($row = $result_menu->fetch_assoc()) {
            if ($row['category'] === 'maincourse') {
                $image_path = "img/" . $row['image'];
                echo '<article>';
                echo '<div class="image-container">';
                echo '<img src="' . $image_path . '" alt="' . $row['name'] . '">';
                echo '</div>';
                echo '<div class="info">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<span>USD $' . $row['price'] . '</span>';
                echo '<button>Order Now</button>';
                echo '<i class="fas fa-ellipsis-v"></i>';
                echo '</div>';
                echo '</article>';
            }
        }
    } else {
        echo '<p>No main course menu found.</p>';
    }
?>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#232323" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,218.7C384,235,480,245,576,245.3C672,245,768,235,864,240C960,245,1056,267,1152,266.7C1248,267,1344,245,1392,234.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
    </path>
</svg>
<div class="svg-dessert">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#232323" fill-opacity="1" d="M0,224L34.3,234.7C68.6,245,137,267,206,256C274.3,245,343,203,411,176C480,149,549,139,617,133.3C685.7,128,754,128,823,112C891.4,96,960,64,1029,80C1097.1,96,1166,160,1234,186.7C1302.9,213,1371,203,1406,197.3L1440,192L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
        </path>
    </svg>
</div>
<div class="content">
    <div class="hero" id="dessert">
        <h2>Dessert</h2>
        <p>Features a selection of our most sought-after and beloved dishes. From perfectly grilled premium steaks to
            tantalizingly sweet desserts, each item in our Poppulars menu is crafted to deliver an unforgettable
            culinary experience. Every bite will indulge your taste buds and satisfy your cravings for exceptional
            flavors.</p>
    </div>
</div>
<div class="blog">
    <?php
    $result_menu->data_seek(0);

    if ($result_menu->num_rows > 0) {
        while ($row = $result_menu->fetch_assoc()) {
            if ($row['category'] === 'dessert') {
                $image_path = "img/" . $row['image'];
                echo '<article>';
                echo '<div class="image-container">';
                echo '<img src="' . $image_path . '" alt="' . $row['name'] . '">';
                echo '</div>';
                echo '<div class="info">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<span>USD $' . $row['price'] . '</span>';
                echo '<button>Order Now</button>';
                echo '<i class="fas fa-ellipsis-v"></i>';
                echo '</div>';
                echo '</article>';
            }
        }
    } else {
        echo '<p>No dessert menu found.</p>';
    }
    ?>
</div>
<script>
    window.history.pushState(null, null, window.location.href);
    window.onpopstate = function() {
    window.history.go(1);
    };
</script>

<?php
    include "footer.php";
?>