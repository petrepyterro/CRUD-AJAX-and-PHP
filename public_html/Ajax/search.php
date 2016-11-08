<?php

$connection = mysqli_connect('localhost', 'root', 'mysql', 'AjaxPHP');

$search = $_POST['search'];

echo $search;

