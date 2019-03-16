<?php
session_start();
include'login_process.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'include/head.php';?>
    <link rel="stylesheet" href="css/login.css">
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
                     <li> <a class="active" href="#"><i class="fas fa-user"></i>Login</a></li>
                     
                   </ul>
                    </div>
                
                </div>
                <!-- nav end-->
            
                <!--second nav-->
                <div class="second-nav">
                    <div class="grid_12">
                    
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="event.php">Events</a></li>
                            </ul>
                    
                    </div>
                </div>
            
               <!--signup form-->
               <div class="login">
                   
                       
                       <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                          
                           <table>
                               <tr>
                                   <td><label>Email: </label></td>
                                   <td><input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>"></td>
                               </tr>
                                 <tr>
                                   <td>
                                       <span class="error"><?= $email_error ?></span>
                                   </td>
                               </tr> 
                                <tr>
                                   <td><label>Password: </label></td>
                                   <td><input type="password" name="pwd" value=""></td>
                               </tr>
                               <tr>
                                   <td>
                                       <span class="error"><?= $password_error ?></span>
                                   </td>
                               </tr> 
                               <tr>
                                   
                                   <td><input type="submit" name="submit" value="Login" id="btn"></td>
                                   
                               </tr>
                               <tr>
                                   <td>
                                       <span class="error"><?= $login_error ?></span>
                                       <?php if(isset($_SESSION['success'])) echo $_SESSION['success']; ?>
                                   </td>
                               </tr> 
                           </table>                           
                       </form>
               </div>
            
               <?php require_once 'include/footer.php';?> 
            
            </div><!--container end-->
      </div> <!-- wrap end-->
    
    
</body>
</html>