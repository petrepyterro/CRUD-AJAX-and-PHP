<?php

include 'db.php';

$search = $_POST['search'];

if(!empty($search)){
  $query = "SELECT * FROM cars WHERE cars LIKE '$search%'";
  $search_query = mysqli_query($connection, $query);
  $count = mysqli_num_rows($search_query);
  
  if(!$search_query){
    die('QUERY FAILED ' . mysqli_error($connection));
  }
  ?>
  <ul class="list-unstyled">
  <?php
  if($count <= 0){
    echo "Sorry we don't have that car available";
  } else {
    while($row = mysqli_fetch_array($search_query)){
      $brand = $row['cars'];
      echo "<li>{$brand} in stock</li>";
    }
    ?>
    </ul>
    <?php
  }
}
?>

