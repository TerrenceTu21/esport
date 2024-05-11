<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_edit.css">
    <link href="../pics/logo.ico" rel="icon"/>

    <title>ADMIN EDIT</title>
</head>
<?php include('header.php');?>
<script>
function myFunction() {
  alert("Successfully updated!");
}
</script>
<body>

<?php 
        $games = (isset($_GET['eventId']) ? $_GET['eventId']: "");
        $events = getTheGames($games);

        $gameName = $events['Games'];
        $startDate = $events['StartDate'];
        $dateOfRegistration = $events['DateOfRegistration'];
        $fee = $events['Fee'];
        $teamMember = $events['TeamMember'];
        $eventDetails = $events['EventDetails'];
        $status= $events['Status'];
        $eventId = $events['event_id'];

        $eventStatus = "error";
        $errorFlag = 0;
        $errorMessageArray = array();

        function addErrorMessage($message)
        {
            $GLOBALS['errorFlag'] = 1;
            array_push($GLOBALS, ['errorMessageArray'], $message);
        }

        $eventAdditions = "edit";
        include_once("addEventsValidations.php");
?>
    <div class="wrapper">
               <h1>EDIT EVENT</h1>
    </div>

<form id="formEditEvent" method="post">
    <table cellspacing="0" cellpadding="10" style="margin: 0 auto;">
    <tr>
        <td style="color:white; margin-top: 50px; font-size: 30px">Event id:</td>
        <td style="color:white; margin-top: 50px; font-size: 30px"><?php echo $eventId; ?></td>
    </tr>
    <tr>
        <td style="color:white; margin-top: 50px; font-size: 30px">
            Games
        </td>
        <td style="color:white; margin-top: 30px; font-size: 30px">
            :<input style="font-size: 20px" type="text"  name="Games" value="<?php echo $gameName; ?>" maxlength="300"/>
        </td> 
    </tr>
    <tr>
        <td style="color:white; margin-top: 30px; font-size: 30px">
            Start Date:
        </td>
        <td>
            <input style="font-size: 20px" type="date"  name="StartDate" value="<?php echo $startDate; ?>" maxlength="300" required id="Date"/>
        </td>
    </tr>
    <tr>
        <td style="color:white; margin-top: 30px; font-size: 30px">
            Register Deadline: 
        </td>
        <td style="color:white; margin-top: 30px; font-size: 30px">
            <input style="font-size: 20px" type="date"  name="DateOfRegistration" value="<?php echo $dateOfRegistration; ?>" maxlength="300" required/>
        </td>
    </tr>
    <tr>
        <td style="color:white; margin-top: 30px; font-size: 30px">
            Fee:
        </td>
        <td style="color:white; margin-top: 30px; font-size: 30px">
            <input style="font-size: 20px" type="number"  min="1" step="any" name="Fee" value="<?php echo $fee; ?>" maxlength="300" required/>
        </td>
    </tr>
    <tr>
        <td style="color:white; margin-top: 30px; font-size: 30px">
            Team Member:
        </td>
        <td style="color:white; margin-top: 30px; font-size: 30px">
            <input style="font-size: 20px" type="number"  min="1" name="TeamMember"  value="<?php echo $teamMember; ?>" maxlength="300" required/>
        </td>
    </tr>
    <tr>
        <td style="color:white; margin-top: 30px; font-size: 30px">
            Event Details:
        </td>
        <td style="color:white; margin-top: 30px; font-size: 30px">
        <input style="font-size: 20px" type="text"  name="EventDetails"  value="<?php echo $eventDetails; ?>" maxlength="1000" required/>
        </td>
    </tr>
    <tr>
        <td style="color:white; margin-top: 30px; font-size: 30px">
            Status:
        </td> 
        <td>
            <select style="font-size: 20px" name="Status" required>
                <option value="-">-</option>
                <option value="On going" <?php if ($status=="On going"){ echo "selected='selected'"; } ?>>On going</option>
                <option value="Up coming" <?php if ($status=="Up coming"){ echo "selected='selected'"; } ?>>Up coming</option>
                <option value="Past tournaments" <?php if ($status=="Past tournaments"){ echo "selected='selected'"; } ?>>Past tournaments</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2">
        
        <input type="hidden" name="eventId" value="<?php echo $eventId; ?>" maxlength="30"/>
        </br><input class="btnUC" style="color:red; background: transparent; font-size: 25px; border: none; cursor:pointer;" type="submit" name="submit" value="Update" onclick="myFunction()">
        <input class="btnUC" style="color:red; background: transparent; margin-left: 20px; font-size: 25px; border: none; cursor:pointer;" type="button" value="Cancel" onclick="location='admin_view.php'" />
        </td>
    </tr>
    </table>
</form>


</body>
</html>