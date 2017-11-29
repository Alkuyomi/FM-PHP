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
    $id = $_POST["id"] ;

		$result=mysqli_query($conn ,"SELECT * FROM `users` WHERE id = $id");

		if(mysqli_num_rows($result) > 0 ){

			$response["users"]=array();

			while($row = mysqli_fetch_array($result)){

				$user = array();

				$user["name"]=$row["name"  ];
				$user["email"]   =$row["email"  ];
				$user["mobile"]   =$row["mobile"  ];
				$user["password"] =$row["password"];



				array_push($response["users"], $user);
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
