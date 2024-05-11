<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pariticipants details</title>
</head>
<body>
<?php 
    $details = isset($_GET['participationDetails']) ? $_GET['participationDetails'] : "";
    $sortBy = (isset($_GET['sortBy'])) ? $_GET['sortBy'] : "";

    function getParticipationDetails()
        {
            $dbconnection = dbconnection();
            $sql = "SELECT username, teamId, teamName, Member1, Member2, Member3, 
            Member4, Member5, Email, NRIC, Phone, Status
            FROM participation P JOIN users U ON P.userId = U.userId";
            $result2 = $dbconnection->query($sql);
            $dbconnection->close();
            return $result2;
        }

    function getAllParticipationInfo()
        {
            $dbconnection = dbconnection();
            $sql = "SELECT E.Games, U.username, P.teamName, P.teamId, E.Status
            FROM events E JOIN participation P 
            ON E.event_id = P.event_id
            JOIN users U
            ON P.userId = U.userId";
            $result = $dbconnection->query($sql);
            $dbconnection->close();
            return $result;
        }

    ?>
</body>
</html>