<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../pics/logo.ico" rel="icon"/>
    <title>User Registration</title>
</head>
<body>
<?php include('header.php'); ?>
                
        <?php 
            function userRegister($username, $userEmail, $userIc, $userPhoneNo, $userPassword)
            {
                $dbconnection = dbconnection();
                $sql = "INSERT INTO users(username, userEmail, userIc, phoneNo, userPassword, usersType) VALUES(?,?,?,?,?, 'user')";
                $statement = $dbconnection->prepare($sql);
                $statement->bind_param("sssss", $username, $userEmail, $userIc, $userPhoneNo, $userPassword);
                $statement->execute();
                closeDbConnection($dbconnection);
            }
            function checkDuplicateUserEmail($userEmail){           
                $dbConnection = dbconnection();
                $sql = "SELECT count(*) as count FROM users where userEmail = ?";
                $statement = $dbConnection->prepare($sql);
                $statement->bind_param("s",$userEmail);
                $statement->execute();
                $row = $statement->get_result()->fetch_array();
                closeDbConnection($dbConnection);
                
                if ($row['count'] > 0)
                    return true;
            
                return false;
            
            }
            $formSubmitStatus = "error";
            $errorFlag = 0;
            $errorMessageArray = array();

            $username = "";
            $userEmail = "";
            $userIc = "";
            $userPhoneNo = "";
            $userPassword = "";
            $comfirmPass = "";

            function addErrorMessage($message){
                $GLOBALS['errorFlag'] = 1;
                array_push($GLOBALS['errorMessageArray'],$message);
            }

            $usersRegister = "create";
          

            if(!empty($_POST)){
              


                $username = $_POST['accName'];
                $userEmail = $_POST['accEmail'];
                $userIc = $_POST['ic'];
                $userPhoneNo = $_POST['phone'];
                $userPassword = $_POST['accPass'];
                $comfirmPass = $_POST['comfirmPass'];
   
                if(empty($userEmail)){
                    addErrorMessage("Please enter your EMAIL.");
                }elseif(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$userEmail)){
                    addErrorMessage("Please enter the correct EMAIL!");
                }elseif(checkDuplicateUserEmail($userEmail)){
                    addErrorMessage("Duplicate User Email! Please use another Email!");
                }

                if(!preg_match("/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/", $userIc )){
                    addErrorMessage("Please enter the correct IC format!");
                }
                if(!preg_match("/^(\+?6?01)[02-46-9][-][0-9]{7}$|^(\+?6?01)[1][-][0-9]{8}$/", $userPhoneNo )){
                    addErrorMessage("Please enter the correct phone number format!");
                }
                if($userPassword <> $comfirmPass){
                    addErrorMessage("Please enter the same password for confirmation!");
                }
                

                if(!$errorFlag)
                {
                    if($usersRegister == "create" && $userPassword == $comfirmPass){
                        userRegister($username, $userEmail, $userIc, $userPhoneNo, $userPassword);
                        $formSubmitStatus = "success";  
                    }
                }
            }
        ?>
          <div class="notification <?php echo $formSubmitStatus; ?>">
        <?php if ($formSubmitStatus == "error"){?>
            <ul class="Messages" style="list-style-type:none;">
                <?php 
                    foreach($errorMessageArray as $error){ ?>
                    <li class="errorMessages"><?php echo $error; ?></li>
                <?php }?>
            </ul>
        <?php 
        }
        ?>

        <div class="grid-container">
                        <div id="user_login" class="grid-item">
                        
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <a class="user_loginbutton" href="userlogin.php" role="button">Login</a>
                        </div>
                <div id="user_register" class="grid-item">
                    <br><br><br><br><br><br><br><br><br><br>
                            <form action="" method="post">
                            <table cellspacing="0" cellpadding="10" style="margin: 0 auto;">
            <tr>
                     <td>
                     <i class="fa fa-user icon"></i>
                    </td> 
                    <td>
                         <input type="text"  name="accName" placeholder="Name" maxlength="30" required/>
                    </td>
              </tr>
              <tr>
                     <td>
                        <i class="fa fa-envelope icon"></i>
                    </td> 
                    <td>
                         <input type="email"  name="accEmail" maxlength="300" placeholder="username@gmail.com" required/>
                    </td>
              </tr>
             
              
                <tr>
                    <td>
                    <i class="fa fa-address-card"></i>
                    </td>
                    <td>
                    <input type="text" name="ic" placeholder="IC:990104-07-5555" required>
		            
                    </td>
                </tr>
              <tr>
                     <td>
                        <i class="fa fa-phone-square"></i>
                    </td> 
                    <td>
                    <input type="text"  name="phone" placeholder="012-1234567"maxlength="300" required/>
                    </td>
              </tr>
              <tr>
                     <td>
                     <i class="fa fa-lock"></i>
                    </td> 
                    <td>
                    <input type="password"  name="accPass" placeholder="******" maxlength="300" required/>
                    </td>
              </tr>
              <tr>
                     <td>
                     <i class="fa fa-lock"></i>
                    </td> 
                    <td>
                    <input type="password"  name="comfirmPass" placeholder=" Comfirm Password:" maxlength="300" required/>
                    </td>
              </tr>
              </tr>
              
              <tr>
              
                    <td colspan="2">
                    
                    <div id="agreement">
                        <input  type="checkbox" name="agree" required/>I agree to the <a href="privacy.php">PRIVACY POLICY</a> and <br><a href="termsconditions.php">TERMS & CONDITIONS</a>
                    </div>
                       <input class="registerBtn" style="background-color:#7DD5FA;  font-size:1.5vw;" type="submit" name="submit" value="Register" />
                    </td>
              </tr>
              
            </table>
           
         </form>
        </div>

    </div>
</body>
</html>