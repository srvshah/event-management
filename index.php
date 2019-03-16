
<!DOCTYPE html>
<html lang="en">
<head>   
   <?php require_once 'include/head.php'; ?>        
</head>
<body>
    <div class="wrap">
        <div class="container_12">
           
<!--            nav start-->
            <div class="nav">
                <div class="grid_6">

                        <h2><a href="index.php">EVENT MANAGEMENT</a></h2>

                </div> 
                <div class="grid_5 nav-right">
                   <ul>
                     <li> <a href="signup.php"><i class="fas fa-user-plus"></i>SignUp</a></li>
                     <li> <a href="login.php"><i class="fas fa-user"></i>Login</a></li>
                     
                   </ul>
                    </div>
                
                </div>
            
            <!-- nav end-->
            
            <!--second nav-->
                <div class="second-nav">
                    <div class="grid_12">
                    
                            <ul>
                                <li><a href="#" class="active" >Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="event.php">Events</a></li>
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