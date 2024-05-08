<?php

$errorMessage = "";

if(isset($_GET["id"])) {
    $id = intval($_GET["id"]); 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myshop";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    
    if($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "DELETE FROM clients WHERE id=$id";

    if($connection->query($sql) === TRUE) {
        header("location: /myshop/index.php");
        exit;
    } else {
        $errorMessage = "Error deleting record: " . $connection->error;
    }

    
    $connection->close();
} else {
    
    header("location: /myshop/index.php");
    exit;
}
?>
