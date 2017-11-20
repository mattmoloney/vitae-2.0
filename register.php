<?php 
session_start();
include 'inc/header.php';
if (isset($_SESSION['loggedin'])) {
    header('Location: ./index.php');
} 
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
            <div class="headtitle">Register</div>
        </div>
    </div>
    
<div class="row">
    
<?php
require_once("php/connect.php");
if (!isset($_POST['submit'])) {
?>

<form class="form-register" action="<?=$_SERVER['PHP_SELF']?>" method="post">
		Username: <input type="text" name="login" /><br />
		Password: <input type="password" name="password" /><br />
		First name: <input type="text" name="first_name" /><br />
		Last name: <input type="text" name="last_name" /><br />
		Email: <input type="text" name="email" /><br />
 
		<input class="btn" type="submit" name="submit" value="REGISTER" style="margin-left: 9em;"/>
</form>


<?php
} else {
	$mysqli = new mysqli($servername, $username, $password, $database, $dbport);
	
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}

	$login	= $_POST['login'];
	$password	= $_POST['password'];
	$first_name	= $_POST['first_name'];
	$last_name	= $_POST['last_name'];
	$email		= $_POST['email'];
 
	$exists = 0;
	$result = $mysqli->query("SELECT login from user WHERE login = '{$login}' LIMIT 1");
	if ($result->num_rows == 1) {
		$exists = 1;
		$result = $mysqli->query("SELECT email from user WHERE email = '{$email}' LIMIT 1");
		if ($result->num_rows == 1) $exists = 2;	
	} else {
		$result = $mysqli->query("SELECT email from user WHERE email = '{$email}' LIMIT 1");
		if ($result->num_rows == 1) $exists = 3;
	}
 
	if ($exists == 1) echo "<p>Username already exists!</p>";
	else if ($exists == 2) echo "<p>Username and Email already exists!</p>";
	else if ($exists == 3) echo "<p>Email already exists!</p>";
	else {
		# insert data into mysql database
		$sql = "INSERT  INTO `user` (`id`, `login`, `password`, `first_name`, `last_name`, `email`) 
				VALUES (NULL, '{$login}', '{$password}', '{$first_name}', '{$last_name}', '{$email}')";
 
		if ($mysqli->query($sql)) {
			//echo "New Record has id ".$mysqli->insert_id;
			echo "<p><br>Registred successfully!<br></p>
			<a href='login.php' class='nostyle'><div class='btn'>log in</div></a>";
		} else {
			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
			exit();
		}
	}
}
?>
    </div>
</div>

	<script src="./js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="./js/script.js"></script>	
</body>
</html>