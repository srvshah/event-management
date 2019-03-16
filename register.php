<?php 
require_once 'functions/database_functions.php';

$fname = $lname = $email = $password = $age = '';
$fname_error = $lname_error = $password_error =$age_error = $chkbox_error = $email_error='';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['role'])){
        $role = $_POST['role'];
    }
    
    if(empty($_POST['fname'])){
        $fname_error = 'first name is required';
    }
    else{
        $fname = testdata($_POST['fname']);
    
        if(!preg_match('/^[a-zA-Z]+$/',$fname)){
            $fname_error = 'first name should only contain alphabets';
        }
    }
    
    if(empty($_POST['lname'])){
        $lname_error = 'last name is required';
    }
    else{
        $lname = testdata($_POST['lname']);
        
        if(!preg_match('/^[a-zA-Z]+$/',$lname)){
            $lname_error = 'last name should only contain alphabets';
        }
    }
    
    if(empty($_POST['email'])){
        $email_error = 'email is required';
    }
    else{
        $email = testdata($_POST['email']);
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_error = 'email not valid';
        }
    }
    
    if(empty($_POST['pwd'])){
        $password_error = 'password is required';
    }
    else{
        if($_POST['pwd'] != $_POST['pwd2']){
            $password_error = 'two passwords do not match';
        }
        else if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?!.*[^a-zA-Z0-9~!@#$%^&*()_+?<>{}[]\/|])(.{8,})$/',$_POST['pwd'])){
            $password_error = 'password must contain at least 1 capital letter,<br>1 number, 1 sepecial character and 8 characters long';
        } 
        else{
            $password = md5(testdata($_POST['pwd']));            
        }
    }
    
    if(empty($_POST['age'])){
        $age_error = 'age is required';
    }
    else{
        $age = $_POST['age'];
    }
    
    if(!isset($_POST['chkbox'])){
        $chkbox_error = 'please accept the terms and conditions to continue';
    }
    
    
    if($fname_error == '' && $lname_error == '' && $password_error == '' && $age_error == '' && $chkbox_error == '' &&  $email_error==''){
        
        if(isset($role)){
            $sql = "INSERT INTO user (firstname, lastname, email, password, age, role) values ('$fname','$lname','$email','$password','$age','$role')";
            unset($_POST['submit']);
            $conn = db_connect();
            mysqli_query($conn,$sql);    

            header('location: add_user_success.php');
            
            
        }
        else {
            $sql = "INSERT INTO user (firstname, lastname, email, password, age) values ('$fname','$lname','$email','$password','$age')";
            unset($_POST['submit']);
            $conn = db_connect();
            mysqli_query($conn,$sql);    

            header('location: register_success.php');
            
            
        }
    
    
    
}
   
    
}
  
?>