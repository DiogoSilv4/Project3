<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_nav.css">
    <link rel="stylesheet" href="style_theory.css">
    <script src="javas_00.js"></script>
    <title>Conspiracy World - Theory</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<script>checkUserConnection();GetPercentages();
console.log(sessionStorage.getItem('theoryClicked'));
</script>
<?php
    require_once 'connect.php';

    // get values from the cookie in php
    if(!empty($_COOKIE['idTheory'])) { 
        $currentTheory =  $_COOKIE['idTheory'];    
    }else{
        echo "<script>alert('No theory was selected. Please go back and select a theory');</script>";
    }

    if(!empty($_COOKIE['user_id'])) { 
        $comment_user_id =  $_COOKIE['user_id'];    
    }else{
        $comment_user_id= '';
    }

?>

<!-- Body -->

<div class="theory_body">

    <!-- THEORY INFO -->
    <?php
        // use content from database to fill the page
        $theoryID =  $currentTheory;

        $queryTheory  = "SELECT * FROM theory WHERE theory_id='$theoryID'";
        $result_theory =$conn->query($queryTheory);
        if (!$result_theory) die("Fatal Error");

        $theoryName= htmlspecialchars($result_theory->fetch_assoc()['theory_name']);
        
        $result_theory =$conn->query($queryTheory); // use this every time to call data from database
        $theoryExplanation= htmlspecialchars($result_theory->fetch_assoc()['theory_explanation']);

        $result_theory =$conn->query($queryTheory); // use this every time to call data from database
        $theoryImage= htmlspecialchars($result_theory->fetch_assoc()['showcaseImage']);
        $result_theory =$conn->query($queryTheory); // use this every time to call data from database
        $theory_image= htmlspecialchars($result_theory->fetch_assoc()['theory_image']);

        // gets the value from the theory & user table, boolean variable if true is added to favorites 
        if(!empty($comment_user_id)){
            $queryTheory  = "SELECT * FROM theory__user WHERE theory_id='$theoryID' AND user_id = '$comment_user_id' ";
            $result_fav =$conn->query($queryTheory);
            if (!$result_fav) die("Fatal Error");
            $favorite= htmlspecialchars($result_fav->fetch_assoc()['favorite_theory']);

            // changes the color from the favorite star based on the valu from the database
            if($favorite == 1 || $favorite == '1'){
                $color = 'yellow';
            }else{
                $color == 'black';
            }
        }

        // -----title and favorite button

        echo "<div id='title'>
            <h1>$theoryName</h1>";
            if(!empty($comment_user_id)){// if the user in logged in
                echo "<button id='favoryte' style='color:$color;' onclick='ToogleFavoriteTheory($comment_user_id, $theoryID, null)' >
                <span   class='fa fa-star' '></span>
                </button>";
            }
        echo  "</div>";
 ?>
    <!-- back button to return to the theories list -->
    <div  id="backQuiz" onclick="window.location.replace('./Theories_List.php');"><img src="./Buttons/backbutton.jpg"></div>

    <!-- percentage bar and subtitles -->
    <div id = 'percentageLine'>
        <div class = 'subtitles'><p style='color: rgb(139, 139, 255);'>Believers</p></div>
        <div id="percentageBar">
            <div class = "bars" id="believers"><p id = "beliversNumber"></p></div>
            <div class = "bars" id="nonbelievers"><p id = "UnbeliversNumber"></p></div>
        </div>
        <div class = 'subtitles'><p style='color: rgb(255, 128, 128);'>Non-Believers</p></div>
    </div>
    

<!-- image and explanation -->
<?php
        echo "<div class='theory_image'>
            <img src='$theory_image' width='100%' height='100%' style='background-size: contain;'>
        </div>";
       
        echo "<p id = 'explanation'>$theoryExplanation</p>";
   
?>

    <ul class="comment-section">

        <h1>Comment Section</h1>


        <!-- COMMENTS -->
        <?php

        $queryComments = "SELECT * FROM comments WHERE theory_id = '$currentTheory' ";
        $resultComments = mysqli_query($db, $queryComments);

        while($row = mysqli_fetch_assoc($resultComments)){
        $commentsArray[]=$row;
        }

        for($i = count($commentsArray)-1 ; $i>=0 ; --$i ){
            $usernameArray = [];
            $IDfromUserComment = $commentsArray[$i]['user_id'];
            $query  = "SELECT * FROM user_account WHERE user_id='$IDfromUserComment'";
            $result = mysqli_query($db, $query);
            if (!$result) die("Fatal Error");
            while($row = mysqli_fetch_assoc($result)){
                $usernameArray[]=$row;
            }
            if($commentsArray[$i]['user_id'] == $comment_user_id){
                echo " <li class='comment author-comment'>
                <div class='info'>
                <a></a>
                ";
            }else{
                
                echo " <li class='comment user-comment'>
                <div class='info'>
                <a > ".$usernameArray[0]['username']." </a>";
                
            }
            echo "<span> ".$commentsArray[$i]['comment_date']." </span>
            </div>
            <p>".$commentsArray[$i]['commenText']."</p>
            </li>";
        }
        ?>
        <!-- write comments area -->
        <li class="write-new">
            <form method="post">
                <textarea placeholder="Write your comment here" id='commentArea' name="comment" required></textarea>
                <div>
                    <button onclick='writeComent();'>Submit</button>
                </div>
            </form>
        </li>
    </ul>
</div>

<!-- NAV BAR -->
<?php
    require_once 'nav_bar.php';
?>
<?php
    //  every time the user, if he is logged in, enters a theory page for the first time is added to the theory__user table
    if( $comment_user_id != null && $comment_user_id != ''){
        // checks if the email exists on the database
        $querye = "SELECT * FROM theory__user WHERE theory_id = '$currentTheory' AND user_id = '$comment_user_id' ";
        $queryName = mysqli_query($db, $querye);
 
        while($row = mysqli_fetch_assoc($queryName)){$jsonNamefromID[]=$row;}

        if($jsonNamefromID == null || $jsonNamefromID == '' ){
         // checks if the password and the email are correct according to the database
         $query = "INSERT INTO theory__user (favorite_theory, theory_id, user_id) VALUES ('0', '$currentTheory', '$comment_user_id') ";
         $queryResult = mysqli_query($db, $query);
        }
    }
 
?>
</html>
