<?php 

include '../connect.php';

session_start();

//Initialize array variable
$jsonObject = array();


if (isset($_POST['answer'])) {
    $answer = $_POST['answer'];

}else{
    $answer = "";
}
if (isset($_POST['answer_date'])) {
    $date = $_POST['answer_date'];

}else{
    $date = "";
}
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

}else{
    $user_id = "";
}
if (isset($_POST['theory_id'])) {
    $theoryID = $_POST['theory_id'];

}else{
    $theoryID = "";
}
// checks if the variables are not empty
if(!empty($answer) && !empty($date) && !empty($user_id) && !empty($theoryID))
{
    // posts the answer into the database
    $querie = "INSERT INTO quizAnswers (quiz_answwer, quiz_date , user_id, theory_id) values($answer, str_to_date('$date','%Y.%m.%d') , '$user_id','$theoryID')";
    $queryResult = mysqli_query($db, $querie);

    $last_answer = mysqli_insert_id($db);
    $queryRes = mysqli_query($db, "SELECT * FROM quizAnswers WHERE quiz_id = '$last_answer' ");

    while($row = mysqli_fetch_assoc($queryRes) ){
        $jsonObject[]=$row;
    }

    if($jsonObject != null){
        $var = $jsonObject[0]['quiz_answwer'];
    }

    mysqli_close($db);
}else{
    $var = 'We were unable to post your answer. Please try again';
}

 echo $var;

?>