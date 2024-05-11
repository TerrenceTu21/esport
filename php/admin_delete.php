<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_delete.css">
    <title>Admin delete</title>
</head>
<script>
function myFunction() {
  alert("Delete successfully!");
}
</script>
<body>
    <?php include('header.php');?>
    <div class="wrapper">
               <h1>DELETE EVENT</h1>
    </div>

    <?php 
        $games = (isset($_GET['eventId']) ? $_GET['eventId']: "");
        $events = getTheGames($games);

        $gameName = $events['Games'];
        $eventId = $events['eventId'];
        $startDate = $events['StartDate'];
        $dateOfRegistration = $events['DateOfRegistration'];
        $fee = $events['Fee'];
        $teamMember = $events['TeamMember'];
        $eventDetails = $events['EventDetails'];
        $status= $events['Status'];
        $eventId = $events['event_id'];
        
        if(!empty($_POST)){

            $eventToDelete = (int) $_POST['eventID'];
            deleteEvents($eventToDelete);
            header("Location:admin_view.php");
        }

        if(empty($_POST)){
    ?>
        <table cellspacing="0" cellpadding="10" style="margin: 0 auto;">
            <tr>
                <td style="color:white; margin-top: 50px; font-size: 30px">Event id:<?php echo $eventId; ?></td>
            </tr>
            <tr>
                <td style="color:white; margin-top: 50px; font-size: 30px">
                    Games
                </td>
                <td style="color:white; margin-top: 50px; font-size: 30px">
                    : <?php echo $gameName; ?>
                </td> 
            </tr>
            <tr>
                <td style="color:white; margin-top: 50px; font-size: 30px">
                    Start Date
                </td>
                <td style="color:white; margin-top: 30px; font-size: 30px">
                    : <?php echo $startDate; ?>
                </td>
            </tr>
            <tr>
                <td style="color:white; margin-top: 30px; font-size: 30px">
                    Register Deadline 
                </td>
                <td style="color:white; margin-top: 30px; font-size: 30px">
                        : <?php echo $dateOfRegistration; ?>
                </td>
            </tr>
            <tr>
                <td style="color:white; margin-top: 30px; font-size: 30px">
                    Fee
                </td>
                <td style="color:white; margin-top: 30px; font-size: 30px">
                    : <?php echo $fee; ?>
                </td>
            </tr>
            <tr>
                <td style="color:white; margin-top: 30px; font-size: 30px">
                    Team Member
                </td>
                <td style="color:white; margin-top: 30px; font-size: 30px">
                    : <?php echo $teamMember; ?>
                </td>
            </tr>
            <tr>
                <td style="color:white; margin-top: 30px; font-size: 30px">
                    Event Details
                </td>
                <td style="color:white; margin-top: 30px; font-size: 30px">
                    : <?php echo $eventDetails; ?>
                </td>
            </tr>
            <tr>
                <td style="color:white; margin-top: 30px; font-size: 30px">
                    Status
                </td> 
                <td style="color:white; margin-top: 30px; font-size: 30px">
                    : <?php echo $status; ?>
                </td>
            </tr>
    <form id="formDeleteEvent" method="post">
            <tr>
                <td colspan="3">
                    <input type="hidden" name="eventID" value="<?php echo $eventId; ?>"/>
                    </br><input style="color:red; background: transparent; font-size: 25px; border: none" type="submit" name="submit" value="Delete" onclick="myFunction()"/>
                    <input style="color:red; background: transparent; margin-left: 20px; font-size: 25px; border: none" type="button" value="Cancel" onclick="location='admin_view.php'" />
                </td>
            </tr>
    </form>
        </table>

<?php } ?>
</body>
</html>