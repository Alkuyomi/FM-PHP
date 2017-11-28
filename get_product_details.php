<?php



if(isset($_POST["id"])){
	require_once __DIR__ . '/db_connect.php';
	$response = array();
	$db = new DB_CONNECT();

		mysql_query("SET NAMES utf8");
    $id = $_POST["id"] ;

		$result=mysql_query("SELECT * FROM `product` WHERE prod_id = $id");

		if(mysql_num_rows($result) > 0 ){

			$response["products"]=array();
			while($row = mysql_fetch_array($result)){

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
