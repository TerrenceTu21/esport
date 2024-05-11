<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head class="headDesign">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/header.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="../pics/logo.ico" rel="icon"/>
    
</head>
<?php include('eventshelperdb.php')?>
<?php include('viewdetailsdb.php')?>
<?php include('inquiry_helper.php') ?>  
   
</script>
<body>
    <nav>
    <div class="topic">
        <h4>
            <a href="index.php">Esport Championship league 2023</a>
        </h4>
    </div>

    <div>
        <ul class="header" id="menuList">   
            <?php 
            if(empty($_SESSION))
            {
                echo "<li><a href = 'games.php' class='list'>Games</a></li>";
                echo "<li><a href = 'events.php' class='list'>Events</a></li>";
                echo "<li><a href = 'aboutus.php' class='list'>About us</a></li>";
                echo "<a href='javascript:void(0);' class='icon' onclick='myFunction()'>
                        <i class='fa fa-bars'></i>
                    </a>";
            }
            
            ?>
            <?php 
                if(!empty($_SESSION)){
                    if($_SESSION['userType'] == 0){//admin
                        echo "<li style='width:120px;'><a href = 'admin_add.php' class='list'>Add events</a></li>";
                        echo "<li style='width:120px;'><a href = 'admin_view.php' class='list'>View events</a></li>";
                        
                        echo "<li style='width:120px;'><a href = 'list-enquiry.php' class='list'>Enquiries</a></li>";
                        echo "<li style='color:white; width:60%; text-align:center;' class='list'>Welcome Admin: " . $_SESSION['username'] . "</li>";
                        echo "<li><a href = 'logout.php'>Log out</a> ";
                        echo "<a href='javascript:void(0);' class='icon' onclick='myFunction()'>
                            <i class='fa fa-bars'></i>
                                </a>";
                    }

                    elseif($_SESSION['userType'] == 1){//user
                        echo "<li><a href = 'games.php'>Games</a></li>";
                        echo "<li><a href = 'events.php'>Events</a></li>";
                        echo "<li><a href = 'userevents.php'> My Events/Details</a> "; 
                        echo "<li style='color:white; width:60%; text-align:center; padding-top:15px;'>Welcome, " . $_SESSION['username'] . "</li>";
                        echo "<li><a href = 'logout.php'>Log out</a> ";    
                        echo "<a href='javascript:void(0);' class='icon' onclick='myFunction()'>
                            <i class='fa fa-bars'></i>
                            </a>";                  
                    }
                }
                else{
                
                    echo "<li><a href = 'userlogin.php' class='list'>Login</a></li>";  
                    echo "<li><a href = 'admin_login.php' class='list'>Admin</a></li>";               
                }
                
            ?>
            
        </ul>   
    </div>
    </nav>
</body>
</html>