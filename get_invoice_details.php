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

		$result=mysqli_query($conn , "SELECT * FROM `invoice` WHERE invoice_id = $id");

		if(mysqli_num_rows($result) > 0 ){

			$response["invoices"]=array();

			while($row = mysqli_fetch_array($result)){

				$invoice = array();

				$invoice["company"]=$row["company_name"  ];
				$invoice["data"]   =$row["invoice_data"  ];
				$invoice["time"]   =$row["invoice_time"  ];
				$invoice["number"] =$row["invoice_number"];
				$invoice["type"]   =$row["invoice_type"  ];
				$invoice["amount"] =$row["invoice_amount"];
				$invoice["name"]   =$row["invoice_name"  ];
				$invoice["total"]  =$row["invoice_total" ];



				array_push($response["invoices"], $invoice);
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
