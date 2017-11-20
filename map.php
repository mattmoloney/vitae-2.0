<!-DOCTYPE html->
<html>
<head>
<?php 
session_start();
include 'inc/header.php'; ?>
        
    <style>
    #map {
      height:230px;
      width:100%;
      margin-bottom:10px;
    }
      #right-panel { /*this is the styling for the map and results box*/
        font-family: 'Arial', 'Helvetica', sans-serif; /*this defines the fonts to be used within the results box*/
        right: 5px;
        width: 300px;
        margin-left:auto;
        margin-right:auto;
        padding: 5px;
        z-index: 3; /*this sets the box to be on a z-index above the map but below the hamburger menu*/
        border: 1px solid #999;
        background-color: #fff;
        align-content: center;
        opacity: 0.8; /*this is what makes the results box 80% opacity like the clients asked for*/
      }
      h2 {
        font-size: 22px;
        margin: 0 0 5px 0;
        z-index: 4;
      }
      #places {
        list-style-type: none;
        padding: 20px;
        margin: 0;
        height: 200px; /*this defines the height of the results box*/
        width: 100%; /*this defines the width of the results box*/
        overflow-y: scroll; /*this tells the app to put any overflow of the results on a y-axis within the results box*/
        text-align: center;
        z-index: 4; /*this puts the results list on a z-index above the reults box so the transparency isn't applied to the text*/
      }
      #places li {
        color: #000000;
        padding: 10px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        font-size: 15px;
        z-index: 4;
      }
      #more {
        width: 100%;
        margin-left: 0px;
        margin-top: 10px;
        z-index: 4;
      }
      .map-title {
        font-size:18px;
        color:#2196F3;
        margin-top: 10px;
        margin-bottom:10px;
        text-align:center;
      }
    </style>
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
   
   <div class="map-title">To view gym's near you please enable location services</div>
   
   <div id="map"></div>   <!--this is the div for the javascript to create the map canvas in-->                 
    <div id="right-panel">
      <h2>Results</h2>
      <ul id="places"></ul>
    </div>
        
    <script>
    var map;
    var service;
    var marker;
    var pos;
    var infoWindow;
    
    function initMap() { //this is the javescript that creates the map canvas
       var pyrmont //= {lat: 43.069452, lng: -89.411373};
    
      map = new google.maps.Map(document.getElementById('map'), {
        center: pyrmont,
        zoom: 17
      });
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
      
        infoWindow = new google.maps.InfoWindow;

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
            
            var mymarker = new google.maps.Marker({
              position: pos,
              map: map,
              title: 'You are here'
            });
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
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
    
    }
    
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=INSERT_YOUR_KEY_HERE&libraries=places&callback=initMap" async defer>
    </script>
 </div>
    
</div> <!--container-fuid-->

    <script src="./js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="./js/script.js"></script>
    
</body>

</html>
