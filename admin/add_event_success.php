<?php session_start();

include ('upload_event.php');
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
                        <li class="active"><a href="#" class="active">Add Event</a></li>
                        <li><a href="">Modify Event</a></li>                        
                        
                    </ul>
                    
                
                
            </div>
            
            <div class="display">
                
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                   
                   <table>
                       <tr>
                           <td><label>Event Name: </label></td>
                           <td><input type="text" name="ename" value="<?php
                                if(isset($_POST['ename'])){echo $_POST['ename'];}
                                                 
                               ?>"></td>
                       </tr>
                       <tr><td><span class="error"><?= $ename_error ?></span></td></tr>
                       
                       <tr>
                           <td><label>Venue: </label></td>
                           <td><input type="text" name="venue" value="<?php
                                if(isset($_POST['venue'])){echo $_POST['venue'];}
                                                 
                               ?>"></td>
                       </tr>
                       <tr><td><span class="error"><?= $venue_error ?></span></td></tr>
                       
                       <tr>
                           <td><label>Date: </label></td>
                           <td><input type="date" name="date" value="<?php
                                if(isset($_POST['date'])){echo $_POST['date'];}
                                                 
                               ?>"></td>
                       </tr>
                       <tr><td><span class="error"><?= $date_error ?></span></td></tr>
                       
                       <tr>
                           <td><label>Start Time: </label></td>
                           <td><select name="starttime">
                               <option value="" disabled="disabled" <?php
                                                 if(!isset($_POST['starttime'])){echo 'selected';}
                                                 
                                                 ?>>select </option>
                               <option value="1"
                               <?php
                                if(isset($_POST['starttime']) and $_POST['starttime']=='1'){echo 'selected';}
                                                 
                               ?>>1</option>
                               <option value="2"<?php
                                if(isset($_POST['starttime']) and $_POST['starttime']=='2'){echo 'selected';}
                                                 
                               ?>>2</option>
                               <option value="3"<?php
                                if(isset($_POST['starttime']) and $_POST['starttime']=='3'){echo 'selected';}
                                                 
                               ?>>3</option>
                               <option value="4"<?php
                                if(isset($_POST['starttime']) and $_POST['starttime']=='4'){echo 'selected';}
                                                 
                               ?>>4</option>
                               <option value="5"<?php
                                if(isset($_POST['starttime']) and $_POST['starttime']=='5'){echo 'selected';}
                                                 
                               ?>>5</option>
                               <option value="6"<?php
                                if(isset($_POST['starttime']) and $_POST['starttime']=='6'){echo 'selected';}
                                                 
                               ?>>6</option>
                               <option value="7"<?php
                                if(isset($_POST['starttime']) and $_POST['starttime']=='7'){echo 'selected';}
                                                 
                               ?>>7</option>
                               <option value="8"<?php
                                if(isset($_POST['starttime']) and $_POST['starttime']=='8'){echo 'selected';}
                                                 
                               ?>>8</option>
                               <option value="9"<?php
                                if(isset($_POST['starttime']) and $_POST['starttime']=='9'){echo 'selected';}
                                                 
                               ?>>9</option>
                               <option value="10"<?php
                                if(isset($_POST['starttime']) and $_POST['starttime']=='10'){echo 'selected';}
                                                 
                               ?>>10</option>
                               <option value="11"<?php
                                if(isset($_POST['starttime']) and $_POST['starttime']=='11'){echo 'selected';}
                                                 
                               ?>>11</option>
                               <option value="12"<?php
                                if(isset($_POST['starttime']) and $_POST['starttime']=='12'){echo 'selected';}
                                                 
                               ?>>12</option>                                
                               
                           </select>
                           <select name="starthour">
                              <option value="" disabled="disabled" <?php
                                if(!isset($_POST['starthour'] )){echo 'selected';}
                                                 
                               ?>>select</option>
                               <option value="am"<?php
                                if(isset($_POST['starthour']) and $_POST['starthour']=='am'){echo 'selected';}
                                                 
                               ?>>am</option>
                               <option value="pm"<?php
                                if(isset($_POST['starthour']) and $_POST['starthour']=='pm'){echo 'selected';}
                                                 
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
                                if(!isset($_POST['endtime'] )){echo 'selected';}
                                                 
                               ?>>select </option>
                                   <option value="1"<?php
                                if(isset($_POST['endtime']) and $_POST['endtime']=='1'){echo 'selected';}
                                                 
                               ?>>1</option>
                                   <option value="2"<?php
                                if(isset($_POST['endtime']) and $_POST['endtime']=='2'){echo 'selected';}
                                                 
                               ?>>2</option>
                                   <option value="3"<?php
                                if(isset($_POST['endtime']) and $_POST['endtime']=='3'){echo 'selected';}
                                                 
                               ?>>3</option>
                                   <option value="4"<?php
                                if(isset($_POST['endtime']) and $_POST['endtime']=='4'){echo 'selected';}
                                                 
                               ?>>4</option>
                                   <option value="5"<?php
                                if(isset($_POST['endtime']) and $_POST['endtime']=='5'){echo 'selected';}
                                                 
                               ?>>5</option>
                                   <option value="6"<?php
                                if(isset($_POST['endtime']) and $_POST['endtime']=='6'){echo 'selected';}
                                                 
                               ?>>6</option>
                                   <option value="7"<?php
                                if(isset($_POST['endtime']) and $_POST['endtime']=='7'){echo 'selected';}
                                                 
                               ?>>7</option>
                                   <option value="8"<?php
                                if(isset($_POST['endtime']) and $_POST['endtime']=='8'){echo 'selected';}
                                                 
                               ?>>8</option>
                                   <option value="9"<?php
                                if(isset($_POST['endtime']) and $_POST['endtime']=='9'){echo 'selected';}
                                                 
                               ?>>9</option>
                                   <option value="10"<?php
                                if(isset($_POST['endtime']) and $_POST['endtime']=='10'){echo 'selected';}
                                                 
                               ?>>10</option>
                                   <option value="11"<?php
                                if(isset($_POST['endtime']) and $_POST['endtime']=='11'){echo 'selected';}
                                                 
                               ?>>11</option>
                                   <option value="12"<?php
                                if(isset($_POST['endtime']) and $_POST['endtime']=='12'){echo 'selected';}
                                                 
                               ?>>12</option>                               
                               
                               </select>
                               <select name="endhour">
                                   <option value="" disabled <?php
                                if(!isset($_POST['endhour'] )){echo 'selected';}
                                                 
                               ?>>select</option>
                                   <option value="am"<?php
                                if(isset($_POST['endhour']) and $_POST['endhour']=='am'){echo 'selected';}
                                                 
                               ?>>am</option>
                                   <option value="pm"<?php
                                if(isset($_POST['endhour']) and $_POST['endhour']=='pm'){echo 'selected';}
                                                 
                               ?>>pm</option>                               
                               </select>
                           </td>
                           
                       </tr>
                       <tr><td><span class="error"><?= $etimeerror ?></span></td></tr>
                       
                       <tr>
                           
                           <td><label>Image: </label></td>
                           <td><input type="file" name="image"></td>
                       </tr>
                       <tr><td><span class="error"><?= $image_error ?></span></td></tr>
                       <tr>
                           
                           <td><label>Description: </label></td>
                           <td><textarea name="desc" style="width: 254px; height: 139px;" ><?php
                                if(isset($_POST['desc'])){echo $_POST['desc'];}
                                                 
                               ?></textarea></td>
                       </tr>
                       <tr><td><span class="error"><?= $desc_error ?></span></td></tr>
                       <tr>                                   
                           <td><input type="submit" name="add" value="Add" id="btn"></td> 
                       </tr>
                       <tr><td><span class="success"><?php 
    
                            if(isset($_SESSION['type']) and $_SESSION['type']=='add'){
                                echo 'Add event successful';
                            }
                           
                           if(isset($_SESSION['type']) and $_SESSION['type']=='update'){
                               echo 'Update event successful';
                           }
                           
                           
                           
                           
                           ?></span></td></tr>
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