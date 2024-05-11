<?php 
  if(!empty($_POST)){
    if($eventAdditions == "edit")
    {
      $eventId = $_POST['eventId'];
    }
    $games = $_POST['Games'];
    $date = $_POST['StartDate'];
    $dateOfRegistration = $_POST['DateOfRegistration'];
    $fee = $_POST['Fee'];
    $teamMember = $_POST['TeamMember'];
    $eventDetails = $_POST['EventDetails'];
    $status = $_POST['Status'];

    if(!$errorFlag)
    {
      if($eventAdditions == "added")
      {
        createComp($games, $date, $dateOfRegistration, $fee, $teamMember, $eventDetails, $status);
      }

      if($eventAdditions == "edit")
      {
        updateEvents($eventId, $games, $date, $dateOfRegistration, $fee, $teamMember, $eventDetails, $status);
        header("Location:admin_view.php");
      }
    }

  }
?>