<?php

require_once __DIR__ . '/db_connect.php';
$response = array();

if(isset($_POST['id'])){

  $id = $_POST['id'] ;
	$name     = $_POST['name'    ] ;
	$email    = $_POST['email'   ] ;
	$mobile   = $_POST['mobile'  ] ;
	$password = $_POST['password'] ;

	$db = new DB_CONNECT();
  $query =   "UPDATE users
    SET name='$name', email='$email', mobile='$mobile' , password='$password'
    WHERE id='$id' " ;

  mysql_query("SET NAMES utf8");

	$result = mysql_query($query);


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
