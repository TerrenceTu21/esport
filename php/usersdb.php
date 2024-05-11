<?php 

function getTeamId($teamId)
{
    $dbConnection = dbconnection();
    $sql = "SELECT * FROM participation
    WHERE teamId = $teamId";
    $result = $dbConnection->query($sql)->fetch_assoc();
    $dbConnection->close();
    return $result;
}

function updateUser($teamId, $teamName, $member1, $member2, $member3, $member4, $member5, $phoneNo, $email,$NRIC)
{
    $dbConnection = dbconnection();
    $sql = "UPDATE participation SET teamName = ?, Member1 = ?, Member2 = ?, Member3 = ?,
    Member4 = ?, Member5 = ?, Email = ?, Phone = ?, NRIC = ?
    WHERE teamId = ?";
    $statement = $dbConnection->prepare($sql);
    $statement->bind_param("sssssssssi", $teamName, $member1, $member2, $member3, $member4, $member5, $email, $phoneNo,$NRIC, $teamId);
    $statement->execute();
    closeDbConnection($dbConnection);
}

function getEventName($eventID){
    $dbConnection = dbconnection();
    $sql = "SELECT Games FROM events WHERE event_id = $eventID";
    $row = $dbConnection->query($sql)->fetch_assoc();
    closeDbConnection($dbConnection);
    return $row['Games'];
}

function getUsersEvent($status=NULL, $userID=NULL)
{
    $dbconnection = dbconnection();
    $sql = "SELECT Games, Status, teamId, teamName,
    username,Member1,Member2, Member3, Member4, Member5, StartDate
    FROM events E JOIN participation P 
    ON E.event_id = P.event_id
    JOIN users U
    On P.userId = U.userId
    WHERE P.userId = ?";
    $params = array($userID);

    if ($status != NULL) {
        $sql .= " AND Status = ?";
        $params[] = $status;
    }

    $statement = $dbconnection->prepare($sql);
    $types = str_repeat('s', count($params)); // assuming all params are strings
    $statement->bind_param($types, ...$params);
    $statement->execute();
    $result = $statement->get_result();
    return $result;
}

function generateFilterEvents($status)
    {
        $filter = "?status=$status";
        return $filter;
    }
?>