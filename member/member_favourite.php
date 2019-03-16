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
  <?php
   
    
    if(isset($_POST['add_to_fav'])){
        
         
        
        $item_array_id = array_column($_SESSION['favourites'],'item_id');
        
        if(!in_array($_GET['id'],$item_array_id)){
           
            $count = count($_SESSION['favourites']);
            $item_array = array(
            
                'item_id' => $_GET['id'],
                'item_name' => $_POST['hidden_name']
            
            
            );
            $_SESSION['favourites'][$count] = $item_array; 
            
            
        }
        else{
             echo '<script>alert("Already Added to Favourites")</script>';  
                echo '<script>window.location="member_favourite.php"</script>'; 

            
        }
    }
    else{
        $item_array = array(
        
            'item_id' => $_GET['id'],
            'item_name' => $_POST['hidden_name']
        
        
        );
        $_SESSION['favourites'][0] = $item_array;
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
   
    
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
     
       <link rel="stylesheet" href="../css/modify.css">
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
                                <li><a href="../member_area.php" class="active">Home</a></li>
                                <li><a href="member_about.php">About</a></li>
                                <li><a href="member_contact.php">Contact</a></li>
                                <li><a href="member_event.php">Events</a></li>
                                <li class="active"><a class="active" href="#">Favourites</a></li>
                                
                            </ul>
                    
                    </div>
                </div>
            <!--second-nav end-->
            
            <!--slider-->
            <div class="display" style="height: 1600px;">
            
                     
               <div class="container" >
                  
                <div class="row">
                    <?php
                   
                   $conn = db_connect();
                   $qry = "select * from event order by event_id asc";
                   
                   $result = mysqli_query($conn,$qry);
                   
                   
                   if(mysqli_num_rows($result)>0){
                       
                       while($row = mysqli_fetch_array($result)){
                           
                           ?>
                         <div class="col-md-4">
                             
                             <form method="post" action="member_favourite.php?id=<?php echo $row['event_id'];?>">
                                 <div style="border: 1px solid #333; border-radius: 5px; padding: 16px; background-color: #f1f1f1;">
                                     
                                     <img width="150px" height="125px"  src="data:image;base64,<?= $row['image'] ?>" class="img-responsive">
                                     <p><?php echo $row['ename'];?></p>
                                     <input type="hidden" name="hidden_name" value="<?= $row['ename'] ?>" />
                                     
                                     <button type="sumbit" name="add_to_fav" style="margin-top: 5px;" class="btn btn-primary" value="">Add to Favourite</button>
                                 </div>
                                 
                                 
                             </form>
                         </div>  
                           
                    <?php
                       }
                       
                       
                       
                   }
                   ?>                                                                                       
                  
                </div> <!-- row end -->
                
                  <div style="clear:both;"></div>
                  <br/>
                <div class="row">
                    <div class="table-responsive">
                    
                        <table class="table table-bordered">

                            <tr>
                                <th width="80%">Event Name</th>
                                <th width="20%">Action</th>
                                
                                
                            </tr>
                            
                                <?php
                                
                                    if(!empty($_SESSION['favourites'])){
                                        
                                        $total = 0;
                                        
                                        foreach($_SESSION['favourites'] as $keys => $values ){
                                            
                                            ?>
                                            
                                            <tr>
                                                <td><?php echo $values['item_name']  ?></td>
                                                <td><a href="member_favourite.php?action=delete&id=<?php echo $values['item_id'];  ?>   "><span class="text-danger">Remove</span></a></td>
                                            </tr>
                                            
                                            
                                            
                                            
                                            <?php
                                            
                                        }
                                        
                                    }
                                
                                
                                
                                
                                ?>
                                
                                
                           

                        </table>
                    
                    
                    </div>
                    
                </div>
                </div>  <!--  bootstrap container end -->
                
                
             
            </div>
            <!--slider end-->
            
           <?php require_once '../include/footer.php';?> 
            
        </div><!--container end-->
   <!-- wrap end-->
  
    </div>
  
</body>

</html>