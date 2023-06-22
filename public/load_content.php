<?php

$category = isset($_GET['category']) ? $_GET['category'] : '';
$contents = getContentsByCategory($category);

$response = array(
  'category' => $category,
  'content' => $contents
);

header('Content-Type: application/json');
echo json_encode($response);

function getContentsByCategory($category) {
  $contents = '';

  if ($category === 'maincourse') {
    $contents = '<div class="content">Main Course Content</div>';
  } elseif ($category === 'dessert') {
    $contents = '<div class="content">Dessert Content</div>';
  }

  return $contents;
}

// Adhim Niokagi
// Github : Nioka666
