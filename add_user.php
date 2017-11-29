<?php

//require_once __DIR__ . '/db_connect.php';
$response = array();

if(isset($_POST['name'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];

	//$db = new DB_CONNECT();

	 require_once __DIR__ . '/db_config.php';

  

        // Create connection
        $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD , DB_DATABASE);

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       } 
  
        

	mysqli_query( $conn ,"SET NAMES utf8");

	$result = mysqli_query( $conn , "INSERT INTO users(`name`,`email`,`mobile`,`password`) VALUES ('$name','$email','$mobile','$password')");
	

	if($result){
		$response['value']=1;

	}else{
		$response['value']=0;
	}
}else{
	$response['value']=-1;
	
}


echo json_encode($response);

?>