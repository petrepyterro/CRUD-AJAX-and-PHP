<?php

include 'db.php';

$query = "SELECT * FROM cars";
$query_car_info = mysqli_query($connection, $query);

if(!$query_car_info){
  die("Query Failed " . mysqli_query($connection));
}

while($row = mysqli_fetch_array($query_car_info)){
  echo "<tr>";
  echo "<td>{$row['id']}</td>";
  echo "<td>{$row['cars']}</td>";
  echo "</tr>";
  
}



