<?php 

include '../connect.php';

session_start();

//Initialize array variable
$favoriteTheory = array();


if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

}else{
    $user_id = "";
}
if (isset($_POST['theory_id'])) {
    $theory_id = $_POST['theory_id'];

}else{
    $theory_id = "";
}

// checks if the variables are not empty
if(!empty($user_id) && !empty($theory_id) )
{
    // gets the value from the database if the current theory is added to favorite or not
    $querye = "SELECT * FROM theory__user WHERE user_id = '$user_id' AND theory_id = '$theory_id'  ";
    $queryName = mysqli_query($db, $querye);
    while($row = mysqli_fetch_assoc($queryName)){$favoriteTheory[]=$row;}

    $currentValue = $favoriteTheory[0]['favorite_theory'];

    //value 1 equals true, value 0 equals false, into wheter the theory is a favorite or not
    if ( $currentValue == '1' || $currentValue == 1) {
        $favorite = 0;
    }else{
        $favorite = 1;
    }

    //if value true returns fales, and vice-versa
    $query = "UPDATE theory__user SET favorite_theory = '$favorite' WHERE user_id = '$user_id' AND theory_id = '$theory_id' ";
    $queryResult = mysqli_query($db, $query);

    mysqli_close($db);

    $var = $favorite;
}else{
    $var = 'Connection is not working. Please try again';
}

 echo $var;

?>