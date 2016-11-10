<?php

include 'db.php';

/**************** Displaying action box data *********************/ 
if(isset($_POST['id'])){
  $id = mysqli_real_escape_string($connection, $_POST['id']);
  $query = "SELECT * FROM cars WHERE id=" . $id;
  $query_car_info = mysqli_query($connection, $query);

  if(!$query_car_info){
    die("Query Failed " . mysqli_query($connection));
  }

  while($row = mysqli_fetch_array($query_car_info)){
    echo '<p id="feedback" class="bg-success"></p>';
    echo "<input rel='" . $row['id'] . "'type='text' class='form-control car_input' value='" . $row['cars'] . "'>";
    echo "<input type='button' class='btn btn-success update' value='Update'>";
    echo "<input type='button' class='btn btn-danger delete' value='Delete'>";
    echo "<input type='button' class='btn btn-close' value='Close'>";
  }

}

/*********************** Updating Data ********************************/
if(isset($_POST['updatethis'])){
  $id = mysqli_real_escape_string($connection, $_POST['id']);
  $car = mysqli_real_escape_string($connection, $_POST['car']);
  
  $query = "UPDATE cars SET cars='" . $car . "' WHERE id=" . $id;
  $result_set = mysqli_query($connection, $query);
  if(!$result_set){
    die("Query failed " . mysqli_error($connection));
  }
}

/******************** Deleting Data ********************/
if(isset($_POST['deletethis'])){
  $id = mysqli_real_escape_string($connection, $_POST['id']);
  
  $query = "DELETE FROM cars WHERE id=" . $id;
  $result_set = mysqli_query($connection, $query);
  if(!$result_set){
    die("Query failed " . mysqli_error($connection));
  }
}

?>

<script>
  $(document).ready(function(){
    var id;
    var car;
    var updatethis = "update";
    var deletethis = "delete";
    
/***********Extract id and cars**************/
    $(".car_input").on('input', function(){
      id = $(this).attr("rel");
      car = $(this).val();
    });  
/***********Update Button Function************/
    $(".update").on('click', function(){
      $.post("process.php", {id: id, car: car, updatethis: updatethis}, function(data){
        $('#feedback').text("Record updated successfully");  
      });
    });
      
/***********Delete Button Function************/
    $(".delete").on('click', function(){
      if(confirm('Are you sure you want to delete this?')){
        id = $(".car_input").attr("rel");
        $.post("process.php", {id: id, deletethis: deletethis}, function(data){
          $('#action-container').hide();  
        });
      }  
    });    
    
    /***********Close Button Function************/  
    $(".btn-close").on('click', function(){
      $('#action-container').hide();
    })
  });

  
</script>
