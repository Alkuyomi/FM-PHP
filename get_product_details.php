<?php



if(isset($_POST["id"])){
	 
	$response = array();
	
      
 require_once __DIR__ . '/db_config.php';

        // Create connection
        $conn = new mysqli(DB_SERVER, DB_USER,DB_PASSWORD ,DB_DATABASE);

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       } 
		mysqli_query($conn , "SET NAMES utf8");
    $id = $_POST["id"] ;

		$result=mysqli_query($conn , "SELECT * FROM `product` WHERE prod_id = $id");

		if(mysqli_num_rows($result) > 0 ){

			$response["products"]=array();
			while($row = mysqli_fetch_array($result)){

				$product = array();

				$product["title"] = $row["prod_title"];
				$product["price"] = $row["prod_price"];
				$product["stock"] = $row["prod_stock"];
				$product["type" ] = $row["prod_type" ];




				array_push($response["products"], $product);
			}

			$response['value']=1;

		}else{
			$response['value']=0;
		}



}else{
	$response['value']=-1;
}

echo json_encode($response);
?>
