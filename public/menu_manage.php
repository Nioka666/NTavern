<?php
  include "header.php";
?>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#000000" fill-opacity="1" d="M0,192L30,186.7C60,181,120,171,180,170.7C240,171,300,181,360,186.7C420,192,480,192,540,170.7C600,149,660,107,720,117.3C780,128,840,192,900,213.3C960,235,1020,213,1080,181.3C1140,149,1200,107,1260,96C1320,85,1380,107,1410,117.3L1440,128L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
</svg>
<div class="content-menu-manage" id="">
  <div class="hero">
    <h2>Menu Manager</h2>
    <p>Adding menus is a breeze: just fill in the name, price, category, upload the image, and click submit. Enjoy the convenience of updating your menu effortlessly!</p>
    <a href="add_menu.php"><button>Add Menu<i class="fas fa-plus" style="margin-left: 10px;"></i></button></a>
  </div>
  <div class="container-menu-manage">
    <div class="search-container">
      <input type="text" id="search-input" placeholder="Search...">
      <button id="search-button"><i class="fas fa-search"></i></button>
    </div>
  </div>
</div>
<div class="container-table">
  <div class="table-responsive">
    <?php
    if (isset($_SESSION['success_message'])) {
      echo '<div id="success-message" class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
      unset($_SESSION['success_message']);
    } elseif (isset($_SESSION['error_message'])) {
      echo '<div id="error-message" class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
      unset($_SESSION['error_message']);
    }

    $sql = "SELECT * FROM menu";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Price (USD)</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<th scope="row">' . $no . '</th>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['category'] . '</td>';
            echo '<td>
                  <a href="edit_menu.php?id_menu=' . $row['id_menu'] . '" class="btn btn-primary">Edit</a>
                  <button class="btn btn-danger" onclick="deleteMenu(' . $row['id_menu'] . ')">Delete</button>
                </td>';
            echo '</tr>';
            $no++;
          }
          ?>
        </tbody>
      </table>
    <?php
    } else {
      echo '<p>No menu found.</p>';
    }

    $conn->close();
    ?>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function deleteMenu(menuId) {
    if (confirm('Are you sure you want to delete this menu?')) {
      window.location.href = 'delete_menu.php?id=' + menuId;
    }
  }

  $(document).ready(function() {
    $('#search-input').on('input', function() {
      var searchText = $(this).val().toLowerCase();
      filterTable(searchText);
    });

    $('#search-button').on('click', function() {
      var searchText = $('#search-input').val().toLowerCase();
      filterTable(searchText);
    });

    function filterTable(searchText) {
      var rows = $('.table tbody tr');

      rows.each(function() {
        var name = $(this).find('td:nth-child(2)').text().toLowerCase();
        var id = $(this).find('th').text().toLowerCase();

        if (name.includes(searchText) || id.includes(searchText)) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    }
  });

  setTimeout(function() {
    $('#success-message, #error-message').fadeOut();
  }, 2000);

</script>

<?php
  include "footer.php";
  
  // Adhim Niokagi
  // Github : Nioka666
?>