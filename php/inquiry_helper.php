<?php

function createReview($contactTitle,$contactUserName,$contactUserEmail,$inquiry){
    $dbConnection = dbconnection();
    //$sql = "INSERT INTO inquiry (Title, UserName, Email ,Inquiry) VALUES (?,?,?,?)";
    $statement = $dbConnection->prepare("INSERT INTO inquiry (Title, UserName, Email ,Inquiry) VALUES (?,?,?,?)");
    $statement->bind_param("ssss",$contactTitle,$contactUserName,$contactUserEmail,$inquiry);
    $statement->execute();
    closeDbConnection($dbConnection);
}


function listInquiry($sortBy="UserName",$sortOrder="Asc"){
    $dbConnection = dbconnection();
    $sql = "SELECT * FROM inquiry ";
    $sql .="ORDER BY $sortBy $sortOrder";   
    $result = $dbConnection->query($sql);
    closeDbConnection($dbConnection);
    return $result;
}
function getEnquiry($contactUserName){

    // SELECT * from student  WHERE studentid =?
    $dbConnection = dbconnection();
    $sql = "SELECT * FROM inquiry WHERE UserName = ?";
    $statement = $dbConnection->prepare($sql);
    $statement->bind_param("s",$contactUserName);
    $statement->execute();
    $result = $statement->get_result();

    if($result->num_rows < 1)
        return 0;//get out from this function 
    
        return $result->fetch_assoc(); 
}


function updateEnquiry($contactTitle,$contactUserName,$contactUserEmail,$inquiry){
     // UPDATE table SET colA = valA .. WHERE studentId = ? 
     $dbConnection = dbconnection();
    $sql = "UPDATE inquiry SET Title = ?, Email = ?, Inquiry = ? WHERE UserName = ?";
    $statement = $dbConnection->prepare($sql);
    $statement->bind_param("ssss",$contactTitle,$contactUserEmail,$inquiry,$contactUserName);
    $statement->execute();
    closeDbConnection($dbConnection);
}
function deleteEnquiry($contactUserName){
    /*DELETE FROM student WHERE studentId = ? */
    $dbConnection = dbconnection();
    $sql = "DELETE FROM inquiry WHERE UserName = ?";
    $statement = $dbConnection->prepare($sql);
    $statement->bind_param("s",$contactUserName);
    $statement->execute();
    closeDbConnection($dbConnection);


}

?>