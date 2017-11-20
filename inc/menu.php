<?php
    session_start();
    include("./php/connect.php");
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        
    $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
    
    $menu_query = "SELECT * FROM user WHERE login = '".$_SESSION['login']."'";
    if($result = $mysqli->query($menu_query))
    {
        while($row = $result->fetch_assoc())
        {
            $a_user_id = $row['id'];
            $a_user_usrname = $row['login'];
            $a_user_mail = $row['email'];
            $a_user_fname = $row['first_name'];
            $a_user_lname = $row['last_name'];
            $a_user_sex = $row['sex'];
            $a_user_age = $row['age'];
            $a_user_height = $row['height'];
            $a_user_img = $row['img'];
            
            $weight_query = "SELECT * FROM weights WHERE id_user = $a_user_id ORDER BY time, timer DESC LIMIT 1";
            if($wresult = $mysqli->query($weight_query))
            {
                while($wrow = $wresult->fetch_assoc())
                {
                    $a_user_weight = $wrow['weight'];
                }
            }
            $wresult->free();
        }
        $result->free();
    }
?>

<ul id="slide-out" class="side-nav">
    <li>
        <div class="userView">
            <div class="background">
        <img src="./img/sunsetback.jpg">
      </div>
            <a href="#!user"><img class="circle" src="../img/<?php echo $a_user_img ?>.png"></a>
            <a href="#!name"><span class="white-text name"><?php echo $a_user_usrname ?></span></a>
            <a href="#!email"><span class="white-text email"><?php echo $a_user_mail?></span></a>
        </div>
    </li>
    <li><a href="./index.php"><i class="material-icons">home</i>Home</a></li>
    <li><a href="./profile.php"><i class="material-icons">person</i>My profile</a></li>
    <li><a href="./sport.php"><i class="material-icons">directions_bike</i>Sports</a></li>
    <li><a href="./food.php"><i class="material-icons">local_dining</i>Food</a></li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Trackers<i class="material-icons">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="./weight.php">Weight</a></li>
                <li><a href="./sleep.php">Sleep</a></li>
              </ul>
            </div>
          </li>
        </ul>
     </li>
    <li><a href="./map.php"><i class="material-icons">map</i>Map</a></li>
    <li>
        <div class="divider"></div>
    </li>
    
    <li><a href="./php/logout.php"><i class="material-icons">clear</i>Logout</a></li>
</ul>

<?php
    } 


    else {
?>
    <ul id="slide-out" class="side-nav">
    <li>
        <div class="userView">
            <div class="background">
                <img src="./img/sunsetback.jpg">
              </div>
            <a href="#!name"><span class="white-text name">Please sign-up or login</span></a>
        </div>
    </li>
    <li><a href="./index.php"><i class="material-icons">home</i>Home</a></li>
    <li><a href="./login.php"><i class="material-icons">person_add</i>Sign-up / Log-in</a></li>
</ul>
<?php    
    }
?>