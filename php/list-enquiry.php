<link rel="stylesheet" href="../css/list-enquiry.css">
<?php include_once("header.php");?>
<?php include_once("inquiry_helper.php");?>
<link href="../pics/logo.ico" rel="icon"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link href="../pics/logo.ico" rel="icon"/>
<h1 class="userEnquiry">
    <ul>
        <li>
            <input type="checkbox" class="rgbCheck"/>
            <div class="rgbLetter">U</div>
        </li>
        <li>
            <input type="checkbox" class="rgbCheck"/>
            <div class="rgbLetter">S</div>
        </li>
        <li>
            <input type="checkbox" class="rgbCheck"/>
            <div class="rgbLetter">E</div>
        </li>
        <li>
            <input type="checkbox" class="rgbCheck"/>
            <div class="rgbLetter">R</div>
        </li>
        &nbsp; &nbsp; 
        <li>
            <input type="checkbox" class="rgbCheck"/>
            <div class="rgbLetter">E</div>
        </li>
        <li>
            <input type="checkbox" class="rgbCheck"/>
            <div class="rgbLetter">N</div>
        </li>
        <li>
            <input type="checkbox" class="rgbCheck"/>
            <div class="rgbLetter">Q</div>
        </li>
        <li>
            <input type="checkbox" class="rgbCheck"/>
            <div class="rgbLetter">U</div>
        </li>
        <li>
            <input type="checkbox" class="rgbCheck"/>
            <div class="rgbLetter">I</div>
        </li>
        <li>
            <input type="checkbox" class="rgbCheck"/>
            <div class="rgbLetter">R</div>
        </li>
        <li>
            <input type="checkbox" class="rgbCheck"/>
            <div class="rgbLetter">Y</div>
        </li>
    </ul>
</h1>

    <?php 
        if(!empty($_POST)){      
                //array from form submit POST
            $checkedContactUserName = isset($_POST['checkedContactUserName']) ? $_POST['checkedContactUserName'] : "";
            
            $checkedContactUserNameCount = count($checkedContactUserName);
            echo '<div class="notification success">';
                echo $checkedContactUserNameCount . " record(s) has been deleted.";   
            echo '</div>';
            foreach($checkedContactUserName as $contactUserName){
                deleteEnquiry($contactUserName);   
            }
        } 
        $sortBy = (isset($_GET['sortBy'])) ? $_GET['sortBy'] : "UserName";
        /*
        $sortBy = "";
        if(isset($_GET['sortBy'])){
            $sortBy = $_GET['sortBy'];
        }else{
            $sortBy = "StudentId";
        }
        */
        $sortOrder = (isset($_GET['sortOrder']))? $_GET['sortOrder']: "Asc";
        $contactUserName = (isset($_GET['contactUserName']))? $_GET['contactUserName']: "All";

        function generateSortingIcon($currentColumn, $currentSortOrder,$currentSortingColumn){

            $sortingIcon = "";
            if($currentSortingColumn == $currentColumn){
                if($currentSortOrder == "Asc"){
                    $sortingIcon .= "<img src='picture/arrow_top.png'/>";
                }else{
                    $sortingIcon .= "<img src='picture/arrow_bottom.png'/>";
                }
            }   
            return $sortingIcon;
        }

        function generateSortingLink($currentColumn, $currentSortOrder,$currentSortingColumn){
            $sortingLink = "?sortBy=$currentColumn&sortOrder=";

            if ($currentSortingColumn == $currentColumn){
                if($currentSortOrder == "Asc"){
                    $sortingLink .= "Desc";
                }else{
                    $sortingLink .= "Asc";
                }
                
            }else{
                $sortingLink .="Asc";
            }
        }

    ?>
 
                <form action="" method="GET" class="searchEnquiry">
                     <input type="text" name="search" class="searchArea" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>"  placeholder="Search User Name" maxlength="30">
                       <button type="submit" class="searchBtn">Search</button>              
                </form>

            <?php if(!empty($_GET)){?>
                <h1>Search User Enquiry</h1>
                <table class="searchTable" cellpadding="8" cellspacing="8">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Inquiry</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $con = mysqli_connect("localhost","root","","esportdb");

                                if(isset($_GET['search']))
                                {
                                    $filtervalues = $_GET['search'];
                                    $query = "SELECT * FROM inquiry WHERE CONCAT(UserName) LIKE '$filtervalues%' ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $items)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $items['Title']; ?></td>
                                                <td><?= $items['UserName']; ?></td>
                                                <td><?= $items['Email']; ?></td>
                                                <td><?= $items['Date']; ?></td>
                                                <td><?= $items['Inquiry']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="4">No Record Found</td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>

                <?php } ?>
                    
 
                


    
    <form method="post">
            <table class="showTable">
                <tr>
                    <th>

                    </th>
                <th>
                        Title 
                        
                        <?php echo generateSortingIcon("ContactTitle",$sortOrder,$sortBy);?>
                    </th>
                    
                    <th>
                        
                        User Name

                        <?php echo generateSortingIcon("ContactUserName",$sortOrder,$sortBy);?>
                    </th>
                    
                    <th>
                       
                        Email
                    
                    <?php echo generateSortingIcon("ContactUserEmail",$sortOrder,$sortBy);?>
                    </th>
                    <th>
                        
                        Date
                        <?php echo generateSortingIcon("Date",$sortOrder,$sortBy);?>
                    </th>
                    <th>
                       
                        Message
                        <?php echo generateSortingIcon("inquiry",$sortOrder,$sortBy);?>
                        
                    </th>
                    <th>

                    </th>
                </tr>

                <?php 
                    //move every db-related things to helper.php 
                    $result = listInquiry($sortBy,$sortOrder);
                    //loop
                    //TODO: Change this to real data
                    $resultCount = 0;
                // for($i=0;$i<10;$i++){ 
                    while($row = $result->fetch_array()){
                        
                ?>

                <tr>
                    <td>
                      
                        <input type="checkbox" id="deleteCheck" name="checkedContactUserName[]" value="<?php echo $row['UserName'];?>"/>
                    </td>
                    <td><?php echo $row['Title']?></td>
                    <td><?php echo $row['UserName']?></td>
                    <td><?php echo $row['Email']?></td>
                    <td><?php echo $row['Date'];?></td>
                    <td><?php echo $row['Inquiry'];?></td>
                    <td>
                    <a href="delete-enquiry.php?contactUserName=<?php echo $row['UserName'];?>" class="fa fa-trash">&nbsp;Delete</a>
                    </td>
                </tr>

                <?php 
                    } //END LOOP
                    $resultCount = $result->num_rows;
                ?>

                <tr>
                    <!-- TODO: SHOW HOW MANY ROWS RETURNED (FROM DB) -->
                    <td colspan="7">
                        <?php 
                        if ($resultCount ==0){
                            echo "No record return";
                        }else{
                            echo $resultCount," records returned";
                        }
                        ?>
                    </td>
                </tr>

            </table>

            <input type="submit" class="multipleDeleteButton" name="multipleDeleteButton" value="Delete Checked" onclick="confirm('This will delete all checked records.\rAre you sure?')"/>
     </form>
</body>

</html>