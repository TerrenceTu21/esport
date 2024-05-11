<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Header</title>

    <style>
       *{
            margin:0px;
            padding: 0px;
            box-sizing:border-box;
        }

        .adminheader{
            background-color:black;
            text-align:center;
            display:flex;
            width:100%;
            padding:40px;
            letter-spacing:1px;
        }

        .adminheader a{
            color:red;
            text-decoration:none;
            font-size:2vw;
        }

        .adminheader li{
            width:200px;
            margin:0 auto;
            list-style-type:none;
            justify-content:space-around;
        }

        .adminheader a:hover{
            color:white;
            transition:0.5s;
        }
    </style>
</head>
<?php include('eventshelperdb.php'); ?>
<body>
<div>
        <ul class="adminheader">
            <li><a href = "index.php">Home</a></li> 
            <li><a href = "admin_view.php">View Event</a></li>
            <li><a href = "admin_add.php">Add Event</a></li>
            <!-- <li><a href = "admin_update.php">Update Event</a></li>   
            <li><a href = "admin_edit.php">Edit Event</a></li>   -->
            <li><a href = "logout.php">Log out</a> 
            | 
            Admin: 
        </ul>   
    </div>
</body>
</html>