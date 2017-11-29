<?php

require_once __DIR__ . '/db_connect.php';
$response = array();

      
 require_once __DIR__ . '/db_config.php';

        // Create connection
        $conn = new mysqli(DB_SERVER, DB_USER,DB_PASSWORD ,DB_DATABASE);

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       } 
	mysqli_query($conn , "SET NAMES utf8");


	$result=mysqli_query($conn , "SELECT invoice_id , invoice_name FROM `invoice`");
	if(mysqli_num_rows($result) > 0 ){

		$response["invoices"]=array();

		while($row = mysqli_fetch_array($result)){
			$invoice = array();

			$invoice["name"] = $row["invoice_name"];
            $invoice["id"  ] = $row["invoice_id"  ];


			array_push($response["invoices"], $invoice);
		}

		$response['value']=1;

	}else{
		$response['value']=0;
	}

echo json_encode($response);

?>
