<?php // connect.php
  $hn = 'localhost';
  $db = 'CW_database';
  $un = 'root'; // Change this
  $pw = 'root'; // Change this

  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Fatal Error");

  $db = mysqli_connect($hn, $un, $pw, $db);
  if($db === false){
    die("Error: connection error. " . mysqli_connect());
  }
?>