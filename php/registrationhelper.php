<?php
 include("helper.php");
 
 function createParticipation($userId,$event_id,$teamName,$memberName1,$memberName2, $memberName3, $memberName4, $memberName5,$email,$ic,$phone){
    $dbConnection = dbconnection();
    $sql = "INSERT INTO participation(userId,event_id,teamName,Member1,Member2,Member3,Member4,Member5,Email,NRIC,Phone) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $statement = $dbConnection->prepare($sql);
    $statement->bind_param("iisssssssss",$userId,$event_id,$teamName,$memberName1,$memberName2, $memberName3, $memberName4, $memberName5,$email,$ic,$phone);
    $statement->execute();
    closeDbConnection($dbConnection);
  }


  function listParticipate($sortBy = "TeamName", $sortOrder="Asc", $teamName="All"){
    $dbConnection = dbconnection();
    $sql = "SELECT * FROM participation ";

    if($status <> "All")
    {
       // $sql .= "WHERE Games = '$games' ";
       $sql .= "WHERE TeamName = '$teamName' ";
    }

    $sql .= "ORDER BY $sortBy $sortOrder";

    $result = $dbConnection->query($sql);
    closeDbConnection($dbConnection);
    return $result;
  }

?>