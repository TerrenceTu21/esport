<?php include_once("header.php");?>

<link rel="stylesheet" href="../css/delete-enquiry.css">

<html>
    <body>
        <h1>Delete Enquiry</h1>

        <?php
        
        /*<?=$studentId;?>*/
            //to get the student ID 
            $contactUserName = (isset($_GET['contactUserName'])? $_GET['contactUserName']: "");
            $enquiry = getEnquiry($contactUserName);

            $contactTitle = $enquiry['Title'];
            $contactUserEmail = $enquiry['Email'];
            $date = $enquiry['Date'];
            $inquiry = $enquiry['Inquiry'];

            if(!empty($_POST)){
                $contactUserNameToDelete = isset($_POST['contactUserName']) ? $_POST['contactUserName'] : ""   ;
                deleteEnquiry($contactUserNameToDelete); 
                //delete this student 
                echo  '<div class="notification">';
                echo     "User " . $contactUserName . "'s enquiry has been deleted. [ <a href='list-enquiry.php' class='back'>Back to list</a>]";
                echo '</div>';
            }
            if(empty($_POST)){
        ?>

        <form method="post">
            <table   cellpadding="10" cellspacing="6">
                <tr>
                    <td>User Name :</td>
                    <td>
                        <?php echo $contactUserName; ?>
                        <input type="hidden" name="contactUserName" value="<?php echo $contactUserName; ?>"  maxlength="30"/>
                    </td>
                </tr>
                <tr>
                    <td>Title :</td>
                    <td>
                        <?php echo $contactTitle; ?>
                    
                    </td>
                </tr>
                <tr> 
                    <td>Email :</td>
                    <td>
                    <?php echo $contactUserEmail; ?>
                    </td>
                </tr>
                <tr>
                    <td>Date :</td>
                    <td>
                    <?php echo $date; ?>
                    </td>
                </tr> 

                <tr>
                    <td>Inquiry :</td>
                    <td>
                    <?php echo $inquiry; ?>
                    </td>
                </tr> 

            </table>
            <div class="input">
                    <input type="submit" name="submit" value="Delete" />
                    <input type="button" value="Cancel" onclick="location='list-enquiry.php'" />
            </div>  
                </form>
        <?php } ?>
    </body>

</html>