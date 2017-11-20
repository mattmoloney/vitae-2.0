<!-DOCTYPE html->
<html>
<head>
<?php 
session_start();
include 'inc/header.php';
include 'inc/redirect.php';
?>
</head>

<body>

<?php include 'inc/menu.php'; ?>
<div class="container-fluid">
    <div class="row headbar-container">
        <div class="headbar blue z-depth-2">
            <div data-activates="slide-out" class="menu-icon-down button-menu">
                <i class="material-icons">menu</i>
            </div>
            <div class="headtitle">Vitae</div>
            <div class="profile-button"><a class="menu-icon-profile-down" href="profile.php"><i class="material-icons">person</i></a></div>
        </div>
    </div>
  </div>  
<div class="container-fluid">
<div class="row" >
    <div class="col-xs-3"></div>
    <div class="col-xs-6">
        <?php
            if (!isset($_POST['submit'])){
            ?>

            <form class="form-sport" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                <h2>Add Sport Activity</h2>
                <div class="input-group">
            	  <span class="input-group-addon" id="basic-addon1" style=" border-radius: 0.5em;">Sport</span>
                    <select name="name-sport">
                        <option value="running">Running</option>
                        <option value="cycling">Cycling</option>
                        <option value="walking">Walking</option>
                     </select>
            	</div>
            	
                <div class="input-group">
            	  <span class="input-group-addon" id="basic-addon1">Duration</span>
            	  <input type="time" name="duration" class="form-control" required>
            	</div>
            	
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Date</span>
                    <input type="date" name="time" class="form-control" required>
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Comment</span>
                    <input type="text" name="comment" class="form-control" placeholder="Add a comment">
                </div>
                <input class="btn sport-submit" type="submit" name="submit" value="Add Activity" />
            </form>
                
            <?php
            
            } else {
            	$mysqli = new mysqli($servername, $username, $password, $database, $dbport);
            	if ($mysqli->connect_errno) {
            		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
            		exit();
            	}
             
            	$name_sport = $_POST['name-sport'];
            	$duration = $_POST['duration'];
            	$time = $_POST['time'];
            	$comment = $_POST['comment'];
            	
            	$sport_sql = "INSERT  INTO `sport_inter` (`id_user`, `name_sport`, `duration`, `time`, `comment`) 
				VALUES ('{$a_user_id}', '{$name_sport}', '{$duration}', '{$time}', '{$comment}')";

                if ($mysqli->query($sport_sql) === TRUE) {
        			header("Location: ./sport.php");
        		} else {
        			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
        			exit();
        		}
        		
            }
            ?>
            
    <div class="row activities-sport">
      <div class="col s12 ">
        <div class="card blue">
          
          <div class="card-content white-text">
              <div class="card-title">Activities</div>
            <p>The timeline of you different activities</p>
          </div>
          <div class="card-tabs">
            <ul class="tabs tabs-fixed-width tabs-transparent">
              <li class="tab"><a class="active"href="#running-tab">Running</a></li>
              <li class="tab"><a href="#cycling-tab">Cycling</a></li>
              <li class="tab"><a href="#walking-tab">Walking</a></li>
            </ul>
          </div>
          <div class="card-content white">
            <div id="running-tab" class="center-align">
                <?php
                $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
                $run_query = "SELECT * FROM sport_inter WHERE id_user = $a_user_id AND name_sport = 'running' ORDER BY time DESC";
                if($run_result = $mysqli->query($run_query))
                {
                    while($run_row = $run_result->fetch_assoc())
                    {
                        $dur = $run_row['duration'];
                        $comm = $run_row['comment'];
                        $date = strtotime($run_row['time']);
                        $php_timestamp_date_run = date("d F Y",  $date);
                        
                        echo '<div class="sport-tl-firstline">
                        You ran for '.$dur.' h the '. $php_timestamp_date_run.'
                        </div>
                        <div class="sport-tl-secondline">
                             Comment: "'.$comm.'"
                        </div>
                        <div class="separator"></div>';
                    }
                }
                ?>
            </div>
            <div id="cycling-tab" class="center-align">
                <?php
                $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
                $cyc_query = "SELECT * FROM sport_inter WHERE id_user = $a_user_id AND name_sport = 'cycling' ORDER BY time DESC";
                if($cyc_result = $mysqli->query($cyc_query))
                {
                    while($cyc_row = $cyc_result->fetch_assoc())
                    {
                        $dur = $cyc_row['duration'];
                        $comm = $cyc_row['comment'];
                        $date = strtotime($cyc_row['time']);
                        $php_timestamp_date_cyc = date("d F Y",  $date);
                        
                        echo '<div class="sport-tl-firstline">
                        You cycled for '.$dur.' h the '. $php_timestamp_date_cyc.'
                        </div>
                        <div class="sport-tl-secondline">
                             Comment: "'.$comm.'"
                        </div>
                        <div class="separator"></div>';
                    }
                }
                ?>
            </div>
            <div id="walking-tab" class="center-align">
                <?php
                $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
                $wal_query = "SELECT * FROM sport_inter WHERE id_user = $a_user_id AND name_sport = 'walking' ORDER BY time DESC";
                if($wal_result = $mysqli->query($wal_query))
                {
                    while($wal_row = $wal_result->fetch_assoc())
                    {
                        $dur = $wal_row['duration'];
                        $comm = $wal_row['comment'];
                        $date = strtotime($wal_row['time']);
                        $php_timestamp_date_wal = date("d F Y",  $date);
                        
                        echo '<div class="sport-tl-firstline">
                        You walked for '.$dur.' h the '. $php_timestamp_date_wal.'
                        </div>
                        <div class="sport-tl-secondline">
                             Comment: "'.$comm.'"
                        </div>
                        <div class="separator"></div>';
                    }
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
    <script src="./js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="./js/script.js"></script>
    
</body>

</html>