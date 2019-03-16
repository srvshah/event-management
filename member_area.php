<?php session_start();

require_once('functions/database_functions.php');

if (!isMember()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>   
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Management</title>
    <link rel="stylesheet" href="css/960.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/text.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/all.min.css">   
    <link rel="stylesheet" href="css/admin_area.css">    
</head>
<body>
    <div class="wrap">
        <div class="container_12">
           
<!--            nav start-->
            <div class="nav">
                <div class="grid_6">

                        <h2><a href="#">EVENT MANAGEMENT</a></h2>

                </div> 
                <div class="grid_5 nav-right">
                   <ul>
                       <li><i class="fas fa-user"></i><?php if(isset($_SESSION['user']))
                        echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname']; ?>
                        &nbsp;<i class="fas fa-caret-down"></i>
                            <ul class="submenu">
                                
                                <li><a href="admin_area.php?logout='1'">Logout</a></li>
                                
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
                                <li><a href="member_area.php" class="active">Home</a></li>
                                <li><a href="member/member_about.php">About</a></li>
                                <li><a href="member/member_contact.php">Contact</a></li>
                                <li><a href="member/member_event.php">Events</a></li>
                                <li><a href="member/member_favourite.php">Favourites</a></li>
                                
                            </ul>
                    
                    </div>
                </div>
            <!--second-nav end-->
            
            <!--slider-->
            <div class="slider">
                <div class="grid_12">
                    <section id="content">
                        <div id="gallery_img">
                            <div id="image"></div>
                            <img src="images/icons/left.png" id="lefty">
                            <img src="images/icons/right.png" id="righty">
                            <img src="images/icons/play.png" id="play">
                            <img src="images/icons/pause.png" id="pause">
                            <img src="images/icons/expand.png" id="expand">
                        </div>
                        <div id="thumbs">
                            <div class="thumbs_style"> <img src="images/thumbs/a.jpg"> </div>
                            <div class="thumbs_style"> <img src="images/thumbs/b.jpg"> </div>
                            <div class="thumbs_style"> <img src="images/thumbs/c.jpg"> </div>
                            <div class="thumbs_style"> <img src="images/thumbs/d.jpg"> </div>
                            <div class="thumbs_style"> <img src="images/thumbs/e.jpg"> </div>

                        </div>
                    </section>
                </div>
            </div>
            <!--slider end-->
            
           <?php require_once 'include/footer.php';?> 
            
        </div><!--container end-->
  </div> <!-- wrap end-->
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="scroll/jquery.nicescroll.min.js"></script>
  <script src="js/script.js"></script>
 
</body>

</html>