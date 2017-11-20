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
            <div class="headtitle">Weight Tracker</div>
            <div class="profile-button"><a class="menu-icon-profile-down" href="profile.php"><i class="material-icons">person</i></a></div>
        </div>
    </div>

 
<div class="container-weight">
    <div class="content-weight">
        <?php
        if (!isset($_POST['submit'])){
        ?>
            
        <div class="row">
            <div class="col s10 offset-s1 login-form">
                <div class="current-weight-title">Current weight: <span class="actual-weight"><?php echo $a_user_weight ?> kg</span></div>
            	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            		New weight (in kg): <input type="text" name="nweight" value="<?php echo $a_user_weight ?>" required/><br />
            		Date: <input type="date" name="date" required/><br />
            		Time of day: <input type="time" name="timer" required/><br />
             
            		<input type="submit" name="submit" class="btn" value="Save" style="width:100%"/>
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
             
            	$nweight = $_POST['nweight'];
            	$date = $_POST['date'];
            	$timer = $_POST['timer'];
            	
            	$sport_sql = "INSERT  INTO `weights` (`id_user`, `weight`, `time`, `timer`) 
				VALUES ('{$a_user_id}', '{$nweight}', '{$date}', '{$timer}')";

                if ($mysqli->query($sport_sql) === TRUE) {
        			header("Location: ./weight.php");
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
                <div class="card-title">Your weight evolution</div>
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
                        
                        echo '<div class="weight-line">'.$weight.' kg <br> '.$php_timestamp_date.' at '.$timer.'</div>';
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