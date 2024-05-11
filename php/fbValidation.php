
<?php include_once("inquiry_helper.php");?>


                
<?php
        if (!empty($_POST)){    

//check student ID

        $contactTitle = $_POST['contactTitle']; 
        $contactUserName = $_POST['contactUserName']; 
        $contactUserEmail = $_POST['contactUserEmail']; 
       
        $inquiry = $_POST['inquiry']; 

        //VALIDATION
        if(empty($contactTitle)){
            addErrorMessage("Please write down your Title!");
        }
        if(empty($contactUserName)){
            addErrorMessage("Please enter your NAME!");
        }

        if(empty($contactUserEmail)){
            addErrorMessage("Please enter your EMAIL.");
        }elseif(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$contactUserEmail)){
            addErrorMessage("Please enter the correct EMAIL!");
        }

        if(empty($inquiry)){
            addErrorMessage("Please write down your message!");
        }


        //end validation

        if(!$errorFlag){
            if($enquiryFormAction == "create"   ){
                createReview($contactTitle,$contactUserName,$contactUserEmail,$inquiry);
                $formSubmitStatus = "success";
            }
            if($enquiryFormAction == "edit"){
                updateEnquiry($contactTitle,$contactUserName,$contactUserEmail,$inquiry);
                $formSubmitStatus = "success";  
            }
        }

        ?>
        <div class="notification <?php echo $formSubmitStatus; ?>">
        <?php if ($formSubmitStatus == "error"){?>
            <ul class="Messages" style="list-style-type:none;">
                <?php 
                    foreach($errorMessageArray as $error){ ?>
                    <li><?php echo $error; ?></li>
                <?php }?>
            </ul>
        <?php 
        }
        ?>
        <div class="Messages">
        <?php 
        if ($formSubmitStatus == "success") { ?>
            <?php     if($enquiryFormAction == "create"){ ?>
             <?php echo $contactUserName; ?>,your form has been submitted successfully! <br/>
          
            <?php } ?>

            <?php    if($enquiryFormAction == "edit"){ ?>
                 <?php echo $contactUserName; ?> enquiry has been updated!
                <?php 
                echo  "[ <a href='list-enquiry.php'>Back to list</a>]";
                ?>
            <?php }  ?>
            
            <?php 
                //Clear up variable after successfully added
                $contactTitle = "";
                $contactUserName = "";
                $contactUserEmail = "";
                $inquiry = "";  
                ?>
        <?php
         }
        ?>
        </div>

        </div>
    <?php 
        }
    //END FORM SUBMIT NOTIFICATION
    ?>
    

