
<?php
    $nameOfServer = 'localhost';
    $userName     = 'root';
    $password     = '';
    $dbName       = 'marksheet';

    $con = new mysqli($nameOfServer, $userName, $password, $dbName);


        // check connections
        
    if($con->connect_error){
        die("Connection Failed:" . $con->connect_error);
    }

    session_start();

?>