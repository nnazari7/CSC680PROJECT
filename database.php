<?php
    require_once('db_credentials.php');
    
    function db_connect($db_name){
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, $db_name);
        return $connection;
    }
    
    function db_disconnect($connection){
        if(isset($connection)){
            mysqli_close($connection);
        }
    }
?>