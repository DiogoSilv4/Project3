<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_nav.css">
    <link rel="stylesheet" href="style_userAccount.css">
    <script src="javas_00.js"></script>
    <title>Conspiracy World</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<script>checkUserConnection();</script>

<?php
    require_once 'connect.php';

    if(!empty($_COOKIE['user_id'])) { 
        $currentUserID =  $_COOKIE['user_id'];  
    }
?>

<!-- BODY -->

<div class="account_body">
    <!-- account -->
    <div id="AccountPage">
        <h1>Account</h1>
        <ul>
            <!-- account main options -->
            <li onclick="document.getElementById('changeUsername').style.display='flex'">Change Username</li>
            <li onclick="document.getElementById('changePassword').style.display='flex'">Change Password</li>
            <li onclick="document.getElementById('deleteAccount').style.display='flex'">Delete Account</li>
        </ul>
        <!-- change username window -->
        <div id="changeUsername">
            <div class="container">
                <label ><b>Enter New Username</b></label>
                <input type="text" id="newUsername" placeholder="Username" required style=" border: 2px solid rgb(48, 48, 48);">
            </div>

            <button type="button" onclick="document.getElementById('changeUsername').style.display='none';" class="Cancelbtn">Cancel</button>
            <button type="button" onclick="document.getElementById('changeUsername').style.display='none';changeUsername();" class="Cancelbtn" style="right: 0;background: rgb(212, 212, 212);color: black;">Save</button>

        </div>
        <!-- change password window -->
        <div id="changePassword">
            <div class="container">
                <label for="password"><b>Enter Old Password</b></label>
                <input id="OldPassword" type="password" placeholder="Password" name="psw" required>
                <label for="password"><b>Enter New Password</b></label>
                <input id="NewPassword" type="password" placeholder="Password" name="psw" required>
                <label for="password"><b>Repeat New Password</b></label>
                <input id="NewPasswordRepeat" type="password" placeholder="Password" name="psw" required>

            </div>

            <button type="button" onclick="document.getElementById('changePassword').style.display='none'" class="Cancelbtn">Cancel</button>
            <button type="button" onclick="document.getElementById('changePassword').style.display='none'; passwordChange();" class="Cancelbtn" style="right: 0;background: rgb(212, 212, 212);color: black;">Save</button>

        </div>
        <!-- delete account window -->
        <div id="deleteAccount">
            <p>Are you sure you want to delete your account? If yes, wou will lose your profile forever</p>
            <button type="button" onclick="document.getElementById('deleteAccount').style.display='none'" class="Cancelbtn">Cancel</button>
            <button type="button" onclick="deleteAccountForever();" class="Cancelbtn" style="right: 0;background: rgb(112, 22, 22);">Delete</button>


        </div>
    </div>
    <!-- interactivity -->
    <div id="InteractivityPage">
        <h1>Interactivity</h1>
        <ul onclick="showAccountInter(this)" id="inter_buttons">
            <li id="favorite_button" onclick="showcaseInterText(this)"><span class="fa fa-star" style="color:black;"></span> Favorite</li>
            <li id="quiz_button" onclick="showcaseInterText(this)">Quiz Answers</li>
            <li id="comments_button" onclick="showcaseInterText(this)">Comments</li>
        </ul>
        <div id="inter_rigth_side_options">
            <!-- List of the favorites theories -->
            <ul id="favorite">
                <?php
                    $querrie  = "SELECT * FROM theory__user WHERE user_id = '$currentUserID' AND favorite_theory = '1' ";
                    //$result = mysqli_query($conn,$query);
                    $results_ = mysqli_query($db, $querrie);
                    if (!$results_) die("Fatal Error");
                    $favoriteTheories=array();
                    // create the new array called theories will the values from the database
                    while($row = mysqli_fetch_assoc($results_)){
                        $favoriteTheories[]=$row;
                    }
                    $countedfavorite = count($favoriteTheories);
                    $counter = 0;
                    for($i = $countedfavorite-1 ; $i>= 0 ; $i--){
                        $theoryID = $favoriteTheories[$i]['theory_id'];
                        $queryTheoryName  = "SELECT * FROM theory WHERE theory_id='$theoryID'";
                        $result_theory_name =$conn->query($queryTheoryName);
                        if (!$result_theory_name) die("Fatal Error");

                        $theoryName= htmlspecialchars($result_theory_name->fetch_assoc()['theory_name']);
                        $counter = $counter + 1;
                        echo "<li>
                        <div>
                        <a onclick='tabOpener($theoryID);'>
                        <br>
                            <p>$theoryName </p>
                        </a>
                        <button onclick='ToogleFavoriteTheory($currentUserID,$theoryID,$counter);'>
                            <span class='fa fa-star' ></span>
                        </button>
                        </div>                    
                    </li>";
                    }

                ?>
            </ul>
            <!-- List of the answers of the quiz -->
            <ul id="Quiz_Answers">

                <?php

                    $querry  = "SELECT * FROM quizAnswers WHERE user_id = '$currentUserID' ";
                    //$result = mysqli_query($conn,$query);
                    $resulting = mysqli_query($db, $querry);
                    if (!$resulting) die("Fatal Error");
                    $answers=array();
                    // create the new array called theories will the values from the database
                    while($row = mysqli_fetch_assoc($resulting)){
                        $answers[]=$row;
                    }
                    for($i = count($answers)-1 ; $i>= 0 ; $i--){
                        $theoryID = $answers[$i]['theory_id'];
                        $queryTheoryName  = "SELECT * FROM theory WHERE theory_id='$theoryID'  ";
                        $result_theory_name =$conn->query($queryTheoryName);
                        if (!$result_theory_name) die("Fatal Error");
                        $theoryName= htmlspecialchars($result_theory_name->fetch_assoc()['theory_name']);


                        $answerDate =$answers[$i]['quiz_date'];
                        $answer = $answers[$i]['quiz_answwer'];
                        if($answer == '1' || $answer == 1){ //depending on the answer value it changes the color of the words into red or blue
                            $quizAnswer = 'True';
                            $color = 'blue';
                        }else{
                            $quizAnswer = 'False';
                            $color = 'red';
                        }
                        echo "<li>
                            <p style='font-size: 18px;'>$theoryName</p> 
                            <div>
                                <p style='font-size: 21px;'>You voted: <u id='answer' style='color: $color;'>$quizAnswer</u></p>
                                <p style='display:block;font-size:14px;opacity:0.6;'>$answerDate</p>
                            </div>
                            
                        </li>";
                    }
                ?> 
            </ul>
            <!-- List of the comments made by the user -->
            <ul id="Comments">

                <?php
                    $querry  = "SELECT * FROM comments WHERE user_id = '$currentUserID' ";
                    //$result = mysqli_query($conn,$query);
                    $result_ = mysqli_query($db, $querry);
                    if (!$result_) die("Fatal Error");
                    $comments=array();
                    // create the new array called theories will the values from the database
                    while($row = mysqli_fetch_assoc($result_)){
                        $comments[]=$row;
                    }
                    $countedComments= count($comments);
                    for($i = $countedComments-1 ; $i>= 0 ; $i--){
                        $theoryID = $comments[$i]['theory_id'];
                        $queryTheoryName  = "SELECT * FROM theory WHERE theory_id='$theoryID'";
                        $result_theory_name =$conn->query($queryTheoryName);
                        if (!$result_theory_name) die("Fatal Error");

                        $theoryName= htmlspecialchars($result_theory_name->fetch_assoc()['theory_name']);
                        $commentDate =$comments[$i]['comment_date'];
                        $comment = $comments[$i]['commenText'];
                        $aspas = '"';
                        echo "<li onclick='tabOpener($theoryID);' >
                        <p id='commentTheory'>$theoryName</p>
                        <p id='comment'>$aspas$comment$aspas</p>
                        <p id='commentDate'>$commentDate</p>
                        </li>";
                    }
                ?>

            </ul>
        </div>
    </div>
    <!-- stats -->
    <div id="StatsPage">
        <h1 >Your Stats</h1>
        <br><br><br><br><br><br><br>
        <div id='statsText'>
            <?php
                $querry  = "SELECT * FROM theory__user WHERE user_id = '$currentUserID' ";
                //$result = mysqli_query($conn,$query);
                $result_ = mysqli_query($db, $querry);
                if (!$result_) die("Fatal Error");
                $theoriesSeen=array();
                // create the new array called theories will the values from the database
                while($row = mysqli_fetch_assoc($result_)){
                    $theoriesSeen[]=$row;
                }
                $theoriesSeenNumber = count($theoriesSeen);
                $querry  = "SELECT * FROM theory ";
                $result_ = mysqli_query($db, $querry);
                // if (!$result_) die("Fatal Error");
                $theories=array();
                // create the new array called theories will the values from the database
                while($row = mysqli_fetch_assoc($result_)){
                    $theories[]=$row;
                }
                $theoriesNumber = count($theories);
                $querry  = "SELECT * FROM user_account  ";
                //$result = mysqli_query($conn,$query);
                $result_ = mysqli_query($db, $querry);
                if (!$result_) die("Fatal Error");
                $users=array();
                // create the new array called theories will the values from the database
                while($row = mysqli_fetch_assoc($result_)){
                    $users[]=$row;
                }
                $numberUsers = count($users);
                $percentageOfSeen = round(($theoriesSeenNumber/$theoriesNumber)*100);
                $percentageFavortiesToSeen = round(($countedfavorite/$theoriesSeenNumber)*100);


                // programmed phrases that differ based on the value it refers to
                if($countedComments < 5){
                    $triggerComment = ' Poor writer! Get your ideas out there!';
                }else if ($countedComments < 10){
                    $triggerComment = " Thats it, make sure you do not lose that spark now!";
                }else if ($countedComments >= 10){
                    $triggerComment = " Looks like we got a big writer over here!";
                }
                if($percentageOfSeen < 25){
                    $triggerSeen = " Seems like you are just getting started!";
                }else if ($percentageOfSeen < 60){
                    $triggerSeen = " Well... not everyone is curious!";
                }else if ($percentageOfSeen >= 60){
                    $triggerSeen = " There it is, looks like you are curious after all! ";
                }else if ($percentageOfSeen == 100){
                    $triggerSeen = " Looks like we were not able to live up to your curiosity, we will try harder!";
                }
                if($percentageFavortiesToSeen < 25){
                    $triggerfavorite = ' Oh, you do not like what you see in here!';
                }else if ($percentageFavortiesToSeen < 50){
                    $triggerfavorite = " Looks like you apreciate some of our theories!";
                }else if ($percentageFavortiesToSeen >= 50){
                    $triggerfavorite = " It seems you like our theories. Much aprecciated!";
                }

                echo "<p> You have seen <u>$percentageOfSeen%</u> of all the theories in our website.$triggerSeen</p>";
                echo "<p>You have made <u>$countedComments</u> comments so far.$triggerComment</p>";
                echo "<p>You have added <u>$percentageFavortiesToSeen%</u> of the theories you have seen to your favorites.$triggerfavorite</p>";
                echo "<p>You are 1 of the <u>$numberUsers</u> users that belong to our community. Thank you for being with us!</p>";
            ?>
        </div>
    </div>
</div>
<!-- NAV BAR -->
<?php
    require_once 'nav_bar.php';
?>

<script type="text/javascript">
    choseFromUserMenu();
</script>

</html>