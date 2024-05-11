<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/userevents.css" rel="stylesheet" /> 
    <title>Your events</title>
    <?php include('header.php'); ?>
    <?php include('usersdb.php'); ?>
</head>
<body>
<?php 
    $status = (isset($_GET['status'])) ? $_GET['status'] : NULL;

    $result = getUsersEvent($status, $_SESSION['userId']);
?>

<div class="filtering">
    <ul>
        <li ><a href="<?php echo generateFilterEvents(Null); ?>">All</a></li>
        <li ><a href="<?php echo generateFilterEvents("On going"); ?>">On Going</a></li>
        <li ><a href="<?php echo generateFilterEvents("Up coming"); ?>">Up coming</a></li>
        <li ><a href="<?php echo generateFilterEvents("Past tournaments"); ?>">My past tournaments</a></li>
    </ul>
</div>

<div class="eventsStyling">
<?php while($row = $result->fetch_array()){ ?>  
    <div class="userEvents">

    <?php if($row['Status'] == "Up coming") {?>
    <form action="useredit.php" method="get">
        <a href="useredit.php?teamId=<?php echo $row['teamId']; ?>" class="links"><strong >Edit information</strong></a>
        |
        <a href="userdelete.php?teamId=<?php echo $row['teamId']; ?>" class="links"><strong >Delete</strong></a>
    </form>
    <?php } ?>

        <?php if($row['username'] == $_SESSION['username']) {?>
               <div class="detail"> Status:<?php echo $row['Status'];?></div>
               <div class="detail"><br>Game:<?php echo $row['Games'];?></div>
               <div class="detail"><br>Team Name:<?php echo $row['teamName']?></div>
               <div class="detail"><br>Start date:<?php echo $row['StartDate']?></div>
            <br>
                <div class="detail">
            Members name:<br>
                1. <?php echo $row['Member1']?><br>
                2. <?php echo $row['Member2']?><br>
                3. <?php echo $row['Member3']?><br>
                4. <?php echo $row['Member4']?><br>
                5. <?php echo $row['Member5']?><br>
                </div>
        <?php }?>
    </div>
<?php }?>
</div>
</body>
</html>