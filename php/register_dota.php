<!DOCTYPE html>

<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registerdota.css">
    <title >DOTA2 Registration</title>
    <link href="../pics/logo.ico" rel="icon"/>
    
</head>
<?php $pageTitle = "Events"; ?>
<?php include("header.php"); ?> 


<body>
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3 class="animate-charcter">DOTA2 REGISTRATION</h3>
    </div>
  </div>
</div>
        </form>
        </div>

        <?php 
        $eventSelected = (isset($_GET['eventSelected'])) ? $_GET['eventSelected'] : NULL; 
        ?>
   
        <form id="formdota" action="registration_result.php" method="post" style="text-align:center;">
        <input type="hidden" name="event_id" value="<?php echo $eventSelected; ?>">
            <table cellspacing="0" cellpadding="10" style="margin: 0 auto;">
            <tr>
                     <td>
                        Team Name:
                    </td> 
                    <td>
                         <input type="text"  name="teamName" placeholder="Team Name" maxlength="300" required/>
                    </td>
              </tr>
              <tr>
                     <td style="vertical-align:top;">
                        Member Names:
                        
                    </td> 
                    <td>
                         <input type="text" name="memberName1" id="memberName" value="<?php echo $_SESSION["username"]; ?>" maxlength="300" />
                         <input type="text"  name="memberName2" id="memberName" placeholder="Member Name2" maxlength="300" required/>
                         <input type="text"  name="memberName3" id="memberName" placeholder="Member Name3" maxlength="300" required/>
                         <input type="text"  name="memberName4" id="memberName" placeholder="Member Name4" maxlength="300" required/>
                         <input type="text"  name="memberName5" id="memberName" placeholder="Member Name5" maxlength="300" required/>
                    </td>
              </tr>
              

                    </td>
              </tr>
              <tr>
                     <td>
                        Email:
                    </td> 
                    <td>
                         <input type="text"  name="email" maxlength="300" placeholder="username@gmail.com" value="<?php echo $_SESSION["userEmail"]; ?>" required/>
                    </td>
              </tr>
             
              
                <tr>
                    <td>
                        NRIC:
                    </td>
                    <td>
                    <input type="text" name="ic" value="<?php echo $_SESSION["userIc"]; ?>" placeholder="990104-07-5555" required>
		            
                    </td>
                </tr>
              <tr>
                     <td>
                       Phone Number:
                    </td> 
                    <td>
                    <input type="text"  name="phone" value="<?php echo $_SESSION["phoneNo"]; ?>" placeholder="012-1234567"maxlength="300" required/>
                    </td>
              </tr>
            
              </tr>
              <tr>
                    <td colspan="2">
                       <input style="background-color:black;  font-size:20px;" type="submit" name="submit" value="submit" />
                       <input style="background-color:black;  font-size:20px;" type="reset" name="reset" value="reset" />
                    </td>
              </tr>
            </table>



         </form>
         <?php include("footer.php"); ?> 
</body>
</html> 