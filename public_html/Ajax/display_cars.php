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
  echo "<td><a class='cars-link' href='javascript:void(0)'>{$row['cars']}</a></td>";
  echo "</tr>";
  
} ?>

<script>
  $('.cars-link').on('click', function(){
    $('#action-container').show();
  });
</script>



