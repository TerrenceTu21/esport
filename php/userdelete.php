<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userdelete.css">
    <title>User Delete</title>
    <?php include('header.php');?>
</head>
<body>
        <div class="heading">
             <span class="fast-flicker">mem</span>ber<span class="flicker"> de</span>le<span class="flicker">te</span>
          </div>

<?php 
    $teamId =(isset($_GET['teamId'])? $_GET['teamId']: "");
    $users= getTheTeams($teamId);

    function getTheTeams($teamId)
    {
        // $dbConnection = dbconnection();
        // $sql = "SELECT * FROM participation WHERE teamId = ?";
        // $statement = $dbConnection->prepare($sql);
        // $statement->bind_param("i",$teamId,);
        // $statement->execute();
        // $result = $statement->get_result();
    
        // if($result->num_rows < 1)
        //     return 0;
    
        // return $result->fetch_assoc();

        $dbConnection = dbconnection();
        $sql = "SELECT Games, teamName, teamId, 
        username, Member2, Member3, Member3, Member4, Member5, StartDate
        FROM events E JOIN participation P 
        ON E.event_id = P.event_id
        JOIN users U
        On P.userId = U.userId
        WHERE teamId =? ";
        $statement = $dbConnection->prepare($sql);
        $statement->bind_param("i",$teamId);
        $statement->execute();
        $result = $statement->get_result();
            
        if($result->num_rows < 1)
        return 0;
            
        return $result->fetch_assoc();
    }

    $event_id = $users['Games']; 
    $teamName = $users['teamName'];
    $startDate = $users['StartDate'];
    $username = $users['username'];
    $member2 = $users['Member2'];
    $member3 = $users['Member3'];
    $member4 = $users['Member4'];
    $member5 = $users['Member5'];
    
    if(!empty($_POST)){
        $teamToDelete = isset($_POST['teamId']) ? $_POST['teamId'] : "";
        deleteTeam($teamToDelete);
        header("Location:userevents.php");
    }

function deleteTeam($teamToDelete){
    $dbConnection = dbconnection();
    $sql = "DELETE FROM participation WHERE teamId = ?";
    $statement = $dbConnection->prepare($sql);
    $statement->bind_param("i",$teamToDelete);
    $statement->execute();
    closeDbConnection($dbConnection);
}

if(empty($_POST)){


?>

<table cellspacing="0" cellpadding="10" style="margin: 0 auto;">
<tr>
    <td>
        Games
    </td>
    <td>
        : <?php echo $event_id; ?>
    </td>
</tr>
<tr>
    <td>
        Team Name
    </td>
    <td>
        : <?php echo $teamName; ?>
    </td>
</tr>
<tr>
    <td>
        Start Date
    </td>
    <td>
        : <?php echo $startDate; ?>
    </td>
</tr>
<tr>
    <td>
        Members name:<br>
        1. <?php echo $username; ?><br>
        2. <?php echo $member2; ?><br>
        3. <?php echo $member3; ?><br>
        4. <?php echo $member4; ?><br>
        5. <?php echo $member5; ?><br>
    </td>
</tr>
<form id="formDeleteParticipation" method="post">
<tr>
        <td colspan="3">
            <input type="hidden" name="teamId" value="<?php echo $teamId?>" />
            </br><input type="submit" name="submit" value="Delete" />
            <input type="button" value="Cancel" onclick="location='userevents.php'" />
        </td>
    </tr>
</form>
</table>

<?php } ?>
</body>
</html>