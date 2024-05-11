<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_add.css">
    <link href="../pics/logo.ico" rel="icon"/>
    <title>Add Events</title>
</head>
<?php include('header.php');?>
<body>

    <?php 
        $eventStatus = "error";
        $errorFlag = 0;
        $errorMessageArray = array();

        function addErrorMessage($message)
        {
            $GLOBALS['errorFlag'] = 1;
            array_push($GLOBALS, ['errorMessageArray'], $message);
        }
    
        $eventAdditions = "added"; 
        include('addEventsValidations.php');

        function getEventsDetails()
        {
            $dbConnection = dbconnection();
            $sql = "SELECT * FROM events ";
            $result = $dbConnection->query($sql);
            closeDbConnection($dbConnection);
            return $result;
        }

        $games = isset($_GET['Games']) ? $_GET['Games'] : "";
    ?>
          <div class="wrapper">
               <h1>ADD EVENT</h1>
            </div>
            <form id="formevent" method="POST">
                <table cellspacing="0" cellpadding="10" style="margin: 0 auto;" class="form">
                    <tr>
                            <td>
                                Game Name*:
                            </td> 
                            <td>
                            <select name="Games" required>
                                <option value="-">-</option>
                                <option value="League Of Legends">League Of Legends</option>
                                <option value="Dota 2">Dota 2</option>
                                <option value="Players Unknown Battle Ground">Players Unknown Battle Ground</option>
                                <option value="Counter Strike Global Offensive">Counter Strike Global Offensive</option>
                            </select>
                            </td>
                    </tr>
                    <tr>
                            <td>
                                Start Date*:
                            </td> 
                            <td>
                                <input type="date"  name="StartDate"  maxlength="300" required id="Date"/>
                            </td>
                    </tr>
                    <tr>
                            <td>
                                Register Deadline*:
                            </td> 
                            <td>
                                <input type="date"  name="DateOfRegistration" maxlength="300" required/>
                            </td>
                     </tr>
                     <tr>
                            <td>
                                Fee*:
                            </td> 
                            <td>
                                <input type="number"  min="1" step="any" name="Fee"  maxlength="300" required/>
                            </td>
                      </tr>  
                      <tr>
                      <tr>
                            <td>
                                Team Member Required*:
                            </td> 
                           
                            <td>
                                <input type="number" name="TeamMember" maxlength="300" placeholder="5 / 4" />
                            </td>
                      </tr>  
                      <tr>
                            <td>
                                Event Details*:
                            </td> 
                            <td>
                                <input type="text"  name="EventDetails" placeholder="Please Provide Event Details" maxlength="1000" required/>
                            </td>
                      </tr>  

                      <tr>
                            <td>
                                Status*:
                            </td> 
                            <td>
                            <select name="Status" required>
                                <option value="-">-</option>
                                <option value="On going">On going</option>
                                <option value="Up coming">Up coming</option>
                                <option value="Past tournaments">Past tournaments</option>
                            </select>
                            </td>
                      </tr>  

                      <tr>
                        <td><input type="submit" name="submit" value="Insert"/></td>
                      </tr>

                </table>
            </form>

            <?php include("footer.php"); ?> 

</body>
</html>