<?php 
    include('helper.php');
    function createComp($games, $date, $dateOfRegistration, $fee, $teamMember, $eventDetails, $status)
    {
        $dbConnection = dbconnection();
        if ($dbConnection->connect_error) {
            die("Connection failed: " . $dbConnection->connect_error);
            }
        $sql = "INSERT INTO events(Games, StartDate, DateOfRegistration, Fee, TeamMember, EventDetails, Status) VALUES (?,?,?,?,?,?,?)";
        $statement = $dbConnection->prepare($sql);
        $statement->bind_param("sssiiss", $games, $date, $dateOfRegistration, $fee, $teamMember, $eventDetails, $status);
        $statement->execute();
        closeDbConnection($dbConnection);
    }

    function listGames()
    {
    $dbConnection = dbconnection();
    $sql = "SELECT * FROM events ";

    $result = $dbConnection->query($sql);
    closeDbConnection($dbConnection);
    return $result;
    }
 
    function getTheGames($games){
    
        /*
            SELECT * FROM events WHERE games = ?
        */
        $dbConnection = dbconnection();
        $sql = "SELECT * FROM events WHERE event_id = ?";
        $statement = $dbConnection->prepare($sql);
        $statement->bind_param("i",$games);
        $statement->execute();
        $result = $statement->get_result();
    
        if($result->num_rows < 1)
            return 0;
    
        return $result->fetch_assoc();
    }

    function updateEvents($eventId, $games, $date, $dateOfRegistration, $fee, $teamMember, $eventDetails, $status)
    {

        $dbConnection = dbconnection();
        $sql = "UPDATE events SET StartDate = ?, DateOfRegistration = ?, Fee = ?, TeamMember = ?, EventDetails = ?, Status = ? WHERE event_id = ?";
        $statement = $dbConnection->prepare($sql);
        $statement->bind_param("ssiissi", $date, $dateOfRegistration, $fee, $teamMember, $eventDetails, $status, $eventId);
        $statement->execute();
        closeDbConnection($dbConnection);
       

    }

    function deleteEvents($games){
        /*
            DELETE FROM student WHERE studentId = ?
        */
        //Conenct to database
        $dbConnection = dbconnection();
        //Delete event in 'participant' table
        $sql = "DELETE FROM participation WHERE event_id = ?";
        $statement = $dbConnection->prepare($sql);
        $statement->bind_param("i",$games);
        $statement->execute();

        //Delete event in 'events' table
        $sql = "DELETE FROM events WHERE event_id = ?";
        $statement = $dbConnection->prepare($sql);
        $statement->bind_param("i",$games);
        $statement->execute();
        //CLose database connection
        closeDbConnection($dbConnection);
    }
        
    ?>