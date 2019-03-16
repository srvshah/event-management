<?php 

function db_connect(){
    $conn = mysqli_connect("localhost", "saurabbi_admin", "saurabbi_admin", "saurabbi_event_management");
		if(!$conn){
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		return $conn;
}

function testdata($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
function isMember()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'member' ) {
		return true;
	}else{
		return false;
	}
}


function add_event($venue,$ename,$date,$starttime,$endtime,$desc,$image,$img_name,$category){
    $conn = db_connect();
    $qry = "INSERT INTO event (venue,ename,date,starttime,endtime,description,image,img_name,category_id) values ('$venue','$ename','$date','$starttime','$endtime','$desc','$image','$img_name',$category)";
    
    mysqli_query($conn,$qry);
    
}

function update_event($venue,$ename,$date,$starttime,$endtime,$desc,$image,$img_name,$category,$id){
    $conn = db_connect();
    $qry = "UPDATE event SET 
    
    ename = '$ename',     
    venue = '$venue', 
    date = '$date', 
    starttime = '$starttime',
    endtime = '$endtime',
    description = '$desc',
    image = '$image',
    img_name= '$img_name',
    category_id = $category
    
    WHERE event_id = $id
    
    
    
    ";
    
    mysqli_query($conn,$qry) or die(mysqli_error($conn));
    
}


function search_event($text){
    return "select * from event where ename like '%$text%' ";
}

function search_category($id){
    return "select * from event where category_id = $id ";
    
}

function arrange_category($id){
    return "select * from event order by ename $id";
}


?>

