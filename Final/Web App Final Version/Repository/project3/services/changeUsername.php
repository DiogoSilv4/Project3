<?php 

include '../connect.php';

session_start();

//Initialize array variable
$jsonObject = array();


if (isset($_POST['name'])) {
    $name = $_POST['name'];

}else{
    $name = "";
}
if (isset($_POST['id'])) {
    $userID = $_POST['id'];

}else{
    $userID = "";
}

// checks if the variables are not empty
if(!empty($name) && !empty($userID) )
{
    // checks if the connection is succesfull with the database
    $querye = "SELECT user_id FROM user_account WHERE username = '$name' ";
    $queryName = mysqli_query($db, $querye);

    while($row = mysqli_fetch_assoc($queryName)){
        // if true, the user id associated with it is stored in this array
        $jsonNamefromID[]=$row;
    }
    if($jsonNamefromID == null || $jsonNamefromID == '' ){
        // updates the username in the database with the new one
        $query = "UPDATE user_account SET username = '$name' WHERE user_id = '$userID' ";
        $queryResult = mysqli_query($db, $query);

        $var = $name;

    }else{
        $var = 'Username Taken';
    }

    mysqli_close($db);
}

 echo $var;

?>