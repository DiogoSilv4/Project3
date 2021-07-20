<?php
    require_once "../connect.php";

    session_start();

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }else{
        $name = "";
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }else{
        $email = "";
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $password = sha1($password);
    }else{
        $password = "";
    }
    
if(!empty($password) && !empty($name) && !empty($email))
{
    // checks if the email exists on the database
    $querye = "SELECT username FROM user_account WHERE email = '$email' ";
    $queryEmail = mysqli_query($db, $querye);

    while($row = mysqli_fetch_assoc($queryEmail))
    {
        // if the email exist, the username associated with it is stored in this array
        $jsonEmail[]=$row;
    }
    $querye = "SELECT username FROM user_account WHERE username = '$name' ";
    $queryUser = mysqli_query($db, $querye);

    while($row = mysqli_fetch_assoc($queryUser))
    {
        // if the username exist,  it is stored in this array
        $jsonUsername[]=$row;
    }
    $IsDataTaken = false; // bollean that is true if either the username or the email already exist in the database
    // message if the email is found but the password is incorrect
    if($jsonUsername != null){
        $var = 'Username already taken';
        $IsDataTaken = true;
    }
    // message if the email was not found
    if($jsonEmail != null){
        $var = 'Email already in use';
        $IsDataTaken = true;
    }
    // if neither the email nor the username are in the database it will continue with registration
    if(!$IsDataTaken){
        
        $query = "INSERT INTO user_account (username, email, user_password) VALUES('$name', '$email', '$password')";
        $queryResult = mysqli_query($db, $query);

        $last_id = mysqli_insert_id($db);
        $queryResult = mysqli_query($db, "SELECT username FROM user_account WHERE user_id = $last_id");

        while($row = mysqli_fetch_assoc($queryResult))
        {
            $jsonObject[]=$row;
        }

        // if the email exists and the password is correct stores the username in the variable
        if($jsonObject != null){
            $var = $jsonObject[0]['username'];
        }
    }
    
    mysqli_close($db);
}


 echo $var;
?>