<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_nav.css">
    <link rel="stylesheet" href="style_categories.css">

    <script src="javas_00.js"></script>
    <title>Conspiracy World - Categories</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<script>checkUserConnection();</script>
<?php
  require_once 'connect.php';
?>

<!-- Body -->

<div class="category_body">
  <h1>Categories</h1>
  <div class="categories_list">
    <?php

      $querry  = "SELECT * FROM categories ";
      $result_ = mysqli_query($db, $querry);
      if (!$result_) die("Fatal Error");
      $categories=array();
      //  create the new array called categories with all the values from the database
      while($row = mysqli_fetch_assoc($result_)){$categories[]=$row;}
      
      for($j = 0; $j < count($categories); $j++ ){
        $image = $categories[$j]['category_image'];
        $name = $categories[$j]['category_name'];
        $aspas = '"';
        echo "<a><img src='$image' onclick='categoryClicked($aspas$name$aspas);' ></a>
        ";
      }
    ?>
  </div>
</div>
<!-- NAV BAR -->
<?php
    require_once 'nav_bar.php';
?>

</html>