<?php

class DB_CONNECT{

	function __construct() {
        $this->connect();
    }

    function __destruct() {
        $this->close();
    }

 
    function connect() {
        require_once __DIR__ . '/db_config.php';

  

        // Create connection
        $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD , DB_DATABASE);

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       } 
  
        
        return $conn;
    }

    function close() {
        mysqli_close();
    }
}

?>