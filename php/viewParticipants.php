<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants</title>
    <link href="../css/viewParticipants.css" rel="stylesheet" />
    <link href="../pics/logo.ico" rel="icon"/>
    <?php include('header.php'); ?> 
</head>
<body>
        <div class="heading">
             <span class="fast-flicker">vi</span>ew<span class="flicker"> Part</span>ici<span class="flicker">pants</span>
          </div>
    <form action="viewParticipants.php" method="get" class="searchstyle">
        <br><input type="text" name="search" placeholder="search username/events" 
        value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="searchArea"/>
        <input type="submit" value="Search" class="searchBtn"/><br><br>
    </form>
    <?php 
    $result = getAllParticipationInfo();
    $participation = getParticipationDetails();
    $resultCount = 0;
    $result2count = 0;

    $teamIdSelected = isset($_GET['teamIdSelected']) ? $_GET['teamIdSelected'] : NULL;
    if(!empty($teamIdSelected)){
        
        function getDetails($teamId){
            $dbConnection = dbconnection();
            $sql = "SELECT * FROM participation P
            JOIN users U ON P.userId = U.userId ";
            $sql .= "WHERE teamId = '$teamId';";
            $details = $dbConnection->query($sql);
            closeDbConnection($dbConnection);
            return $details;
        }
        
        
        ?>
    
        <style>
            .view-participants{
                display:none;
            }
        </style>
        <!-- continue -->
        <table class="detailed">
            <tr>
                <th>User name</th>
                <th>Team Name</th>
                <th>Member 1</th>
                <th>Member 2</th>
                <th>Member 3</th>
                <th>Member 4</th>
                <th>Member 5</th>
                <th>Email</th>
                <th>Number IC</th>
                <th>Phone number</th>
            </tr>
        <?php
        $moreDetailed = getDetails($teamIdSelected);

        while($row = $moreDetailed->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['teamName'];?></td>
                <td><?php echo $row['Member1'];?></td>
                <td><?php echo $row['Member2'];?></td>
                <td><?php echo $row['Member3'];?></td>
                <td><?php echo $row['Member4'];?></td>
                <td><?php echo $row['Member5'];?></td>
                <td><?php echo $row['Email'];?></td>
                <td><?php echo $row['NRIC'];?></td>
                <td><?php echo $row['Phone'];?></td>
            </tr>
            <tr>
                <td colspan="10" ><button onclick="history.back()">Go Back</button></td>
            </tr>
        <?php } ?>
        </table>
    <?php }
    
    ?>

    <table class="view-participants" method="get">
        <tr class="tableHeader">
            <th>User name</th>
            <th>Game</th>
            <th>Team name</th>
            <th>Status</th>
            <th>View details</th>
        </tr>
        <tr>

        <?php 
        
            if(isset($_GET['search']))
            {
                $con = mysqli_connect("localhost","root","","esportdb");
                $getnames = $_GET['search'];
                $query = "SELECT Games,username,teamName, teamId, Status
                FROM events E JOIN participation P 
                ON E.event_id = P.event_id
                JOIN users U
                On P.userId = U.userId
                WHERE CONCAT(username) LIKE '$getnames%' 
                OR 
                CONCAT(Games) LIKE '$getnames%'";
                
                $query_run = mysqli_query($con, $query);
    
                if(mysqli_num_rows($query_run) > 0)
                {   
                    foreach($query_run as $userdetails)
                    {
                        ?>
                        <tr>
                            <td><?= $userdetails['username']; ?></td>
                            <td><?= $userdetails['Games']; ?></td>
                            <td><?= $userdetails['teamName']; ?></td>
                            <td><?= $userdetails['Status']; ?></td>
                            <td><a href="<?php echo '?teamIdSelected='.$userdetails['teamId']; ?>">View Detail</a></td>
                            
                        </tr>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <tr>
                            <td colspan="4">No Record Found</td>
                        </tr>
                    <?php
                }
            }else{ while($row = $result->fetch_array()){?>
            <tr class="tableData">
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['Games'];?></td>
                <td><?php echo $row['teamName'];?></td>
                <td><?php echo $row['Status'];?></td>
                <td><a href="<?php echo '?teamIdSelected='.$row['teamId']; ?>" class="viewDtlwLk">View Detail</a></td>
            </tr>
            <?php 
            $resultCount = $result->num_rows; ?>
            <?php }
        
            }?>
    </table>
    
</body>
</html>