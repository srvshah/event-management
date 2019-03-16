<?php session_start();

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
<?php include '../register.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once '../include/member_head.php';?>
    
    <link rel="stylesheet" href="../css/admin_area.css">
    <link rel="stylesheet" href="../css/signup.css">
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
                      <li><i class="fas fa-user"></i><?php if(isset($_SESSION['user']))
                        echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname']; ?>
                        &nbsp;<i class="fas fa-caret-down"></i>
                            <ul class="submenu">
                                <li><a href="add_user.php">Add User</a></li>
                                <li><a href="../admin_area.php?logout='1'">Logout</a></li>
                                
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
                                <li><a href="admin_about.php">About</a></li>
                                <li><a href="admin_contact.php">Contact</a></li>
                                <li><a href="admin_event.php">Events</a></li>
                                <li ><a href="admin_home.php" class="active" >Admin</a></li>
                            </ul>
                    
                    </div>
                </div>
            
               <!--signup form-->
               <div class="signup">
                   
                       
                       <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                           <table>
                               <tr>
                                   <td><label>First Name: </label></td>
                                   <td><input type="text" name="fname" value="<?php if(isset($fname)) echo $fname; ?>"></td>
                               </tr>
                               <tr>
                                   <td>
                                       <span class="error"><?= $fname_error ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   <td><label>Last Name: </label></td>
                                   <td><input type="text" name="lname" value="<?php if(isset($lname)) echo $lname; ?>"></td>
                               </tr>
                               <tr>
                                   <td>
                                       <span class="error"><?= $lname_error ?></span>
                                   </td>
                               </tr>
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
                                   <td><input type="password" name="pwd" value="<?php if(isset($pwd)) echo $pwd; ?>"></td>
                               </tr>
                               <tr>
                                   <td><label>Confirm Password: </label></td>
                                   <td><input type="password" name="pwd2" value="<?php if(isset($pwd2)) echo $pwd2; ?>"></td>
                               </tr>
                                <tr>
                                   <td>
                                       <span class="error"><?= $password_error ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   <td><label>Age: </label></td>
                                   <td>
                                       <select name="age">
                                         <option value="" disabled="disabled" <?php
                                                 if(!isset($_POST['age'])){echo 'selected';}
                                                 
                                                 ?>>-- Please Select --</option>
                                          <option value="0-20" <?php
                                                 if(isset($_POST['age']) and $_POST['age']=='0-20'){echo 'selected';}
                                                 
                                                 ?>>0-20</option>
                                          <option value="21-37"<?php
                                                 if(isset($_POST['age']) and $_POST['age']=='21-37'){echo 'selected';}
                                                 
                                                 ?>>21-37</option>
                                          <option value="38-50"<?php
                                                 if(isset($_POST['age']) and $_POST['age']=='38-50'){echo 'selected';}
                                                 
                                                 ?>>38-50</option>
                                          <option value="51-70"<?php
                                                 if(isset($_POST['age']) and $_POST['age']=='51-70'){echo 'selected';}
                                                 
                                                 ?>>51-70</option>
                                          <option value="71-89"<?php
                                                 if(isset($_POST['age']) and $_POST['age']=='71-89'){echo 'selected';}
                                                 
                                                 ?>>71-89</option>
                                          <option value="90+"<?php
                                                 if(isset($_POST['age']) and $_POST['age']=='90+'){echo 'selected';}
                                                 
                                                 ?>>90+</option>
                                       </select>
                                   </td>
                               </tr>
                                <tr>
                                   <td>
                                       <span class="error"><?= $age_error ?></span>
                                   </td>
                               </tr>                               
                                <tr>
                                   <td><label>Role: </label></td>
                                    <td><select name="role">
                                        <option value="member" selected>Member</option>
                                        <option value="admin">Admin</option>                                    
                                    </select></td>
                                </tr>
                               <tr>
                                   <td class="chkbox"><input type="checkbox" name="chkbox"></td>
                                   <td>I agree to the <a href="tnc.php">Terms and Conditions</a></td>
                               </tr>
                                <tr>
                                   <td>
                                       <span class="error"><?= $chkbox_error ?></span>
                                   </td>
                               </tr>
                               <tr>
                                   
                                   <td><input type="submit" name="submit" value="Submit" id="btn"></td>
                                   <td><input type="reset" name="clear" value="Clear" id="btn" ></td>
                               </tr>
                                <tr>
                                   
                                   <td><span class="success">User Added!</span></td>
                                   
                               </tr>

                           </table>
                           
                       </form>
                       
                   
                   
                   
                   
               </div>
            
               <?php require_once '../include/footer.php';?> 
            
            </div><!--container end-->
      </div> <!-- wrap end-->
    
    
</body>
</html>