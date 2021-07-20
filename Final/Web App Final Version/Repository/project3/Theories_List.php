<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_nav.css">
    <link rel="stylesheet" href="style_theory_list.css">

    <script src="javas_00.js"></script>
    <title>Conspiracy World - Theories</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<script>checkUserConnection();</script>

<?php
  require_once 'connect.php';
?>
<?php
  $query  = "SELECT * FROM theory";
  //$result = mysqli_query($conn,$query);
  $result =$conn->query($query);
  if (!$result) die("Fatal Error");


  $theories=array();
//create the new array called theories will the values from the database
  $count=0;
  if (mysqli_num_rows($result)>0) {
    while($row=mysqli_fetch_assoc($result)){
        $count+=1;
        $theories[$count]=$row;
    }
  }
?>
<!-- Select category and show array with the theories from that category -->

<script>
var category_Chosen = null;
 category_Chosen= WasCategoryClicked();

 if(category_Chosen != null){
    window.location.href="Theories_List.php?uid=" + category_Chosen;
 }
</script>

<?php
$categoryChosen = $_GET["uid"];

// set the new theories array
//if a category is chosen
if( $categoryChosen != null){
    //Creating a query to get the id from the category chosen
    $query_category_id  = "SELECT category_id n FROM categories WHERE category_name= '$categoryChosen'";
    $result_category_id =$conn->query($query_category_id);
    if (!$result_category_id) die("Fatal Error");
    $rows_category_id = $result_category_id->num_rows;
    for ($f = 0 ; $f < $rows_category_id ; ++$f){
        $result_category_id->data_seek($f);
        //$category_id is the id of category that that was chosen by the user
        $category_id= htmlspecialchars($result_category_id->fetch_assoc()['n']);
    }
    //creating a query to get all the theories id's that belong to the category chosen
    $query_theoriesFromCategory  = "SELECT theory_id FROM theory__categories WHERE category_id=$category_id";
    $result_theoriesFromCategory =$conn->query($query_theoriesFromCategory);
    if (!$result_theoriesFromCategory) die("Fatal Error");
    //new array that will contain the id's from each theory that belongs to the category chosen
    $theoriesFromCategory=array();
    $count_theoriesFromCategory=0;
    if (mysqli_num_rows($result_theoriesFromCategory)>0) {
        while($row_theoriesFromCategory=mysqli_fetch_assoc($result_theoriesFromCategory)){
            $count_theoriesFromCategory+=1;
            $theoriesFromCategory[$count_theoriesFromCategory]=$row_theoriesFromCategory;
        }
    }
    //substitute the theories in the $theories array, with the theories that belong to the selected category
    $all_theories = $theories;
    $theories = array();
    for($i = 1; $i <= $count_theoriesFromCategory; $i++){
        for($j = 1; $j <= $count;$j++){
            if($all_theories[$j]['theory_id'] == $theoriesFromCategory[$i]['theory_id']){
                $theories[$i] = $all_theories[$j];
            }
        }
    }
}
?>

<!-- Body -->


<div class="body">
    <h1 class="title">Conspiracy Theories</h1>

    <!-- if a category is chosen it will show the name of the category in the theories list -->
    <?php
        if( $categoryChosen != null){
            echo " <h1 id='categoryChosen'>$categoryChosen</h1>";
        }
    ?>

    <!-- search bar where u can search for theories by name -->
    <div class="search_bar">
        <input class="write_search" type="text" placeholder="  Search here" name="searchFor" required>
        <span class="icon">        
            <!-- <input class="search" type="submit" > -->
            <button id='search_button'><img src="./Buttons/search_button.jpg"></button>
        </span>

    </div>
        <!-- sorting of the theories list -->
    <p id="sorting">Sort by : <u> Date</u>, <u>Trending</u>, <u>Most Comments</u>,  <u>Most Believers</u>, <u>Most Non-believers</u></p>

    <?php
    //if a category is chosen changes the style in the sorting for better visual results
    if( $categoryChosen != null){
        echo '<script>
        document.getElementById("sorting").style.margin = "0px 30px 50px 130px";
        </script>';
    }
    ?>

    <ul class="theoryList">

        <?php
        foreach($theories as $theory){
            
            $comms = "SELECT count(*) n FROM comments where theory_id=$theory[theory_id]";
            $resultC = $conn->query($comms);
            if (!$resultC) die("Fatal Error");

            $rows = $resultC->num_rows;
            for ($j = 0 ; $j < $rows ; ++$j){
                $resultC->data_seek($j);
                //$countComments is the number of comments of the theory they correspond
                $countComments= htmlspecialchars($resultC->fetch_assoc()['n']);
            }

            //creating the theories list from the database, and if category is chosen, shows just those that belong to the category
            echo "<a  >
                <li class='showTheory' > 
                    <div class='theoryInfo'>
                        <h2> $theory[theory_name] </h2>
                        <p>$theory[theory_date]
                            <p> $countComments Comments</p>
                        </p>
                    </div>
                    <img src=$theory[showcaseImage] onclick='theoryClicked($theory[theory_id]);'>
                </li>
            </a>";
        }
        ?>
    </ul>
</div>
<!-- NAV BAR -->
<?php
    require_once 'nav_bar.php';
?>
</html>