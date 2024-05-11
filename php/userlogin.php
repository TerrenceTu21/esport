
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userlogin.css">
    <link href="../pics/logo.ico" rel="icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User Login</title>
</head>
<body>
<script>
    function popUp() {
        alert("Log in successfully");
    }

    function validation()
    {
        alert("Invalid inputs.");
    }
</script>
<?php include('header.php'); ?>
<?php 
//validation for log in email and password
function userVerification($userEmail, $userPassword)
{
    $dbConnection = dbconnection();
    $sql = "SELECT * FROM users WHERE userEmail = ? && userPassword = ?";
    $statement = $dbConnection->prepare($sql);
    $statement->bind_param("ss", $userEmail, $userPassword);
    $statement->execute();
    $row = $statement->get_result()->fetch_array();
    $dbConnection->close();

    if(is_array($row))
    {
        $_SESSION["userEmail"] = $row["userEmail"];
        $_SESSION["userPassword"] = $row["userPassword"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["userId"] = $row["userId"];
        $_SESSION["userIc"] = $row["userIc"];
        $_SESSION["phoneNo"] = $row["phoneNo"];
        $_SESSION["userType"] = 1;

        header("Location: games.php");
       
    }else{
        echo "<h3 style='text-align:center; font-size:20px;'>Invalid input!</h3>";
    }
}

if(isset($_POST['login']))
{
    $userEmail = $_POST['emailLogin'];
    $userPassword = $_POST['passwordLogin'];

    userVerification($userEmail, $userPassword);
}
?>

<form method="post">
        
                <div class="grid-container">
                    <div id="user_register" class="grid-item">
                        </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
                        <a class="user_registerbutton" href="user_register.php" role="button">REGISTER</a>
                    </div>
                    <div id="user_login" class="grid-item">
                    </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
                        <label for="email" >Email:</label>
                        <div class="input-group form-icon form-icon-email">
                            <i class="fa fa-envelope icon"></i>
                            <input type="email" name="emailLogin" placeholder="hehe@gmail.com" required>     
                        </div>
                        <label for="pwrd" >Password:</label>
                        <div class="input-group form-icon form-icon-email">
                            <i class="fa fa-key icon"></i>
                            <input type="password" name="passwordLogin" placeholder="*******" required>     
                        </div>
                        <button type="submit class="user_loginbutton" href="userlogin.php" name="login">Login</button>                
                    </div>
 
                </div>
</form>
</body>
</html>