<?php session_start();

 require('delete.php');
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
                        <li ><a href="admin_home.php" >Add Event</a></li>
                        <li class="active"><a href="#" class="active">Modify Event</a></li>                        
                        
                    </ul>
                    
                
                
            </div>
            
            <div class="display">              
               
               
<!--               work here-->
               
               <div class="container">
              <div class="row content-justify-center ">
                
                
                <table id = "myTable" class="table table-responsive">
                    <thead>
                       <tr>
                           <th>Image</th>
                           <th>Title</th>
                           <th>Venue</th>
                           <th>Date</th>
                           <th>Time</th>                           
                           <th>Category</th>  
                           <th>Description</th>
                           <th colspan="2">Action</th>
                       </tr>
                        
                    </thead>
                    <tbody>
                         <?php
                            $conn = db_connect();
                        
                        
                        $count = mysqli_query($conn,"SELECT * FROM event");
                        $nr = mysqli_num_rows($count);
                        
                        
                        $items_per_page = 4;
                        
                        $totalpages = ceil($nr/$items_per_page);
                        
                        
                        if(isset($_GET['page']) and !empty($_GET['page'])){
                            $page = $_GET['page'];
                        }
                        else{
                            $page = 1;
                        }
                        $offset = ($page - 1) * $items_per_page;
                        
                        $sql = "SELECT * FROM event LIMIT $items_per_page OFFSET $offset";
                        

                            $result = mysqli_query($conn, $sql);
                        
                        $row_count = mysqli_num_rows($result);

                            while($row = mysqli_fetch_assoc($result)): 
                            
                        
                            $qry = 'SELECT category FROM category, event WHERE event.category_id = category.category_id AND category.category_id = '.$row['category_id'].' ';
                        
                        
                            $result2= mysqli_query($conn,$qry) ; 
                        
                            $cat = mysqli_fetch_assoc($result2);

                         ?>
                         
                         <tr>
                             
                             <td><?php 
        echo '<img height="125px" width="100px" src = "data:image;base64,'.$row['image'].' ">';
                                 ?></td>
                             
                             <td><?= $row['ename']   ?></td>
                             <td><?= $row['venue']   ?></td>
                             <td><?= $row['date']   ?></td>
                             <td><?php echo $row['starttime'].' - '.$row['endtime'] ;   ?></td>
                             
                             <td><?php
    
    
                                 echo $cat['category'];
                                 
                                 ?></td>
                             <td><?= $row['description']   ?></td>
                             
                             
                             <td>
                                 <a  class="btn btn-info" href="update_event.php?edit=<?php  echo $row['event_id'];  ?>">Edit</a>
                                 
                                 <a  class="btn btn-danger" href="delete.php?delete= <?php echo $row['event_id']; ?>">Delete</a>
                                 
                                 
                             </td>
                         </tr>
                         
                      
                         
                         
                         
                          <?php endwhile;  ?>
                        
                        
                           
                             
                           
                         
                    </tbody>
                    
                    
                </table>                
                
                </div> <!-- row end -->
                
                    <div class="row justify-content-center">
                    
                     <div class="pagination">
                                 
                                 <?php
                                 
                                 for($i=1; $i <= $totalpages; $i++){
                                     
                                     if($i==$page){
                                         echo '<a class="active" >'. $i .'</a>';
                                     }
                                     else{
                                         echo '<a href="modify.php?page='. $i .'">'.$i.'</a>';
                                     }
                                     
                                 }
                                 
                                 
                                 ?>
                    </div> 
                </div> <!--row end-->
                
                
                
                
                
                
                
                </div>  <!--  bootstrap container end -->
                
                
                
               <!------------------------------------form start -------------------------------->
              
               <!------------------------------------form end ---------------------------------->
               
               
               
                
            </div> <!-- display end -->
            
            
            <div class="clear"></div>
           
            <!--content-->
            
        <?php require_once '../include/footer.php';?>  
        
        
        </div><!--container end-->
  </div> <!-- wrap end-->
  
    
    
  

</body>

</html>
 



