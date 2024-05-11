<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/useredit.css">
    <title>Modifications</title>
    <?php include('header.php'); ?>
    <?php include('usersdb.php'); ?>
</head>
<body>
        <div class="heading">
             <span class="fast-flicker">me</span>mber<span class="flicker"> e</span>d<span class="flicker">it</span>
          </div>
    <?php 
    $teamId = (isset($_GET['teamId'])) ? $_GET['teamId'] : "";
    $editInformation = getTeamId($teamId);
    $Games = getEventName($editInformation['event_id']);
    $teamName = $editInformation['teamName'];
    $member1 = $editInformation['Member1'];
    $member2 = $editInformation['Member2'];
    $member3 = $editInformation['Member3'];
    $member4 = $editInformation['Member4'];
    $member5 = $editInformation['Member5'];
    $phoneNo = $editInformation['Phone'];
    $email = $editInformation['Email'];
    $NRIC = $editInformation['NRIC'];

    //When user click edit button
    if(isset($_POST['editInfo'])){
        //get info from POST
        $teamId = (int)$_POST['teamId'];
        $teamName = $_POST['teamName'];
        $member1 = $_POST['Member1'];
        $member2 = $_POST['Member2'];
        $member3 = $_POST['Member3'];
        $member4 = $_POST['Member4'];
        $member5 = $_POST['Member5'];
        $phone = $_POST['Phone'];
        $email = $_POST['Email'];
        $NRIC = $_POST['NRIC'];

        $errorFlag = 0;
        //Validation do here....
        if(!$errorFlag){
            updateUser($teamId, $teamName, $member1, $member2, $member3, $member4, $member5, $phone, $email, $NRIC);
        }
    }
    ?>
<div>
    <?php $row = getUsersEvent();?>
    <form method="post">
        <table>
            <input type="hidden" name="teamId" value="<?php echo $teamId; ?>">
            <tr>
                <td>Games:</td>
                <td><?php echo $Games;?></td>
            </tr>

            <tr>
                <td>Team name:</td>
                <td><input type="text" name="teamName" value="<?php echo $teamName; ?>"></td>
            </tr>
            <tr>
                <td>Member 1:</td>
                <td><input type="text" name="Member1" value="<?php echo $member1; ?>"></td>
            </tr>

            <tr>
                <td>Member 2:</td>
                <td><input type="text" name="Member2" value="<?php echo $member2; ?>"></td>
            </tr>

            <tr>
                <td>Member 3:</td>
                <td><input type="text" name="Member3" value="<?php echo $member3; ?>"></td>
            </tr>

            <tr>
                <td>Member 4:</td>
                <td><input type="text" name="Member4" value="<?php echo $member4; ?>"></td>
            </tr>

            <?php if($Games != "Players Unknown Battle Ground"){ ?>
            <tr>
                <td>Member 5:</td>
                <td><input type="text" name="Member5" value="<?php echo $member5; ?>"></td>
            </tr>
            <?php }else{echo '<input type="hidden" name="Member5" value="'.$member5.'"';} ?>

            <tr>
                <td>Phone No:</td>
                <td><input type="text" name="Phone" value="<?php echo $phoneNo; ?>"></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type="email" name="Email" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
                <td>NRIC:</td>
                <td><input type="text" name="NRIC" value="<?php echo $NRIC; ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="editInfo" onclick="return confirm('Are you sure to edit?');" value="Edit" />
                    [<a href="userevents.php"><strong style="color:white; text-decoration:none;">Back</strong></a>]
                </td>
            </tr>
        </table>
    </form>

</div>
    
</body>
</html>