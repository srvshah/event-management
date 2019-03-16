<?php session_start();

require_once('../functions/database_functions.php');

if (!isMember()) {
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
   <?php require_once '../include/member_head.php'; ?>     
   <link rel="stylesheet" href="../css/about.css"> 
   <link rel="stylesheet" href="../css/admin_area.css">  
  
</head>
<body>
    <div class="wrap">
        <div class="container_12">
           
<!--            nav start-->
            <div class="nav">
                <div class="grid_6">

                        <h2><a href="../member_area.php">EVENT MANAGEMENT</a></h2>

                </div> 
                <div class="grid_5 nav-right">
                  <ul>
                      <li><i class="fas fa-user"></i><?php if(isset($_SESSION['user']))
                        echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname']; ?>
                        &nbsp;<i class="fas fa-caret-down"></i>
                            <ul class="submenu">
                                
                                <li><a href="../member_area.php?logout='1'">Logout</a></li>
                                
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
                                <li><a href="../member_area.php"  >Home</a></li>
                                <li><a href="member_about.php">About</a></li>
                                <li><a class="active" href="#">Contact</a></li>
                                <li><a href="member_event.php">Events</a></li>
                                <li><a href="member_favourite.php">Favourites</a></li>
                            </ul>
                    
                    </div>
                </div>
            <!--second-nav end-->
            
            <!--slider-->
           <div class="main-content" style="padding:30px;">
               
               <div class="grid_12">
                  
              <form action="">
                  <label >Name: </label>
                  <input type="text" name="name" placeholder="enter your name"><br><br>
                  <label >Email:</label>
                  <input type="email" name="email" placeholder="enter your email"><br><br>
                  <textarea name="msg" id="" cols="30" rows="10"></textarea><br><br>
                  <input type="submit" name="submit" value="Submit">
                  
              </form>
               </div>
              
               
               
               
               
           </div>
            <!--slider end-->
            
           <?php require_once '../include/footer.php';?> 
            
        </div><!--container end-->
  </div> <!-- wrap end-->
  
 
</body>

</html>