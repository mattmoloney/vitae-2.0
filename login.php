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
            <div class="headtitle">Login</div>
        </div>
    </div>
    
<div class="row">
    <div class="col s8 offset-s2 login-form">
<?php
if (!isset($_POST['submit'])){
?>
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		Username: <input type="text" name="login" /><br />
		Password: <input type="password" name="password" /><br />
 
		<input type="submit" name="submit" class="btn" value="Login" style="margin-left: 5.5em;"/>
	</form>
<?php
} else {
	require_once("php/connect.php");
	$mysqli = new mysqli($servername, $username, $password, $database, $dbport);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
 
	$login = $_POST['login'];
	$password = $_POST['password'];
 
	$sql = "SELECT * from user WHERE login LIKE '{$login}' AND password LIKE '{$password}' ";
	//$sql = "SELECT * from user WHERE username LIKE 'hello' ";
	$result = $mysqli->query($sql);
	
    	echo $last_name;
	if (!$result->num_rows == 1) {
		echo "<p>Invalid username/password combination</p>";
	} else {
		echo "<p>Logged in successfully</p>";
		$_SESSION['loggedin'] = true;
    	$_SESSION['login'] = $login;
    	
    	header("Location: ./index.php");
	}
}
?>
        </div>
    </div>
    
    <div class="row">
        <div class="col s12 center-align register-now-container">
            <h4 class="center-align">Not registered ?</h4>
            <a  href="register.php" class="waves-effect waves-light btn">Register</a>
        </div>
    </div>
</div>

	<script src="./js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="./js/script.js"></script>	
</body>
</html>
