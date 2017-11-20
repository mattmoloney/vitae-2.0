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
            <a href="profile.php" class="menu-icon"><i class="material-icons">keyboard_backspace</i></a>
            <div class="headtitle">Edit profile</div>
        </div>
    </div>
    
    <div class="row">
        <div class="col s8 offset-s2 login-form">
            <?php
            if (!isset($_POST['submit'])){
            ?>
            
            	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            	    <div class="form-entry">Gender: 
                		<select name="sex">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-entry">Age: <input type="text" name="age" value="<?php echo $a_user_age ?>"/>
                    </div>
                    
                    <div class="form-entry">Height (in centimeters): <input type="text" name="height" value="<?php echo $a_user_height ?>"/>
                    
                    <div class="form-entry">
                    Choose your profile image: 
                    <div class="select-img"><input type="radio" name="image" value="av1"><img class="circle" src="../img/av1.png"></div>
            		<div class="select-img"><input type="radio" name="image" value="av2"><img class="circle" src="../img/av2.png"></div>
            		<div class="select-img"><input type="radio" name="image" value="av3"><img class="circle" src="../img/av3.png"></div>
            		<div class="select-img"><input type="radio" name="image" value="av4" checked><img class="circle" src="../img/av4.png"></div>
                     </div>
            		<input type="submit" name="submit" class="btn-large profile-save" value="Save changes" />
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
             
            	$sex = $_POST['sex'];
            	$age = $_POST['age'];
            	$img = $_POST['image'];
            	$height = $_POST['height'];
            	
            	$update_results = $mysqli->query("UPDATE user SET sex='$sex',age='$age',height='$height', img='$img' WHERE id= $a_user_id ");

                if($update_results){
                header('Location: profile.php');
                }else{
                    print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
                }
             
            }
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col s12 center-align register-now-container">
            <h5>Update your weight</h5>
            <a  href="weight.php" class="waves-effect waves-light btn">Weight Tracker</a>
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


var service = new google.maps.places.PlacesService(map); //this is the internal search query to show where the gym's are
      service.nearbySearch({
        location: pyrmont,
        radius: 16090,
        types: ['gym']
      }, processResults);
      
      if (navigator.geolocation) { //this is the code to get the location of the device
        navigator.geolocation.getCurrentPosition(function(position) {
    	  pyrmont = {
            	lat: position.coords.latitude, //gets the latitude coordinates
            	lng: position.coords.longitude, //get the longitude coordinates
                frequency : 1000 //Gets the location every second
       		};
    		map.setCenter(pyrmont); //this posts the results of the gyms around the location previously found onto the map that was created
    	service = new google.maps.places.PlacesService(map);
    	  service.nearbySearch({
    		location: pyrmont,
    		radius: 16090,
    		types: ['gym']
    	  }, processResults);
    	 });
      }
    }
    
    function processResults(results, status, pagination) { //this tells the device how to present the results found ie.creating the list and the markers  
      if (status !== google.maps.places.PlacesServiceStatus.OK) {
        return;
      } else {
        createMarkers(results);
    
        if (pagination.hasNextPage) {
          var moreButton = document.getElementById('more');
    
          moreButton.disabled = false;
    
          moreButton.addEventListener('click', function() {
            moreButton.disabled = true;
            pagination.nextPage();
          });
        }
      }
    }
    
    function createMarkers(places) {
      var bounds = new google.maps.LatLngBounds();
      var placesList = document.getElementById('places');
    
      for (var i = 0, place; place = places[i]; i++) {
        var image = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
        };
    
        var marker = new google.maps.Marker({
          map: map,
          icon: image,
          title: place.name,
          position: place.geometry.location
        });
    
        placesList.innerHTML += '<li>' + place.name + '</li>';
    
        bounds.extend(place.geometry.location);
      }
      map.fitBounds(bounds);
    }  
