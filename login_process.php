<?php 
include 'functions/database_functions.php';

$email = $password = '';
$email_error = $password_error = $login_error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    
    if(empty($_POST['email'])){
        $email_error = 'email required';
    }
    else{
        $email = testdata($_POST['email']);
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_error = 'email not valid';
        }
    }
    
       
    if(empty($_POST['pwd'])){
        $password_error = 'password required';
    }
    else{
       
        $password = md5(testdata($_POST['pwd']));            
    }
    
    
    if($email_error == '' and $password_error == ''){
        
            $qry = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
            $conn = db_connect();
            $results = mysqli_query($conn, $qry);
        
            if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['role'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				
				header('location: admin_area.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: member_area.php');
			}
		}else {
			$login_error = 'Wrong username/password combination';
		}
    }
    
    
    
    
}

?>






















