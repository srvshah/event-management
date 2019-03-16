<?php session_start();


include ('update.php');
require_once('../functions/database_functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>   
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Management</title>
    <link rel="stylesheet" href="../css/960.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/text.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/all.min.css">   
    <link rel="stylesheet" href="../css/admin_area.css">    
    <link rel="stylesheet" href="../css/admin_home.css">
</head>
<body>
    <div class="wrap">
        <div class="container_12">
           
<!--            nav start-->
            <div class="nav">
                <div class="grid_6">

                        <p style="font-size: 23px; margin:0; font-weight:bold;"><a href="index.php">EVENT MANAGEMENT</a></p>

                </div> 
                <div class="grid_5 nav-right">
                   <ul>
                       <li><i class="fas fa-user"></i><?php if(isset($_SESSION['user']))
                        echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname']; ?>
                        &nbsp;<i class="fas fa-caret-down"></i>
                            <ul class="submenu">
                                <li><a href="add_user.php">Add User</a></li>
                                <li><a href="admin_home.php?logout='1'">Logout</a></li>
                                
                            </ul>
                        
                        
                        
                        </li>
                     
                   </ul>
                    </div>
                
                </div>
            
            <!-- nav end-->
            
            <!--second nav-->
                <div class="second-nav">
                    <div class="grid_12">
                    
                            <ul>
                                <li><a href="../admin_area.php" >Home</a></li>
                                <li><a href="">About</a></li>
                                <li><a href="">Contact</a></li>
                                <li><a href="">Events</a></li>
                                <li ><a href="#" class="active">Admin</a></li>
                            </ul>
                    
                    </div>
                </div>
            <!--second-nav end-->
            
            <!--content-->
            
            <div class="sidenav">
                
                    <ul>
                        <li ><a href="#" >Add Event</a></li>
                        <li class="active"><a class="active" href="modify.php">Modify Event</a></li>                        
                        
                    </ul>
                    
                
                
            </div>
            
            <div class="display">
                
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                   
                   
                   
                   
                   <?php  
                    $conn=db_connect();
                  
                        $result = mysqli_query($conn, "SELECT * FROM event WHERE event_id = $id ");

                        if(mysqli_num_rows($result)==1){
                            $row = mysqli_fetch_assoc($result);

                            $ename = $row['ename'];
                            $venue = $row['venue'];
                            $date = $row['date'];

                            $desc = $row['description'];
                            $image = $row['image'];
                            $category = $row['category_id'];
                        }
                    
                    ?>
                   
                   
                   
                   <table>
                       <tr>
                           <td><label>Event Name: </label></td>
                           <td><input type="text" name="ename" value="<?php
                                                 echo $ename;
                               ?>"></td>
                       </tr>
                       <tr><td><span class="error"><?= $ename_error ?></span></td></tr>
                       
                       <tr>
                           <td><label>Venue: </label></td>
                           <td><input type="text" name="venue" value="<?php
                                echo $venue;
                                                 
                               ?>"></td>
                       </tr>
                       <tr><td><span class="error"><?= $venue_error ?></span></td></tr>
                       
                       <tr>
                           <td><label>Date: </label></td>
                           <td><input type="date" name="date" value="<?php
                               echo $date;
                                                 
                               ?>"></td>
                       </tr>
                       <tr><td><span class="error"><?= $date_error ?></span></td></tr>
                       
                       <tr>
                           <td><label>Start Time: </label></td>
                           <td><select name="starttime">
                               <option value="" disabled="disabled" <?php
                                                 if($starttime==''){echo 'selected';}
                                                 
                                                 ?>>select </option>
                               <option value="1"
                               <?php
                                if( $starttime=='1'){echo 'selected';}
                                                 
                               ?>>1</option>
                               <option value="2"<?php
                                if( $starttime=='2'){echo 'selected';}
                                                 
                               ?>>2</option>
                               <option value="3"<?php
                                if( $starttime=='3'){echo 'selected';}
                                                 
                               ?>>3</option>
                               <option value="4"<?php
                                if( $starttime=='4'){echo 'selected';}
                                                 
                               ?>>4</option>
                               <option value="5"<?php
                                if( $starttime=='5'){echo 'selected';}
                                                 
                               ?>>5</option>
                               <option value="6"<?php
                                if( $starttime=='6'){echo 'selected';}
                                                 
                               ?>>6</option>
                               <option value="7"<?php
                               if( $starttime=='7'){echo 'selected';}
                                                 
                               ?>>7</option>
                               <option value="8"<?php
                                if( $starttime=='8'){echo 'selected';}
                                                 
                               ?>>8</option>
                               <option value="9"<?php
                                if( $starttime=='9'){echo 'selected';}
                                                 
                               ?>>9</option>
                               <option value="10"<?php
                                if( $starttime=='10'){echo 'selected';}
                                                 
                               ?>>10</option>
                               <option value="11"<?php
                                if( $starttime=='11'){echo 'selected';}
                                                 
                               ?>>11</option>
                               <option value="12"<?php
                                if( $starttime=='12'){echo 'selected';}
                                                 
                               ?>>12</option>                                
                               
                           </select>
                           <select name="starthour">
                              <option value="" disabled="disabled" <?php
                                if($starthour='' ){echo 'selected';}
                                                 
                               ?>>select</option>
                               <option value="am"<?php
                                if( $starthour=='am'){echo 'selected';}
                                                 
                               ?>>am</option>
                               <option value="pm"<?php
                               if( $starthour=='pm'){echo 'selected';}
                                                 
                               ?>>pm</option>
                               
                           </select> 
                           
                           </td>
                           
                       </tr>
                       <tr><td><span class="error"><?= $stimeerror ?></span></td></tr>
                       <tr>
                          <td><label>End Time: </label></td>
                           <td>
                               <select name="endtime">
                                   <option value="" disabled="disabled" <?php
                                if($endtime==''){echo 'selected';}
                                                 
                               ?>>select </option>
                                   <option value="1"<?php
                                if($endtime=='1'){echo 'selected';}
                                                 
                               ?>>1</option>
                                   <option value="2"<?php
                                if($endtime=='2'){echo 'selected';}
                                                 
                               ?>>2</option>
                                   <option value="3"<?php
                                if($endtime=='3'){echo 'selected';}
                                                 
                               ?>>3</option>
                                   <option value="4"<?php
                                if($endtime=='4'){echo 'selected';}
                                                 
                               ?>>4</option>
                                   <option value="5"<?php
                               if($endtime=='5'){echo 'selected';}
                                                 
                               ?>>5</option>
                                   <option value="6"<?php
                                if($endtime=='6'){echo 'selected';}
                                                 
                               ?>>6</option>
                                   <option value="7"<?php
                                if($endtime=='7'){echo 'selected';}
                                                 
                               ?>>7</option>
                                   <option value="8"<?php
                                if($endtime=='8'){echo 'selected';}
                                                 
                               ?>>8</option>
                                   <option value="9"<?php
                                if($endtime=='9'){echo 'selected';}
                                                 
                               ?>>9</option>
                                   <option value="10"<?php
                                if($endtime=='10'){echo 'selected';}
                                                 
                               ?>>10</option>
                                   <option value="11"<?php
                                if($endtime=='11'){echo 'selected';}
                                                 
                               ?>>11</option>
                                   <option value="12"<?php
                               if($endtime=='12'){echo 'selected';}
                                                 
                               ?>>12</option>                               
                               
                               </select>
                               <select name="endhour">
                                   <option value="" disabled <?php
                                if($endhour==''){echo 'selected';}
                                                 
                               ?>>select</option>
                                   <option value="am"<?php if($endhour=='am'){echo 'selected';}?>>am</option>
                                   <option value="pm"<?php
                               if($endhour=='pm'){echo 'selected';}
                                                 
                               ?>>pm</option>                               
                               </select>
                           </td>
                           
                       </tr>
                      
                       
                       <tr>
                           
                           <td><label>Image: </label></td>
                           <td><input type="file" name="image" value="<?= $image ?>"></td>
                       </tr>
                       <tr><td><span class="error"><?= $image_error ?></span></td></tr>
                       
                       <tr>
                           
                           <td><label>Category:</label></td>
                           <td><select name="category">
                              
                               <option value="" disabled <?php
                                       
                                       if($category=='') echo'selected';
                                       
                                       ?>>select</option>
                               <option value="1" <?php
                                      if($category=='1') echo'selected';                                       
                                       ?>  >Education</option>
                               <option value="2"<?php
                                       if($category=='2') echo'selected';                                       
                                       ?>>Entertainment</option>
                               <option value="3"<?php
                                      if($category=='3') echo'selected';                                      
                                       ?>>Sports</option>
                               <option value="4"<?php
                                      if($category=='4') echo'selected';                                       
                                       ?>>Music</option>
                               <option value="5"<?php
                                       if($category=='5') echo'selected';                                      
                                       ?>>Technology</option>
                               <option value="6"<?php
                                      if($category=='6') echo'selected';                                       
                                       ?>>Party</option>
                               
                               
                               
                           </select></td>
                           
                           
                       </tr>
                       
                       <tr><td><span class="error"><?= $category_error ?></span></td></tr>
                       
                       
                       
                       <tr>
                           
                           <td><label>Description: </label></td>
                           <td><textarea name="desc" style="width: 254px; height: 139px;" ><?php
                                echo $desc;
                                                 
                               ?></textarea></td>
                       </tr>
                       <tr><td><span class="error"><?= $desc_error ?></span></td></tr>
                       <tr>                                   
                           <td><input type="submit" name="submit" value="Update" id="btn"></td> 
                       </tr>
                       <tr>
                           <td><input name ="hiddenid" type="hidden" value="<?= $id ?>"></td>
                       </tr>
                   </table>
                    
                    
                </form>
                    
                    
               
                
            </div>
            
            
            <div class="clear"></div>
           
            <!--content-->
            
        <?php require_once '../include/footer.php';?>  
        </div><!--container end-->
  </div> <!-- wrap end-->
  
 
</body>

</html>