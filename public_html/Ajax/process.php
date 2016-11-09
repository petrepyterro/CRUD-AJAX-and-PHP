<?php

include 'db.php';

if(isset($_POST['id'])){
  $id = mysqli_real_escape_string($connection, $_POST['id']);
  $query = "SELECT * FROM cars WHERE id=" . $id;
  $query_car_info = mysqli_query($connection, $query);

  if(!$query_car_info){
    die("Query Failed " . mysqli_query($connection));
  }

  while($row = mysqli_fetch_array($query_car_info)){
    echo "<input type='text' class='form-control car_id'>";
    echo "<input type='button' class='btn btn-success car_id' value='Update'>";
    echo "<input type='button' class='btn btn-danger car_id' value='Delete'>";
  }

}