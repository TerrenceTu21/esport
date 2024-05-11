<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_login.css">
    <link href="../pics/logo.ico" rel="icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Login</title>
</head>
<body>    
<?php include('header.php'); ?>
    <?php 
    function adminVerification($adminId, $adminPass)
    {
        $dbConnection = dbconnection();
        $sql = "SELECT * FROM users WHERE username = ? AND userPassword = ? AND usersType = 'admin'";
        $statement = $dbConnection->prepare($sql);
        $statement->bind_param("ss", $adminId, $adminPass);
        $statement->execute();
        $row = $statement->get_result()->fetch_array();
        $dbConnection->close();

        if(is_array($row))
        {
            $_SESSION["username"] = $row["username"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["userType"] = 0;
            header("Location: index.php");
           
        } else{
            echo "<div class='errorMsg'>WRONG User Name or Password,Please try again!</div>";
        }

    }

    if(isset($_POST['login']))
    {
        $adminId = $_POST['adminlogin'];
        $adminPass = $_POST['adminPassword'];


        adminVerification($adminId, $adminPass);
    }
    ?>
        <div class="wrapper">
               <h1>ADMIN LOGIN</h1>
            </div>
        <form class="adminlogin" style="max-width:500px;" method="POST">
            
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input class="input-field" type="text" placeholder="Username" name="adminlogin">
                </div>
                
                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input class="input-field" type="password" placeholder="Password" name="adminPassword">
                </div>

                <button type="submit" class="btn" name="login">Login</button>
        </form>
       
</body>
</html>