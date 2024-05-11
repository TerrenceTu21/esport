<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../pics/logo.ico" rel="icon"/>
    <link href="../css/index.css" rel="stylesheet" />
    <script src="../javascript/countdown.js"></script>
    <title>Esport championship league 2023</title>
</head>

<?php
    include('header.php');
    include_once('helper.php');
    function getTime()
    {
        $dbconnection = dbconnection();
        $sql = "SELECT * FROM events WHERE StartDate >= CURDATE() GROUP BY StartDate ASC LIMIT 1";
        $statement = $dbconnection->prepare($sql);
        $row = $dbconnection->query($sql)->fetch_assoc();
        return $row;

    }
    $row = getTime();

    function getTime2()
    {
        $dbconnection = dbconnection();
        $sql = "SELECT * FROM events WHERE Status = 'On going' GROUP BY StartDate ASC LIMIT 1";
        $statement = $dbconnection->prepare($sql);
        $result = $dbconnection->query($sql)->fetch_assoc();
        return $result;

    }
    $result = getTime2();
?>

<script>
// Set the date we're counting down
//var countDownDate = new Date(document.getElementById("Date"));
//var countDownDate = <?php echo $row['StartDate'] ?>;
var countDownDate = new Date("<?php echo $row['StartDate'] ?>");
console.log(countDownDate);
var targetDate = countDownDate.getTime();


// Update the count down every 1 second
var x = setInterval(function(){

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor(((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) -(days* 24)) ;
    if (days > 0){ hours = hours + (days * 24); }
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    var countDownText = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
    var countdownTimer = document.getElementsByClassName("tournament-Countdown")[0];
    countdownTimer.innerHTML = countDownText;

  }, 1000);
  
  function pad(n) {
    return n < 10 ? "0" + n : n;
  }
</script>

<body>
    <div class="tournament">
        <div class="left">
            <h1>On Going Tournament</h1>
            <div class="upcomingEvent">
                <h4>Game:<?php echo $result['Games']?><br>Date:<?php echo $result['StartDate']?></h4>
            </div>
        </div>
        <div class="right">
            <h1>Up Coming Tournament</h1>
            <div class="countdown">
               <span class="tournament-Countdown">00h 00m 00s</span>
            </div>
    
            <div class="upcomingEvent">
                <h4>Game:<?php echo $row['Games']?><br>Start date:<?php echo $row['StartDate']?></h4>
            </div>
        </div>
    </div>

    <div class="tourContent">
    <h3 style="color:white">Games Introduction</h3>
        <ul class="secContent">
            <div class="csgo" >
                </br>
                <p>CS:GO is a world wide competition which also has the largest price pool by this year. 10$m </p>
            </div>

            <div class="lol" >
                </br>
                <p>League of legends is a 5 player team-based game which is very popular in the world. </p>
            </div>

            <div class="dota2" >
                </br>
                <p> Dota 2. Defend of the ancient is a game which needs the cooperatives of all players to victory</p>
            </div>

            <div class="pubg" >
                </br>
                <p>PUBG. 100 players multiplayer game which consists of strategics and firepower to survive to the last.</p>
            </div>
        </li>
        </ul>
    </div>
</body>
    <?php
        include('footer.php');
    ?>
</html>