<!DOCTYPE html>
<html lang="en">
<!--check isit whether becuz cannot more than one games to be display-->
<link href="../pics/logo.ico" rel="icon"/>
<link href="../css/events.css" rel="stylesheet" />

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>

</head>
<script>
function myFunction() {
  alert("Please Log in first to register! ^_^");
}
</script>
<body>
  <div class="banner">

    <?php include('header.php'); ?>
        <div class="transbox">

        <h1 class="glowing" style="font-size:50px;">Tournaments</h1>
        <div class="heads">
          <ul>
            <?php 
            $statusSelected = (isset($_GET['statusSelected'])) ? $_GET['statusSelected'] : "NULL";
            $gameSelected = (isset($_GET['gameSelected']) ? $_GET['gameSelected'] : "NULL");

              function generateFilterLink($statusSelected, $gameSelected)
              {
                  $eventsFiltering = "?statusSelected=$statusSelected";
                  $eventsFiltering .= "&gameSelected=$gameSelected";
                  return $eventsFiltering;
              }
             

             function getGames($status=NULL, $gameSelected=NULL)
             {
              $dbConnection = dbconnection();
              $sql = "SELECT * FROM events ";
              if ($status != "NULL"){
                $sql .= "WHERE Status = '$status' ";
                if($gameSelected != "NULL"){
                  $sql .= "AND Games = '$gameSelected'";
                }
              }elseif($gameSelected != "NULL"){
                $sql .= "WHERE Games = '$gameSelected'";
              }
              $result = $dbConnection->query($sql);

              closeDbConnection($dbConnection);
              return $result;
              
             }

              // function generateSortingLink($date, $currentSortOrder, $currentSortingColumn)
              // {
              //   $sortingLink = "?sortBy=$date&sortOrder=";
              //     if($currentSortingColumn == $date)
              //     {
              //     if($currentSortOrder == "Asc")
              //     {
              //       $sortingLink .= "Desc";
              //     }

              //   else
              //   {
              //       $sortingLink .= "Asc";
              //   }
              //   }

              //   else{
              //     $sortingLink .= "Asc";
              //   }
            
              //     $sortingLink .= "&date=".$GLOBALS['date'];
              //     return $sortingLink;
              // }
            ?>
              <li><a href="<?php echo generateFilterLink("NULL", "NULL"); ?>" >All</a></li>
              <li><a href="<?php echo generateFilterLink("On going", $gameSelected); ?>" >On Going</a></li>
              <li><a href="<?php echo generateFilterLink("Up coming", $gameSelected); ?>" >Up Coming</a></li>
              <li><a href="<?php echo generateFilterLink("Past tournaments", $gameSelected); ?>" >Past Tournaments</a></li>
           
          </ul>
        </div>

        <div>
        <table class="userSelection">
              <tr>
                <td style="background-image:url('../pics/eventslol.jpg');"><a href="<?php echo generateFilterLink($statusSelected, "League of legends"); ?>">league of legends</a></td>
                <td style="background-image:url('../pics/eventsDota.jpg');"><a href="<?php echo generateFilterLink($statusSelected, "Dota 2"); ?>">Defend of the ancients 2</a></td>
                <td style="background-image:url('../pics/eventsCsgo.jpg');"><a href="<?php echo generateFilterLink($statusSelected, "Counter Strike Global Offensive"); ?>">Counter Strike:Global Offensive</a></td>
                <td style="background-image:url('../pics/evpubg2.png');"><a href="<?php echo generateFilterLink($statusSelected, "Players Unknown Battle Ground"); ?>">Players Unknown Battle Ground</a></td>
              </tr>
        </table>

        </div>
            <div class="comps">
              <div class="scroll-bg">
                <div class="scroll-div">
                  <div class="scroll-obj">
                    
                  <?php 
              
                    $result = getGames($statusSelected, $gameSelected);
                    $resultCount = 0;
                  
                  ?>
                  <?php while($row = $result->fetch_array()){ ?>
                    <ul>
                  
                      <li>
                      Games: <?php echo $row['Games'];?> 
                      <br>Start date: <?php echo $row['StartDate'];?>
                      <br>Deadline Of Registration: <?php echo $row['DateOfRegistration'];?>
                      <br>Fee: <?php echo $row['Fee'];?>
                      <br>Team Member: <?php echo $row['TeamMember'];?>
                      <br>Event Details: <?php echo $row['EventDetails'];?>

                      <?php if(!empty($_SESSION)) {
                              if($_SESSION['userType'] == 1){
                                if($row['Status'] == "Up coming") { ?>
                                
                                  <?php if($row['Games'] == "League Of Legends") { ?>
                                  <br><a href="register_lol.php?eventSelected=<?php echo $row['event_id']; ?>" style="color:white;"><strong>REGISTER NOW</strong></a>           
                                  <?php }elseif($row['Games'] == "Dota 2") { ?>

                                  <br><a href="register_dota.php?eventSelected=<?php echo $row['event_id']; ?>" style="color:white;"><strong>REGISTER NOW</strong></a>         
                                  <?php }elseif($row['Games'] == "Players Unknown Battle Ground") {  ?>

                                  <br><a href="register_pubg.php?eventSelected=<?php echo $row['event_id']; ?>" style="color:white;"><strong>REGISTER NOW</strong></a>           
                                  <?php }elseif($row['Games'] == "Counter Strike Global Offensive") { ?>

                                  <br><a href="register_csgo.php?eventSelected=<?php echo $row['event_id']; ?>" style="color:white;"><strong>REGISTER NOW</strong></a>           
                                  <?php } ?> 
                                  </li>
                                  </ul>
                    <?php }?>     
                    </li>
                    </ul>
                    <?php }else{?>
              
                    <?php }}else{ ?>
                      <br><a href="userlogin.php" style="color:white;" onclick="myFunction()"><strong>REGISTER/LOG IN TO KNOW MORE</strong></a>
                    </li>
                    </ul>
                    <?php 
                    } // loop end here
                        $resultCount = $result->num_rows;
                    }
                    ?> 
                  </div>
                </div>
              </div>
            </div>
          
          <p class="record" 
          style="color:white;
          letter-spacing:3px;
          width:50%;
          text-align: center;">
          <?php echo $resultCount; ?> records(s) returned.</p>

  </div>
</div>

</body>
<?php
  include('footer.php');
?>
</html>