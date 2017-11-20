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
                
                <h1>Drinks Menu</h1>
                <br>
                <hr color=#d6d6d6 width=100%> <!--this is the code for creating the thin grey line that seperates the items in the menus and workout pages-->
                <br>
                <a href="./recipes/drink_recipies/drrecipie1.php"><h3><u>Tomato-Vegetable Juice:</u></h3>
                <br>
                <br>
                <p>Working in this order, process lettuce, chives, tomatoes, jalapeno, bell pepper, celery and carrot through a juicer according to the manufacturer's directions.</p>
                <br>
                <hr color=#d6d6d6 width=100%>
                <br>
                <a href="./recipes/drink_recipies/drrecipie2.php"><h3><u>Green Smoothie:</u></h3>
                <br>
                <br>
                <p>Place bananas, pear (or apple), kale, orange juice, water, ice cubes and flaxseed in a blender.</p>
                <br>
                <hr color=#d6d6d6 width=100%>
                <br>
                <a href="./recipes/drink_recipies/drrecipie3.php"><h3><u>Creamsicle Breakfast Smoothie:</u></h3>
                <br>
                <br>
                <p>Blend coconut water, yogurt, mango, orange juice concentrate and ice in a blender until smooth.</p>
                <br>
                <hr color=#d6d6d6 width=100%>
                <br>
                <a href="./recipes/drink_recipies/drrecipie4.php"><h3><u>Banana-Cocoa Soy Smoothie:</u></h3>
                <br>
                <br>
                <p>Slice banana and freeze until firm. Blend tofu, soymilk, cocoa and honey in a blender until smooth.</p>
                <br>
                <hr color=#d6d6d6 width=100%>
                <br>
                <a href="./recipes/drink_recipies/drrecipie5.php"><h3><u>Pomegranate Berry Smoothie:</u></h3>
                <br>
                <br>
                <p>Combine mixed berries, pomegranate juice, banana, cottage cheese and water in a blender; blend until smooth. Serve immediately.</p>
                <br>
                <hr color=#d6d6d6 width=100%>
                <br>
                <a href="./recipes/drink_recipies/drrecipie6.php"><h3><u>Tropical Fruit Smoothie:</u></h3>
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