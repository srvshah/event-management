
<!DOCTYPE html>
<html lang="en">
<head>   
   <?php require_once 'include/head.php'; ?>     
   <link rel="stylesheet" href="css/about.css">   
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
                                <li><a href="index.php"  >Home</a></li>
                                <li><a href="#" class="active">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="event.php">Events</a></li>
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
            
           <?php require_once 'include/footer.php';?> 
            
        </div><!--container end-->
  </div> <!-- wrap end-->
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="scroll/jquery.nicescroll.min.js"></script>
  <script src="js/script.js"></script>
 
</body>

</html>