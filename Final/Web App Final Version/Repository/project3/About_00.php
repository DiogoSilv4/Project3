<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_nav.css">
    <link rel="stylesheet" href="style_about.css">
    <script src="javas_00.js"></script>
    <title>Conspiracy World - About</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<script>checkUserConnection();</script>

<!-- AboutBody -->

<div class="body">
   
        <h1>About Conspiracy World</h1>
        <h2>Goal</h2>
        <p>The purpose of this web application is to show conspiracy theories that are happening or happened around the world in an interactive and creative way. We don’t want people to believe in a story on the internet just because it’s there, so, our objective is to captivate people into making their own conclusion on a matter; without being influenced. We also want the user to
get an opinion on some of the theories, regardless of what they may say. Whether it’s known to be true or not. We also want to give the user some data on how much people believe in the theories, and some other data about your time spent with the website (for example: how much theories have you
seen).</p>
        <h2>Theories</h2>
        <p>In here you will be able to look at all our available theories, ranging from all different categories, dates, 
            interactions and the level of intensity. We want to provide a safe space for discussion and understanding, try to come to your own conclusions.</p>
        <h2>Categories</h2>
        <p>The categorization as of right now is divided into 5 main ones. Government related, Environment, Techology, Popular Brands and Society. We plan on expanding the number of theories and categories in the near future but for right now that is what we have available for exploration.</p>
        <h2>Quiz</h2>
        <p>We also wanted to have some type of secondary entertainment so we decided to add a quiz. You’ll be able to answer a truth or false quiz based on what you believe regarding a theory. These answers will be stored in each users profile where you will also be able to see the percentage of people o agree with you and who don’t.</p>
        <h2>Other Features</h2>
        <p>You can also comment on theory posts and discuss with other users, check the interactivity tab on your user profile, where you can see your stored favorite theories, aswell as your stored comments and quizz answers. There is also a tab for your stats where you can compare your answers and beliefs with other users of the website.</p>
        <div class="buttons">
            <a href="./Theories_List.php">
                <div class="button">
                    <p>Theories</p>
                </div>
            </a>
            <a href="./Categories.php">
                <div class="button">
                    <p>Categories</p>
                </div>
            </a>

        </div>
</div>
<!-- NAV BAR -->
<?php
    require_once 'nav_bar.php';
?>

</html>