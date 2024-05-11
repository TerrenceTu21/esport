<!DOCTYPE html>
<html lang="en">
<head class="headDesign">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>About Us</title>
    <link rel="stylesheet" href="../css/aboutus.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="../pics/logo.ico" rel="icon"/>

    
</head>
<?php $pageTitle = "Events"; ?>
<?php include("header.php"); ?> 
<?php include_once("inquiry_helper.php");?>

<body>
     <button onclick="topFunction()" id="goUp" title="Go to top">Top</button>
        <h1 class="aboutus">About &nbsp;
            <strong class="sign">
                <span class="fast-flicker">E</span><span class="flicker">CL</span>
            </strong>
        </h1>
    
      <p class="para1"> <img src="../pics/ecl2023.png" class="au"alt="esportplayer">
             On April 12, 2022, a diverse team of experts from the esports industry, headed by Wesley Yii, established ECL, 
             a Malaysian Electronic Sport Club that aims to cater to the needs of esports enthusiasts by providing them with 
             a platform for competitive gaming and broadcasting. ECL will soon become the ultimate destination for gamers who 
             want to keep up-to-date with their favorite games, including League of Legends, CS:GO, Dota 2, and many more. 
             The club features insightful articles written by experienced athletes and esports professionals, as well as daily news updates.
        </p>

        <div class="grid-container">
        
            <div class="grid-item" id="vision">
                <h2>Vision</h2>
                <p>
                To create a professional and inclusive organization that fosters the growth of competitive gaming in the country. 
                The club would aim to provide a supportive environment for Malaysian gamers of all backgrounds and skill levels, 
                with a focus on cultivating a strong community that values teamwork, sportsmanship, and personal growth.
                </p>
                <br>
                <p>
                The club would work to identify and recruit top esports talent in Malaysia, with a goal of fielding competitive teams in a range of games. 
                These teams would receive comprehensive support and resources, including access to top-of-the-line gaming equipment, professional coaching, and opportunities for international competition.
                </p>

            </div>
            <div class="grid-item" id="mission">
                <h3>Mission</h3>
                    <p>
                    ECL could strive to foster a welcoming and inclusive community for gamers in Malaysia, 
                    with a focus on creating a supportive environment where players can connect, learn, and grow together.
                    </p>
                    <br>
                    <p>
                    ECL could work to identify and develop top esports talent in Malaysia, 
                    providing coaching, training, and resources to help players reach their full potential.
                    </p>
                    <br>
                    <p>
                    ECL could organize and support local tournaments and events, providing opportunities for Malaysian gamers to compete and showcase their skills.
                    </p>
                    <br>
                    <p>
                    ECL could help to promote the positive aspects of esports, including its potential as a social activity, its benefits for cognitive development, and its growing importance as a viable career path.
                    </p>
                    <br>
            </div>
         
             <div class="contactus" id="contact">
                <h5>Contact Us</h5>
                    <ul>
                        <li class="fa fa-map-marker" id="address">No.1,Jalan Alamesra,Alamesra,<br>88450 Kota Kinabalu, Sabah</li>
                        <br>
                        <li class="fa fa-envelope icon" id="email">esport@ecl.com</li>
                        <br>
                        <li class="fa fa-phone" id="phonenum">016-801 2190</li>
                        <br>
                    </ul>

             </div>  
                <div class="contactus" id="reachOut">
                    <h6>Reach Out</h6>
                    <caption>Leave us message</caption>
                    <?php
                            $formSubmitStatus = "error";
                            $errorFlag = 0;
                            $errorMessageArray = array();


                        //Empty variable to show back the input if got error
                        $contactTitle = "";
                        $contactUserName = "";
                        $contactUserEmail = "";
                        $inquiry = "";
                    


                        function addErrorMessage($message){
                            $GLOBALS['errorFlag'] = 1;
                            array_push($GLOBALS['errorMessageArray'],$message);
                        }

                    
                        $enquiryFormAction = "create";
                        include_once("fbValidation.php"); 

                      ?>
                    <form action="" method="post">
                    <table>
                        <tr>
                            <td>
                                Title*
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="contactTitle" placeholder="Title" maxlength="30">
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td>
                                Name*
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="contactUserName" placeholder="Name" maxlength="30">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email*
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="email" name="contactUserEmail" placeholder="hehe123@gmail.com" maxlength="20">
                            </td>
                        </tr>
                        <tr>
                            <td>
                               Message*
                            </td>
                        </tr>
                        <tr>
                            <td>             
                                <textarea name="inquiry"  placeholder="Write Here" ></textarea><br>
                            </td>
                        </tr>
                        
                    </table>
                        <input type="submit" name="UserEnquiry" value="Submit" onclick="confirm('Are you sure you want to submit the form?')">
                    </form>

                </div> 
            
        </div>
       <script>
            // Get the button
            let mybutton = document.getElementById("goUp");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            }
        </script>         
       

        <?php
        include('footer.php');
         ?>
</body>
</html>