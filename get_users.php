<?php


$response = array();


 require_once __DIR__ . '/db_config.php';

        // Create connection
        $conn = new mysqli(DB_SERVER, DB_USER,DB_PASSWORD ,DB_DATABASE);

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }

	mysqli_query($conn ,"SET NAMES utf8");


	$result=mysqli_query($conn , "SELECT * FROM `users`");
	if(mysqli_num_rows($result) > 0 ){

		$response["users"]=array();

		while($row = mysqli_fetch_array($result)){
			$user = array();

			$user["name"] = $row["name"];
      $user["id"  ] = $row["id"  ];


			array_push($response["users"], $user);
		}

		$response['value']=1;

	}else{
		$response['value']=0;
	}

echo json_encode($response);

?>
