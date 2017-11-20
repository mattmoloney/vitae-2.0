<?php 
session_start();
include 'inc/header.php'; 
include 'inc/redirect.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
</head>

<body>	

<?php include 'inc/menu.php'; ?>

<div class="container-fluid">
    <div class="row headbar-container">
        <div class="headbar blue z-depth-2">
            <div data-activates="slide-out" class="menu-icon button-menu">
                <i class="material-icons">menu</i>
            </div>
            <div class="headtitle">My Profile</div>
        </div>
    </div>
    
    <div class="row">
        <div class="sub-headbar blue lighten-2 z-depth-2">
           <div class="profile-name"> <?php echo $_SESSION['login']; ?> </div>
        </div>
    </div>
    
    <div class="row profile-row">
        <div class="col s5 center-align">
            <div class="profile-photo "><img class="circle" src="../img/<?php echo $a_user_img ?>.png"></div>
            <div class="profile-infos">
                    <div class="profile-title">Profile <a class="nostyle" href="./profile-mod.php"><i class="material-icons">create</i></a></div>
                    <div class="profile-subtitle">Gender : <?php echo $a_user_sex ?> </div>
                    <div class="profile-subtitle">Age : <?php echo $a_user_age ?> </div>
                    <div class="profile-subtitle">Weight :  <?php echo $a_user_weight ?> kg</div>
                    <div class="profile-subtitle">Height : <?php echo $a_user_height ?> cm</div>
            </div>
            <div class="separator"></div>
        </div>
        
        <div class="col s7">
            <div class="card card-profile">
                
                <div class="card-stacked">
                    <div class="profile-title">Records</div>
                    <div class="profile-othertitle">Cycling</div>
                    <?php 
                    $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
                	if ($mysqli->connect_errno) {
                		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
                		exit();
                	}
             
                    $recordquery = "SELECT * FROM sport_inter WHERE (id_user = $a_user_id and name_sport = 'cycling') ORDER BY duration DESC LIMIT 1";
                    
                    if($result = $mysqli->query($recordquery)) {
                        if ($result->num_rows == 0) {
                               echo '
                                <div class="records-cont">
                                    <div class="profile-subtitle">No cycling records yet !</div>
                                </div>';  
                        }
                        else {
                            while($row = $result->fetch_assoc()) {
                                $dur = $row['duration'];
                                $date = $row['time'];
                                echo '
                                <div class="records-cont">
                                    <div class="profile-subtitle">Duration:  '.$dur.'</div>
                                    <div class="profile-subtitle">On the:  '.$date.'</div>
                                </div>'; 
                            }
                            
                        }
                    $result->free();
                    }
                    ?>
                    
                    <div class="profile-othertitle">Running</div>
                    <?php 
                    $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
                	if ($mysqli->connect_errno) {
                		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
                		exit();
                	}
             
                    $recordquery = "SELECT * FROM sport_inter WHERE (id_user = $a_user_id and name_sport = 'running') ORDER BY duration DESC LIMIT 1";
                    
                    if($result = $mysqli->query($recordquery)) {
                        if ($result->num_rows == 0) {
                               echo '
                                <div class="records-cont">
                                    <div class="profile-subtitle">No running records yet !</div>
                                </div>';  
                        }
                        else {
                            while($row = $result->fetch_assoc()) {
                                $dur = $row['duration'];
                                $date = $row['time'];
                                echo '
                                <div class="records-cont">
                                    <div class="profile-subtitle">Duration:  '.$dur.'</div>
                                    <div class="profile-subtitle">On the:  '.$date.'</div>
                                </div>'; 
                            }
                            
                        }
                    $result->free();
                    }
                    ?>
                    
                    <div class="profile-othertitle">Walking</div>
                    <?php 
                    $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
                	if ($mysqli->connect_errno) {
                		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
                		exit();
                	}
             
                    $recordquery = "SELECT * FROM sport_inter WHERE (id_user = $a_user_id and name_sport = 'walking') ORDER BY duration DESC LIMIT 1";
                    
                    if($result = $mysqli->query($recordquery)) {
                        if ($result->num_rows == 0) {
                               echo '
                                <div class="records-cont">
                                    <div class="profile-subtitle">No walking records yet !</div>
                                </div>';  
                        }
                        else {
                            while($row = $result->fetch_assoc()) {
                                $dur = $row['duration'];
                                $date = $row['time'];
                                echo '
                                <div class="records-cont">
                                    <div class="profile-subtitle">Duration:  '.$dur.'</div>
                                    <div class="profile-subtitle">On the:  '.$date.'</div>
                                </div>'; 
                            }
                            
                        }
                    $result->free();
                    }
                    ?>
                   
                   
                    <div class="profile-link btn"><a class="nostyle" href="./sport.php">Breat it</a></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
      <div class="col s12 ">
        <div class="card blue">
          
          <div class="card-content white-text">
              <div class="card-title">Your timeline</div>
            <p>Your timeline documents your progress across Vitae</p>
          </div>
          <div class="card-tabs">
            <ul class="tabs tabs-fixed-width tabs-transparent">
              <li class="tab"><a class="active"href="#weight-tab">Weight</a></li>
              <li class="tab"><a href="#sport-tab">Sports</a></li>
              <li class="tab"><a href="#sleep-tab">Sleep</a></li>
            </ul>
          </div>
          <div class="card-content white">
            <div id="weight-tab" class="center-align">
                <?php
                $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
                $weight_query = "SELECT * FROM weights WHERE id_user = $a_user_id ORDER BY time, timer DESC";
                if($weight_result = $mysqli->query($weight_query))
                {
                    while($weight_row = $weight_result->fetch_assoc())
                    {
                        $weight = $weight_row['weight'];
                        $date = $weight_row['time'];
                        $timer = $weight_row['timer'];
                        $date = strtotime($weight_row['time']);
                        $php_timestamp_date = date("d F Y",  $date);
                        
                        echo '<div class="weight-line-profile">'.$weight.' kg on the '.$php_timestamp_date.'</div>
                        <div class="separator"></div>';
                    }
                }
                ?>
            </div>
            <div id="sport-tab" class="center-align">
                <?php
                $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
                $sports_query = "SELECT * FROM sport_inter WHERE id_user = $a_user_id ORDER BY time DESC";
                if($sports_result = $mysqli->query($sports_query))
                {
                    while($sports_row = $sports_result->fetch_assoc())
                    {
                        $sports_name = ucfirst($sports_row['name_sport']);
                        $sports_timer = $sports_row['duration'];
                        $sports_date = strtotime($sports_row['time']);
                        $php_timestamp_sports_date = date("d F Y",  $sports_date);
                        
                        echo '<div class="sports-lines">
                            <div class="sports-first-line">'.$sports_name.' for '.$sports_timer.'</div>
                            <div class="sports-second-line">Recorded on the '.$php_timestamp_sports_date.'</div>
                        </div>
                        <div class="separator"></div>';
                    }
                }
                ?>
            </div>
            <div id="sleep-tab" class="center-align">
                <?php
                $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
                $sleeps_query = "SELECT * FROM sleep WHERE id_user = $a_user_id ORDER BY time DESC";
                if($sleeps_result = $mysqli->query($sleeps_query))
                {
                    while($sleeps_row = $sleeps_result->fetch_assoc())
                    {
                        $sleeps_time = $sleeps_row['time'];
                        $sleeps_quality = $sleeps_row['quality'];
                        $date = strtotime($sleeps_row['date']);
                        $php_timestamp_date = date("d F Y",  $date);
                        
                        echo '<div class="weight-line-profile">'.$sleeps_time.' h slept - Rating: '.$sleeps_quality.'/5<br><br>Recorded on the '.$php_timestamp_date.'</div>';
                        echo '<div class="separator"></div>';
                    }
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<?php
    } 
    else {
        header("Location: ./login.php");
    }
?>


    <script src="./js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>