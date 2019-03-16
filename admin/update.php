<?php

require_once '../functions/database_functions.php';
$category_error = $venue_error = $ename_error = $date_error = $stimeerror = $etimeerror = $desc_error = $image_error ='';
$category = $venue = $ename = $date = $starttime = $starthour = $endhour = $endtime = $desc = $image = $img_name= ''; 



if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    
    $id = $_POST['hiddenid'];
    if(empty($_POST['category'])){
        $category_error = 'please specify a category';
    }
    else{
        $category = $_POST['category'];
    }
    
    
    
    
    if(empty($_POST['venue'])){
        $venue_error = 'venue is required';
    }
    else{
        $venue = testdata($_POST['venue']);
    }
    
    if(empty($_POST['ename'])){
        $ename_error = 'event name is required';
    }
    else{
        $ename = testdata($_POST['ename']);
    }
    
    if(empty($_POST['date'])){
        $date_error = 'date is required';
    }
    else{
        $date = $_POST['date'];
    }
    
    if(empty($_POST['starttime']) or empty($_POST['starthour'])){
        $stimeerror = 'please specify the start time correctly';
    }
    else{
        $starttime = $_POST['starttime'].' '.$_POST['starthour'];
    }
    
     if(empty($_POST['endtime']) or empty($_POST['endhour'])){
        $etimeerror = 'please specify the end time correctly';
    }
    else{
        $endtime = $_POST['endtime'].' '.$_POST['endhour'];
    }
    
    if(empty($_POST['desc'])){
        $desc_error = 'description is required';
    }
    else{
        $desc = testdata($_POST['desc']);
    }
    
    
    if($_FILES['image']['size'] == 0 and !$_FILES['image']['error'] == 0){
        $image_error = 'image is required';
    }
    else{
        
        $image = addslashes($_FILES['image']['tmp_name']);
        $img_name = addslashes($_FILES['image']['name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
    }
    
    
    
    if($category_error =='' and $venue_error == '' and $ename_error == '' and $date_error == '' and $stimeerror == '' and $etimeerror == '' and $desc_error == '' and $image_error == ''){
        
        update_event($venue,$ename,$date,$starttime,$endtime,$desc,$image,$img_name,$category,$id);
        unset($_POST['submit']);
        $_SESSION['type']='update';
        header('location: add_event_success.php');
    }
}

?>