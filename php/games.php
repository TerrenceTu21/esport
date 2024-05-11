<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>

    <link href="../pics/logo.ico" rel="icon"/>
    <link href="../css/games.css" rel="stylesheet"/>
    <title>Tournaments</title>
    

</head>
<body>
    <?php include('header.php'); ?>
    <?php if(empty($_SESSION)){ ?>
        <div class="grid-container">

        <div class="grid-item" id="lol">
            <img src="../pics/lol.jpg" />
            <div class="inverted"><a href="userlogin.php">Register</a></div>
            
        </div>
        <div class="grid-item" id="csgo">
            
        <img src="../pics/csgo.jpg" />
            
            <div class="inverted"><a href="userlogin.php">Register</a></div>
        </div>
        <div class="grid-item" id="dota2">

        <img src="../pics/dota2.jpg" />
            
            <div class="inverted"><a href="userlogin.php">Register</a></div>
        </div>  
        <div class="grid-item" id="pubg">

        <img src="../pics/pubg.jpg" />

            <div class="inverted"><a href="userlogin.php">Register</a></div>
        </div>

        </div>

    <?php  }?>
            
            
    <?php 
    if(!empty($_SESSION)){
    if($_SESSION['userType'] == 1){//user 

    $sortBy = (isset($_GET['sortBy'])) ? $_GET['sortBy'] : "games";
    $sortOrder = (isset($_GET['sortOrder'])) ? $_GET['sortOrder'] : "Asc";
    $status = (isset($_GET['games'])) ? $_GET['games'] : "All";

    function generateFilterGames($currentGames, $sortBy ){
        $gamesFiltering = "?gameSelected=$currentGames" ;
        $gamesFiltering .= "&sortBy=$sortBy" ;
        return $gamesFiltering;
    }
    ?>

    <div class="grid-container" method="get">

        <div class="grid-item" id="lol">
            <img src="../pics/lol.jpg" />
            <div class="inverted" name="game"><a href="events.php<?php echo generateFilterGames("league of legends",$sortBy); ?>">Register</a></div>

            
        </div>
        <div class="grid-item" id="csgo">
            
        <img src="../pics/csgo.jpg" />
            
                <div class="inverted" name="game"><a href="events.php<?php echo generateFilterGames("Counter Strike Global offensive", $sortBy); ?>">Register</a></div>
        </div>
        <div class="grid-item" id="dota2">

        <img src="../pics/dota2.jpg" />
            
            <div class="inverted" name="game"><a href="events.php<?php echo generateFilterGames("Dota 2", $sortBy); ?>">Register</a></div>
        </div>  
        <div class="grid-item" id="pubg">

        <img src="../pics/pubg.jpg" />
        
            <div class="inverted" name="game"><a href="events.php<?php echo generateFilterGames("Players unknown battle ground", $sortBy); ?>">Register</a></div>
        </div>

    </div>
    <?php }
    }?>
    <?php
        include('footer.php');
    ?>
</body>
</html>