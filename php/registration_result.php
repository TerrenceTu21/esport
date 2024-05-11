<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELC E-sport Tournament 2022</title>
    <link href="../pics/logo.ico" rel="icon"/>
    <style>
            html{
                background-color:black;

            }  
            body{
                color:white;
                margin:0 auto;
                width: 30%;
                border: 3px solid #73AD21;
                border-radius:10px;
                padding: 20px;
                margin-top:200px;
            }
            a{
                color:white;
            }
            a:hover{
                color:red;
            }

    </style>
</head>
<body>
        <?php 

        $teamName = $phone = $ic ="Default";

        function addErrorMessage($message){
            $GLOBALS['errorFlag'] = 1;
            array_push($GLOBALS['errorMessageArray'],$message);
        }
        
        
        if(isset($_POST['submit'])){
            $errorFlag = 0;
            $errorMessageList = array();
            $userId = $_SESSION['userId'];
            $event_id = (int) $_POST['event_id'];
            $teamName = $_POST['teamName'];
            $memberName1 = $_POST['memberName1'];
            $memberName2 = $_POST['memberName2'];
            $memberName3 = $_POST['memberName3'];
            $memberName4 = $_POST['memberName4'];
            $memberName5 = isset($_POST['memberName5']) ? $_POST['memberName5'] : "-";
            $phone = $_POST['phone'];
            $ic = $_POST['ic'];
            $email = $_POST['email'];
            //Gender Checking

            if(empty($teamName)){
                $errorFlag = 1;
                array_push($errorMessageList, "Please enter your name.");
            }
            if(strlen($teamName)>30){
                $errorFlag = 1;
                array_push($errorMessageList, "Name cannot more than 30 characters.");
            }

            if(empty($memberName1)){
                $errorFlag = 1;
                array_push($errorMessageList, "Please enter your name.");
            }
            if(strlen($memberName1)>30){
                $errorFlag = 1;
                array_push($errorMessageList, "Name cannot more than 30 characters.");
            }

            if(empty($memberName2)){
                $errorFlag = 1;
                array_push($errorMessageList, "Please enter your name.");
            }
            if(strlen($memberName2)>30){
                $errorFlag = 1;
                array_push($errorMessageList, "Name cannot more than 30 characters.");
            }

            if(empty($memberName3)){
                $errorFlag = 1;
                array_push($errorMessageList, "Please enter your name.");
            }
            if(strlen($memberName3)>30){
                $errorFlag = 1;
                array_push($errorMessageList, "Name cannot more than 30 characters.");
            }

            if(empty($memberName4)){
                $errorFlag = 1;
                array_push($errorMessageList, "Please enter your name.");
            }
            if(strlen($memberName4)>30){
                $errorFlag = 1;
                array_push($errorMessageList, "Name cannot more than 30 characters.");
            }

            if(empty($memberName5)){
                $errorFlag = 1;
                array_push($errorMessageList, "Please enter your name.");
            }
            if(strlen($memberName5)>30){
                $errorFlag = 1;
                array_push($errorMessageList, "Name cannot more than 30 characters.");
            }
            if(empty($email)){
                $errorFlag = 1;
                array_push($errorMessageList, "Email cannot be empty!");
            }
            if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email)){
                $errorFlag = 1;
                array_push($errorMessageList, "Please enter the correct email!");

            if(empty($phone)){
                $errorFlag = 1;
                array_push($errorMessageList, "Please enter your mobile phone number.");
            }
            if(empty($ic)){
                $errorFlag = 1;
                array_push($errorMessageList, "Please enter your IC number.");
            }
           

            //Mobile number(regex check)
            if(!preg_match("/^01\d{1}-\d{7}$/",$phone)){
                $errorFlag = 1;
                array_push($errorMessageList, "Phone number must follow format 01X-XXXXXXX.");
            }

            if(!preg_match("/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/",$ic)){
                $errorFlag = 1;
                array_push($errorMessageList, "IC number must follow format 123456-XX-XXXX.");
            }
            // print_r($tournamentName);
        }
  
        ?>

        <?php if ($errorFlag){?>

            <h1 style="margin-top:-10px;">Input errors!</h1>

            <ul style="color:red; list-style-type:none;">
                <?php 
                foreach($errorMessageList as $error){
                    echo "<li>". $error . "</li>";
                    
                }
                ?>
                
            </ul>
         <?php }else{ ?>
        <?php
        if(!$errorFlag){
            
                include("registrationhelper.php");
                createParticipation($userId, $event_id, $teamName, $memberName1, $memberName2, $memberName3, $memberName4, $memberName5, $email, $ic, $phone);
            }
            
        ?>
             <!-- NO ERROR FLAG , JUST PROCEED -->

        <h1>Thanks for registering</h1>

        <strong>
            
            <?php 
            echo $teamName . " Team";
            ?>
        </strong>
        <br/>
        You have joined the tournaments successfully!!
        <br/>
        <?php  } ?>
       [<a href='javascript:history.back()'> Back To Register</a>];
       [<a href="userevents.php">My events</a>];
</body>
</html>
<?php

        }

?>