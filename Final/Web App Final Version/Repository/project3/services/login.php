<?php 

include '../connect.php';

session_start();

//Initialize array variable
$jsonObject = array();


if (isset($_GET['email'])) {
    $email = $_GET['email'];

}else{
    $email = "";
}

if (isset($_GET['password'])) {
    $password = $_GET['password'];
    $password = sha1($password);


}else{
    $password = "";

}

// checks if the variables are not empty
if(!empty($password) && !empty($email))
{
    // checks if the username exists on the database
    $querye = "SELECT username FROM user_account WHERE email = '$email' ";
    $queryEmail = mysqli_query($db, $querye);

    while($row = mysqli_fetch_assoc($queryEmail)){$jsonEmail[]=$row;}
    // checks if the password and the email are correct according to the database
    $querie = "SELECT user_id,username FROM user_account WHERE email = '$email' AND user_password = '$password'  ";
    $queryResult = mysqli_query($db, $querie);

    while($row = mysqli_fetch_assoc($queryResult))
    {
        // stores the username and user id in this array, if it's correct
        $jsonObject[]=$row;
    }
    mysqli_close($db);
}
// message if the email was not found
if($jsonEmail == null){
    $var = 'Email not found';
}
// message if the email is found but the password is incorrect
if($jsonEmail != null && $jsonObject == null){
    $var = 'Password is wrong';
}
// if the email exists and the password is correct stores the username in the variable
if($jsonObject != null){
    $var = $jsonObject[0]['username'];
}
//sends both the user id and username to javascript
echo json_encode($jsonObject);
?>
