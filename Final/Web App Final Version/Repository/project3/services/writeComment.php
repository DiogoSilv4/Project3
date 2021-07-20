<?php 

include '../connect.php';

session_start();

//Initialize array variable
$jsonObject = array();


if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];

}else{
    $comment = "";
}
if (isset($_POST['date'])) {
    $date = $_POST['date'];

}else{
    $date = "";
}
if (isset($_POST['userID'])) {
    $userID = $_POST['userID'];

}else{
    $userID = "";
}
if (isset($_POST['theoryID'])) {
    $theoryID = $_POST['theoryID'];

}else{
    $theoryID = "";
}
// checks if the variables are not empty
if(!empty($comment) && !empty($date) && !empty($userID) && !empty($theoryID))
{
    // posts the comment into the database
    $querie = 'INSERT INTO comments (commenText, comment_date , user_id, theory_id) values("'.$comment.'", str_to_date("'.$date.'","%Y.%m.%d") , "'.$userID.'","'.$theoryID.'")';
    $queryResult = mysqli_query($db, $querie);

    $last_comment = mysqli_insert_id($db);
    //checks if comment was successfull
    $queryRes = mysqli_query($db, "SELECT commenText FROM comments WHERE comment_id = '$last_comment' ");

    while($row = mysqli_fetch_assoc($queryRes)){$jsonObject[]=$row;}

    if($jsonObject != null){
        $var = $jsonObject[0]['commenText'];
    }

    mysqli_close($db);
}else{
    $var = 'We were unable to post your comment. Please try again';
}

 echo $var;

?>