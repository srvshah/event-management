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
                                <li><a href="#" class="active">About</a></li>
                                <li><a href="member_contact.php">Contact</a></li>
                                <li><a href="member_event.php">Events</a></li>
                                <li><a href="member_favourite.php">Favourites</a></li>
                            </ul>
                    
                    </div>
                </div>
            <!--second-nav end-->
            
            <!--slider-->
           <div class="main-content" style="padding:30px;">
               
               <div class="grid_12">
                  
                  
                  <p style="text-align:center;">
                      This is an Event Management website where different kinds of events are managed into defferent categories and has login system for the users to interact with the website according to his/her role
                      
                      
                  </p>
                  
                  
                   
               </div>
              
               
               
               
               
           </div>
            <!--slider end-->
            
           <?php require_once '../include/footer.php';?> 
            
        </div><!--container end-->
  </div> <!-- wrap end-->
 
 
</body>

</html>