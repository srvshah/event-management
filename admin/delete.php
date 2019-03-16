<?php
include '../functions/database_functions.php';


$ename = $venue = $date = $image = $desc = $category= '';
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    $conn = db_connect();
    
    
    mysqli_query($conn,"DELETE FROM event WHERE event_id = $id");
    
    header('location: modify.php');
}




?>