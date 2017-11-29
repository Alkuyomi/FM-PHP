<?php


$response = array();


 
if(isset($_POST['name'])){

	$name     = $_POST['name'] ;
	$password = $_POST['password'];

    $response['name'] =$_POST['name'] ;
     $response['password'] =$_POST['password'] ;

      
 require_once __DIR__ . '/db_config.php';

        // Create connection
        $conn = new mysqli(DB_SERVER, DB_USER,DB_PASSWORD ,DB_DATABASE);

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       } 
  

     mysqli_query($conn , "SET NAMES utf8");
	$result  =  mysqli_query( $conn , "SELECT * FROM users WHERE name = '$name' AND password = '$password' ");
	

	if(mysqli_num_rows($result) > 0 ){

		$response['value']=1;

    $row = mysqli_fetch_array($result);

    $response['admin']= $row["admin"];

	}else{
		$response['value']=0;
		$response['rows']=mysqli_num_rows($result);
	}

}else{
$response['value']=-1;

}

echo json_encode($response);

?>

