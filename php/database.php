<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'esportdb');

function dbconnection()
{
    return new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}


function closeDbConnection($connection)
{
    $connection ->close();
}

include_once("inquiry_helper.php");
?>