<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'esportdb');

    function dbconnection()
    {
        return new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    //check connection
    function checkGames($events)
    {
        $dbcon = dbconnection();

        if($dbcon->connect_error)
        {
            die("Connection failed" . mysqli_connect_error());
        }

        echo "Connected successfully";
    }

    function closeDbConnection($connection)
    {
        $connection ->close();
    }

?>