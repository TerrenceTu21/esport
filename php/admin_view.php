<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_view.css">
    <title>ADMIN VIEW</title>
    <?php include('header.php'); ?>
</head>
<body>
<div class="wrapper">
        <h1>VIEW EVENT</h1>
</div>

<div class="heads">
  <ul>
    <?php 
    $statusSelected = (isset($_GET['statusSelected'])) ? $_GET['statusSelected'] : "ALL";

      function generateFilterLink($statusSelected)
      {
          $eventsFiltering = "?statusSelected=$statusSelected";
          return $eventsFiltering;
      }

      function getGames($status = NULL)
        {
        $dbConnection = dbconnection();
        $sql = "SELECT * FROM events ";
        if($status != "ALL")
        {
          $sql .= "WHERE Status = '$status'";
        }
        $output = $dbConnection->query($sql);
        closeDbConnection($dbConnection);
        return $output;
        }
      
    ?>
    
        <li><a href="<?php echo generateFilterLink("ALL"); ?>">[-All-]</a></li>   
        <li><a href="<?php echo generateFilterLink("On going"); ?>">[-On Going-]</a></li> 
        <li><a href="<?php echo generateFilterLink("Up coming"); ?>">[-Up Coming-]</a></li> 
        <li><a href="<?php echo generateFilterLink("Past tournaments"); ?>">[-Past Tournaments-]</a></li>
        
  </ul>
</div>

    <div  id="viewevent">

    <?php 
    $result = getGames($statusSelected);
    $resultCount = 0;
    ?>

<div class="comps">
  <div class="scroll-bg">
    <div class="scroll-div">
      <div class="scroll-obj">
          <?php while($row = $result->fetch_array()){ ?>
          <ul style="list-style-type:none;">
            <li class="body">
            Games: <?php echo $row['Games'];?>
            <br>Start date: <?php echo $row['StartDate'];?>
            <br>Date Of Registration: <?php echo $row['DateOfRegistration'];?>
            <br>Fee: <?php echo $row['Fee'];?>
            <br>Team Member: <?php echo $row['TeamMember'];?>
            <br>Event Details: <?php echo $row['EventDetails'];?>
            <br>Status: <?php echo $row['Status'];?>
            <br><a href="admin_edit.php?eventId=<?php echo$row['event_id']; ?>" class="btnED">Edit</a>
            <a href="admin_delete.php?eventId=<?php echo$row['event_id'];?>" class="btnED">Delete</a>
          </ul>
          <hr>
          <?php }   $resultCount = $result->num_rows; //loop end?>
          </div>
        </div>
    </div>
  </div>
</div>
<li style='color:white; list-style-type:none; font-size:30px;'><?php echo $resultCount; ?> records(s) returned.</li><br><br>
</body>
<?php include('footer.php'); ?>
</html>