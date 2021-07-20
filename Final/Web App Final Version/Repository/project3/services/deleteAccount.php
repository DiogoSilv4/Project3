<?php 

include '../connect.php';

session_start();

//Initialize array variable
$jsonObject = array();


if (isset($_POST['id'])) {
    $userID = $_POST['id'];

}else{
    $userID = "";
}

// checks if the variables are not empty
if(!empty($userID) )
{
    // checks with the username from the database if connection is successfull
    $querie = "SELECT username FROM user_account WHERE user_id = '$userID' ";
    $queryResult = mysqli_query($db, $querie);

    while($row = mysqli_fetch_assoc($queryResult))
    {
        // stores the username in this array, if it's correct
        $jsonObject[]=$row;
    }
    $Username = $jsonObject[0]['username'];
    if( $Username != null || $Username != '' ){
        // deletes the row where the user id equal his own
        $querye = "DELETE FROM user_account WHERE username = '$Username' ";
        $queryName = mysqli_query($db, $querye);
        $var = $Username;

    }else{
        $var = 'Account Deleted Unsuccessfully. Please try again';
    }
    mysqli_close($db);
}else{
    $var = 'Account Deleted Unsuccessfully. Please try again';
}

 echo $var;

?>