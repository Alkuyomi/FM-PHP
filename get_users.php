<?php

require_once __DIR__ . '/db_connect.php';
$response = array();
$db = new DB_CONNECT();

	mysql_query("SET NAMES utf8");


	$result=mysql_query("SELECT * FROM `users`");
	if(mysql_num_rows($result) > 0 ){

		$response["users"]=array();

		while($row = mysql_fetch_array($result)){
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
