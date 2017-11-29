<?php


$response = array();

if(isset($_POST['price'])){

	$price = $_POST['price'] ;
	$type    = $_POST['type'   ] ;
	$stock    = $_POST['stock'   ] ;
	$title  = $_POST['title' ] ;



     require_once __DIR__ . '/db_config.php';

        // Create connection
        $conn = new mysqli(DB_SERVER, DB_USER,DB_PASSWORD ,DB_DATABASE);

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }

	mysqli_query($conn ,"SET NAMES utf8");
	$result=mysqli_query($conn ,"INSERT INTO product(`prod_title`,`prod_price`,`prod_stock`,`prod_type`)
																					   VALUES ( '$title','$price','$stock','$type')");


	if($result){
		$response['value']=1;

	}else{
		$response['value']=0;

		echo mysqli_error($conn);
	}
}else{
	$response['value']=-1;

}
echo json_encode($response);

?>
