<?php


$response = array();

if(isset($_POST['company'])){

	$company = $_POST['company'] ;
	$data    = $_POST['data'   ] ;
	$time    = $_POST['time'   ] ;
	$number  = $_POST['number' ] ;
	$type    = $_POST['type'   ] ;
	$amount  = $_POST['amount' ] ;
	$name    = $_POST['name'   ] ;
	$total   = $_POST['total'  ] ;

      
 require_once __DIR__ . '/db_config.php';

        // Create connection
        $conn = new mysqli(DB_SERVER, DB_USER,DB_PASSWORD ,DB_DATABASE);

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }

	mysqli_query($conn ,"SET NAMES utf8");
	$result=mysqli_query($conn ,"INSERT INTO invoice(`company_name`,`invoice_data`,`invoice_time`,
		                                      `invoice_number`,`invoice_type`,`invoice_amount`,
																					`invoice_name`,`invoice_total`)
																					VALUES ( '$company','$data','$time','$number',
																						       '$type','$amount','$name','$total')");
	

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
