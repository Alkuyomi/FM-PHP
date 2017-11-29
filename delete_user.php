<?php


$response = array();

if(isset($_POST['id'])){

  $id = $_POST['id'] ;




 require_once __DIR__ . '/db_config.php';

        // Create connection
        $conn = new mysqli(DB_SERVER, DB_USER,DB_PASSWORD ,DB_DATABASE);

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }

  $query =   "delete from users
where id = '$id'
limit 1" ;

  mysqli_query($conn , "SET NAMES utf8");

	$result = mysqli_query($conn , $query);


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
