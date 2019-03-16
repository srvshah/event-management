<?php session_start();

 
require_once('functions/database_functions.php');


if(isset($_POST['search_btn'])){
    $text = testdata($_POST['search']);
    $stmt = search_event($text);
}
else {
    $stmt = "select * from event";
}

if(isset($_POST['category'])){
    
    $id = $_POST['category'];
    
    if($id != "asc" and $id != "desc"){
        $stmt = search_category($id);
    }
    else{
        $stmt = arrange_category($id);
    }
    
    
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
    <link rel="stylesheet" href="css/admin_home.css">
    
   
    
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
     
       <link rel="stylesheet" href="css/modify.css">
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
                     <ul>
                     <li> <a href="signup.php"><i class="fas fa-user-plus"></i>SignUp</a></li>
                     <li> <a href="login.php"><i class="fas fa-user"></i>Login</a></li>
                     
                   </ul>
                     
                   </ul>
                    </div>
                
                </div>
            
            <!-- nav end-->
            
            <!--second nav-->
                <div class="second-nav">
                    <div class="grid_8">
                    
                            <ul>
                                <li><a href="index.php" >Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li class="active"><a class="active" href="#">Events</a></li>
                                
                            </ul>
                    
                    </div>
                    <div class="grid_4">
                        
                        <form style="padding-top: 8px;" action="#" method="post" enctype="multipart/form-data">
                            
                            <input type="text" name="search" placeholder="Search">
                            <input style=" color:white; background-color: #A21815; cursor:pointer;" type="submit" name="search_btn" value="Search">
                        </form>
                    </div>
                </div>
            <!--second-nav end-->
            
            <!--content-->
            
          <div class="sidenav">
                <form method="post" action="#" enctype="multipart/form-data">
                    <ul>
                        <li><button type="submit" name="category" value="1">Education</button></li>
                        <li><button type="submit" name="category" value="2">Entertainment</button></li>
                        <li><button type="submit" name="category" value="3">Sports</button></li>
                        <li><button type="submit" name="category" value="4">Music</button></li>
                        <li><button type="submit" name="category" value="5">Technology</button></li>
                        <li><button type="submit" name="category" value="6">Party</button></li> 
                        <li><button type="submit" name="category" value="asc"><i class="fas fa-caret-up">Asc</i></button></li>
                        <li><button type="submit" name="category" value="desc"><i class="fas fa-caret-down">Desc</i></button></li>
                         
                    </ul>
                   
                  </form>  
                
                
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
                           
                       </tr>
                        
                    </thead>
                    <tbody>
                         <?php
                            $conn = db_connect();
                        
                        
                        $count = mysqli_query($conn,"$stmt");
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
                        
                        $sql = "$stmt LIMIT $items_per_page OFFSET $offset";
                        

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
                                         echo '<a href="event.php?page='. $i .'">'.$i.'</a>';
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
            
        <?php require_once 'include/footer.php';?>  
        
        
        </div><!--container end-->
  </div> <!-- wrap end-->
  
    
    
  

</body>

</html>
 



