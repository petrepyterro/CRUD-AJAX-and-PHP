<?php

$connection = mysqli_connect('localhost', 'root', 'mysql', 'AjaxPHP');

$search = $_POST['search'];

if(!empty($search)){
  $query = "SELECT * FROM cars WHERE cars LIKE '$search%'";
  $search_query = mysqli_query($connection, $query);
  
  if(!$search_query){
    die('QUERY FAILED ' . mysqli_error($connection));
  }
  ?>
  <ul class="list-unstyled">
  <?php
  while($row = mysqli_fetch_array($search_query)){
    $brand = $row['cars'];
    echo "<li>{$brand} in stock</li>";
  }
  ?>
  </ul>
  <?php
}
?>

