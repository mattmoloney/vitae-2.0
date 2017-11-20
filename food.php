<!-DOCTYPE html->
<html>
<head>
<?php 
session_start();
include 'inc/header.php'; ?>
</head>

<body>

<?php include 'inc/menu.php'; ?>
<div class="container-fluid">
    <div class="row headbar-container">
        <div class="headbar blue z-depth-2">
            <div data-activates="slide-out" class="menu-icon-down button-menu">
                <i class="material-icons">menu</i>
            </div>
            <div class="headtitle">Food</div>
            <div class="profile-button"><a class="menu-icon-profile-down" href="profile.php"><i class="material-icons">person</i></a></div>
        </div>
    </div>
  </div>  

<h1>What are you cooking today?</h1>
 
 <div class="container-food">
 <div class="menu-btn-top">  
    <div class="row">
        <div class="col s6 center-align">
            <a href="breakfastmenu.php"><button class="menu-btn btn" alt="breakfast menu">Breakfast</button></a>
        </div>
    
        <div class="col s6 center-align">
            <a href="lunchmenu.php"><button class="menu-btn btn" alt="lunch menu">Lunch</button></a>
        </div>
    </div>
 </div>
  
 <div class="menu-btn-middle">
   <div class="row">
     <div class="col s6 center-align">
        <a href="dinnermenu.php"><button class="menu-btn btn" alt="dinner menu">Dinner</button></a>
     </div>
  
     <div class="col s6 center-align">
        <a href="dessertsmenu.php"><button class="menu-btn btn" alt="desserts menu">Desserts</button></a>
     </div>
  </div>
 </div> 
 <div class="menu-btn-bottom">
   <div class="row">
     <div class="col s6 center-align">
       <a href="drinksmenu.php"><button class="menu-btn btn" alt="snacks menu" >Drinks</button></a>
     </div>
     
     <div class="col s6 center-align">
       <a href="snackmenu.php"><button class="menu-btn btn" alt="snacks menu" >Snacks</button></a>
     </div>
   </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="best_recipies">
            <h4>Most Popular Recipes</h4>
            <h5>Chicken and Chorizo Salad</h5>
            <p>Find me in the dinner menu!</p>
            <div class="separator"></div>
            
            <h5>Spicy Avacado Wraps</h5>
            <p>Find me in the lunch menu!</p>
            <div class="separator"></div>
            
            <h5>Spiced Apple Chrisps</h5>
            <p>Find me in the snacks menu!</p>
            <div class="separator"></div>
        </div>
    </div>
</div>

</div> <!--container-food-->

    <script src="./js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="./js/script.js"></script>
    
</body>

</html>