<!-DOCTYPE html->
<html>
<head>
<?php 
session_start();
include 'inc/header.php';
include 'inc/redirect.php';?>
</head>

<body>

<?php include 'inc/menu.php'; ?>
    <div class="row headbar-container">
        <div class="headbar blue z-depth-2">
            <div data-activates="slide-out" class="menu-icon-down button-menu">
                <i class="material-icons">menu</i>
            </div>
            <div class="headtitle">Sleep Tracker</div>
            <div class="profile-button"><a class="menu-icon-profile-down" href="profile.php"><i class="material-icons">person</i></a></div>
        </div>
    </div>

 
<div class="container-weight">
    <div class="content-weight">
        <?php
        if (!isset($_POST['submit'])){
        ?>
            
        <div class="row">
            <div class="col s10 offset-s1">
                <h2>How have you slept ?</h2>
                <div class="current-sleep-subtitle">Enter your most recent sleep cycle below</div>
            	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            		Sleep duration: <input type="time" name="time" required/><br />
            		Date: <input type="date" name="date" required/><br />
            		Quality of your sleep: <br><br><input type="radio" name="quality" value="5" checked>5
            		                        <input type="radio" name="quality" value="4">4
            		                        <input type="radio" name="quality" value="3">3
            		                        <input type="radio" name="quality" value="2">2
            		                        <input type="radio" name="quality" value="1">1<br>
             
            		<input type="submit" name="submit" class="btn sleep-btn" value="Save" style="width:100%"/>
            	</form>
        	
        	</div>
        </div>
        <?php
        } else {
        	    $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
            	if ($mysqli->connect_errno) {
            		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
            		exit();
            	}
             
            	$time = $_POST['time'];
            	$date = $_POST['date'];
            	$quality = $_POST['quality'];
            	
            	$sleep_sql = "INSERT  INTO `sleep` (`id_user`, `time`, `date`, `quality`) 
				VALUES ('{$a_user_id}', '{$time}', '{$date}', '{$quality}')";

                if ($mysqli->query($sleep_sql) === TRUE) {
        			header("Location: ./sleep.php");
        		} else {
        			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
        			exit();
        		}
             
        }
        ?>
    </div>
    
    <div class="history-weight">
         <div class="card weight-tl">
            
            <div class="card-content weight-lines">
                <div class="card-title">Your sleep cycles</div>
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
                        
                        echo '<div class="weight-line">'.$sleeps_time.' h slept - Rating: '.$sleeps_quality.'/5<br><br>On the '.$php_timestamp_date.'</div>';
                        echo '<div class="separator"></div>';
                    }
                }
                ?>
            </div>
          </div>
        
    </div>
</div>

    <script src="./js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="./js/script.js"></script>
    
</body>

</html>