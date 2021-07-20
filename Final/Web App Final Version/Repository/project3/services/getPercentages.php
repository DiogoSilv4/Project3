<?php 

include '../connect.php';

session_start();

$all_of_asnwers = array();
$counter = 0;

if (isset($_GET['theoryID'])) {
    $theoryID = $_GET['theoryID'];

}else{
    $theoryID = "";
}

// checks if the variables are not empty
if(!empty($theoryID) ){
   
    //counts the number of users
    $query = "SELECT count(*) as number from user_account ";
    $result = mysqli_query($db, $query);

    while($row = mysqli_fetch_assoc($result))
    {
        // stores de number of users  in the next array
        $users[]=$row;
    }
    $numberOfUsers = $users[0]['number'];

    for($i = 1; $i <= $numberOfUsers; $i++){
        //gets the answers made by each user to the current theory and stores it into array
        $query = "SELECT * FROM quizAnswers WHERE theory_id = '$theoryID' AND user_id='$i' ";
        $result = mysqli_query($db, $query);
        $answers = array();

        while($row = mysqli_fetch_assoc($result)){$answers[]=$row;}

        if($answers != null && $answers != ''){
            //if answers exists continues
            $quizID = array();

            //selects higher id from all the answers made by the current user to the current theory, so it only picks up the last answer made
            $query = "SELECT MAX(quiz_id) real_answer FROM quizAnswers WHERE theory_id = '$theoryID' AND user_id='$i' ";
            $result = mysqli_query($db, $query);
            while($row = mysqli_fetch_assoc($result)){$quizID[]=$row;}
            $real_answer_quiz_id = $quizID[0]['real_answer'];

            $real_ANSWER = array();

            //gets the value from the answers where it matches the id
            $query = "SELECT * FROM quizAnswers WHERE quiz_id ='$real_answer_quiz_id'  ";
            $result = mysqli_query($db, $query);
        
            while($row = mysqli_fetch_assoc($result)){$real_ANSWER[]=$row;}
            $real_answer = $real_ANSWER[0]['quiz_answwer'];

            $all_of_asnwers[$counter] = $real_answer;
            $counter = $counter + 1 ;
        }
    }
    //calculate percentage of the believers
    $answers_number = count($all_of_asnwers);
    $believersCount = 0;
    for($j = 0; $j < $answers_number; $j++){
        if($all_of_asnwers[$j] == 1){
            $believersCount = $believersCount + 1;
        }
    }
    $percentageOfBelievers = round(($believersCount/$answers_number)*100);
    $var = $percentageOfBelievers;
    mysqli_close($db);
}else{
    $var = 'Unable to get percentages on the community';
}
echo  $var;

?>