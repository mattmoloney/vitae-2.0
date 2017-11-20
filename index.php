<?php 
session_start();
include 'inc/header.php'; ?>
</head>

<body>

<?php include 'inc/menu.php'; ?>

    <div class="row headbar-container">
        <div class="headbar blue z-depth-2">
            <div data-activates="slide-out" class="menu-icon button-menu">
                <i class="material-icons">menu</i>
            </div>
            <div class="headtitle">Vitae</div>
            <div class="profile-button"><a class="menu-icon-profile" href="profile.php"><i class="material-icons">person</i></a></div>
        </div>
    </div>
 
 <div class="container-index">
    <div class="row menu-row">
        <div class="col s6">
            <div class="menu-subgroup">
                <a href="sport.php" class="nostyle"><div class="blue-circle-left"><i class="icon-circle material-icons">directions_bike</i><p class="category-name">Sport</p></div></a>
            </div>
        </div>
              
        <div class="col s6">
            <div class="menu-subgroup">
                <a href="food.php" class="nostyle"><div class="blue-circle-right"><i class="icon-circle material-icons">local_dining</i><p class="category-name">Food</p></div></a>
            </div>
        </div>
    </div>
        
    <div class="row menu-row">
        <div class="col s6">
            <div class="menu-subgroup">
                <a href="#modal1" class="nostyle"><div class="blue-circle-left"><i class="icon-circle material-icons">whatshot</i><p class="category-name">Tracker</p></div></a>
            </div>
        </div>

      <div id="modal1" class="modal">
        <div class="modal-content">
          <h2>Trackers</h2>
          <a class="nostyle" href="weight.php"><div class="btn btn-track-index">Weight Tracker</div></a>
          <a class="nostyle" href="sleep.php"><div class="btn btn-track-index">Sleep Tracker</div></a>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">CLose</a>
        </div>
      </div>
           
        <div class="col s6">
            <div class="menu-subgroup">
                <a href="map.php" class="nostyle"><div class="blue-circle-right"><i class="icon-circle material-icons">place</i><p class="category-name">Map</p></div></a>
            </div>
        </div>
    </div>
    
<div class="row">
      <div class="col s12 ">
        <div class="card blue">
          
          <div class="card-content white-text">
              <div class="card-title">Your timeline</div>
            <p>Your timeline documents your progress across Vitae</p>
          </div>
          <div class="card-tabs">
            <ul class="tabs tabs-fixed-width tabs-transparent">
              <li class="tab"><a class="active"href="#weight-tab">Weight</a></li>
              <li class="tab"><a href="#sport-tab">Sports</a></li>
              <li class="tab"><a href="#sleep-tab">Sleep</a></li>
            </ul>
          </div>
          <div class="card-content white">
            <div id="weight-tab" class="center-align">
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
                        
                        echo '<div class="weight-line-profile">'.$weight.' kg on the '.$php_timestamp_date.'</div>
                        <div class="separator"></div>';
                    }
                }
                ?>
            </div>
            <div id="sport-tab" class="center-align">
                <?php
                $mysqli = new mysqli($servername, $username, $password, $database, $dbport);
                $sports_query = "SELECT * FROM sport_inter WHERE id_user = $a_user_id ORDER BY time DESC";
                if($sports_result = $mysqli->query($sports_query))
                {
                    while($sports_row = $sports_result->fetch_assoc())
                    {
                        $sports_name = ucfirst($sports_row['name_sport']);
                        $sports_timer = $sports_row['duration'];
                        $sports_date = strtotime($sports_row['time']);
                        $php_timestamp_sports_date = date("d F Y",  $sports_date);
                        
                        echo '<div class="sports-lines">
                            <div class="sports-first-line">'.$sports_name.' for '.$sports_timer.'</div>
                            <div class="sports-second-line">Recorded on the '.$php_timestamp_sports_date.'</div>
                        </div>
                        <div class="separator"></div>';
                    }
                }
                ?>
            </div>
            <div id="sleep-tab" class="center-align">
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
                        
                        echo '<div class="weight-line-profile">'.$sleeps_time.' h slept - Rating: '.$sleeps_quality.'/5<br><br>Recorded on the '.$php_timestamp_date.'</div>';
                        echo '<div class="separator"></div>';
                    }
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    
</div> <!--container-fuid-->



    <script src="./js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="./js/script.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.modal').modal();
          });
    </script>
</body>

</html>