<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_nav.css">
    <link rel="stylesheet" href="style_quiz.css">

    <script src="javas_00.js"></script>
    <title>Conspiracy World - Quiz</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<script>
  checkUserConnection();
  // this page is on reload every time a button is clicked, the session storage variables inside the starting script and last script,inside this file, determine the page and the layout
  //first script gets the values and last one sets the page
  var istrue = sessionStorage.getItem('quizhasStarted');
  if(istrue == 'true'){   //checks if the quiz has started
    var number = sessionStorage.getItem('questionNumber');
    var array = sessionStorage.getItem('questionsArray');
    console.log(number);
    var data=[];
    var data = JSON.parse(array); //turns json file into array
    var dataCount = data.length;
    QuizEnd(number, dataCount);
    if(data != null && data.length > 0 && number < data.length){
      var name =  data[number]['theory_statement'];
      var theory_id = data[number]['theory_id'];
      var image_theory = data[number]['theory_image'];
      console.log(name);
    }
  }
</script>
<?php
  require_once 'connect.php';
?>

<!-- Body -->
<!-- before quiz is started -->
<div class="quiz_body">
  <div id="quiz_entrance">
    <br>
    <h1>Conspiracy Quiz</h1><br><br>

    <div id='textt'>
      <p>     This is a True or False quiz, were we will be comparing your answer with the rest of the users, 
            so that we can get comununity stats on how much people agree or disagree with a theory</p>
    <p>     Every time you click on start it will generate a new random list of the theories that you can vote</p>
    <p> When the Quiz is over, head to your account interactivity and select quiz answers to check them

    </div>
    
    <div id="quizButton" onclick="quizStart();"> Start</div>
  </div>

<!-- after quiz is started -->
  <div id="the_quiz">

    <div  id="backQuiz" onclick="closeQuiz();"><img src="./Buttons/backbutton.jpg"></div>
    
    <div class='question_image'>
      <img id = 'quizImage'>
    </div>
    <h1 id='statement'></h1>
    
        
    <p>What do you think this theory is?</p>
    <div class="buttons">
      <div id="True_Button" class="quizButton" ><p >True</p></div>
      <p>or</p>
      <div id="False_Button" class="quizButton" ><p >False</p></div>
    </div>
  </div>
</div>

<script>
    var istrue = sessionStorage.getItem('quizhasStarted');
    if(istrue == 'true'){
      document.getElementById('quiz_entrance').style.display = 'none';

      document.getElementById('the_quiz').style.display = 'block';
      document.getElementById('statement').innerHTML = name;
      document.getElementById('quizImage').src =image_theory; 
      $('#True_Button').click(function() {
          nextQuestion(true,theory_id);
      });
      $('#False_Button').click(function() {
          nextQuestion(false,theory_id);
      });
      var count;
      if(name != document.getElementById('statement').textContent ){
      }
    }else{
      document.getElementById('quiz_entrance').style.display = 'block';
      document.getElementById('the_quiz').style.display = 'none';
    }
</script>

<!-- NAV BAR -->
<?php
    require_once 'nav_bar.php';
?>

</html>