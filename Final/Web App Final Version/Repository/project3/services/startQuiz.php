<?php 

include '../connect.php';

session_start();

//gets all of theories into an array

$query  = "SELECT * FROM theory";
$result = mysqli_query($conn,$query);//$conn->query($query);
$theories=array();
//create the new array called theories with the values from the database
$count=0;
if (mysqli_num_rows($result)>0) {
  while($row=mysqli_fetch_assoc($result)){ 
    $count+=1;
    $theories[$count]=$row;
  }
}

shuffle($theories); // randomizes the order of the theories

mysqli_close($db);

echo json_encode($theories);
?>