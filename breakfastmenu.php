<!DOCTYPE html>
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
            <div data-activates="slide-out" class="menu-icon button-menu">
                <i class="material-icons">menu</i>
            </div>
            <div class="headtitle">Vitae</div>
            <div class="profile-button"><a class="menu-icon-profile" href="profile.php"><i class="material-icons">person</i></a></div>
        </div>
    </div>
</div>
	
		
                <div class="container-fluid">
                
                <h1>Breakfast Menu</h1>
                <br>
                <hr color=#d6d6d6 width=100%> <!--this is the code for creating the thin grey line that seperates the items in the menus and workout pages-->
                <br>
                <a href="./recipes/breakfast_recipies/brecipie1.php"><h3><u>Porridge:</u></h3>
                <br>
                <br>
                <p>Put the oats in a saucepan, pour in the milk or water and sprinkle in a pinch of salt. Bring to the boil and simmer for 4-5 minutes, stirring from time to time and watching carefully that it doesn’t stick to the bottom of the pan.</p>
                <br>
                <hr color=#d6d6d6 width=100%>
                <br>
                <a href="./recipes/breakfast_recipies/brecipie2.php"><h3><u>Avocado on Toast with Chorizo and Fried Eggs:</u></h3>
                <br>
                <br>
                <p>Heat a large frying pan, add the pumpkin seeds and toast for a few Mins until they crack and pop, then tip out into a bowl and set aside.</p>
                <br>
                <hr color=#d6d6d6 width=100%>
                <br>
                <a href="./recipes/breakfast_recipies/brecipie3.php"><h3><u>Fruit Salad and greek Yoghurt:</u></h3>
                <br>
                <br>
                <p>Combine the yogurt, honey, vanilla extract, and vanilla bean seeds in a bowl and set aside.</p>
                <br>
                <hr color=#d6d6d6 width=100%>
                <br>
                <a href="./recipes/breakfast_recipies/brecipie4.php"><h3><u>On The Run Breakfast Bars:</u></h3>
                <br>
                <br>
                <p>Heat oven to 160C/fan 140C/gas 3. Butter a 22cm square baking tin.</p>
                <br>
                <hr color=#d6d6d6 width=100%>
                <br>
                <a href="./recipes/breakfast_recipies/brecipie5.php"><h3><u>Low-Fat Cheese and Spinach Omelette:</u></h3>
                <br>
                <br>
                <p>Crack the eggs in a bowl. Add the salt, pepper and herbs and then whisk.</p>
                <br>
                <hr color=#d6d6d6 width=100%>
                <br>
                <a href="./recipes/breakfast_recipies/brecipie6.php"><h3><u>Tropical Breakfast Smoothie:</u></h3>
                <br>
                <br>
                <p>Scoop the pulp of the passion fruits into a blender and add the banana, mango and orange juice.</p>
                <br>
                <br>
                <a href="food.php"<input class="btn" type="submit" name="submit" value="Back to CookBook" style="margin-left: 8em; margin-bottom: 1em;" />Back to CookBook</a>
                </div> <!--container-fluid-->

    <script src="./js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="./js/script.js"></script>
            
</body>

</html>