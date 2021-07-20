<?php 

include '../connect.php';

session_start();

//Initialize array variable
$jsonOldPass = array();


if (isset($_POST['id'])) {
    $userID = $_POST['id'];

}else{
    $userID = "";
}

if (isset($_POST['old_password'])) {
    $old_password = $_POST['old_password'];
    $old_password = sha1($old_password);


}else{
    $old_password = "";
}

if (isset($_POST['new_password'])) {
    $new_password = $_POST['new_password'];
    $new_password = sha1($new_password);


}else{
    $new_password = "";
}
// checks if the variables are not empty
if(!empty($userID) && !empty($old_password) && !empty($new_password) )
{
    // gets the current password from the database
    $querye = "SELECT user_password FROM user_account WHERE user_id = '$userID' ";
    $queryName = mysqli_query($db, $querye);

    while($row = mysqli_fetch_assoc($queryName)){$jsonOldPass[]=$row;}

    $databasePassword = $jsonOldPass[0]['user_password'];

    //checks if the password written coincides with the one from the database, if trues updates with the new password
    if($databasePassword == $old_password){ 
        $query = "UPDATE user_account SET user_password = '$new_password' WHERE user_id = '$userID' ";
        $queryResult = mysqli_query($db, $query);

        $var = $new_password;

    }else{
        $var = 'Old Password is wrong';
    }

    mysqli_close($db);
}

 echo $var;

?>