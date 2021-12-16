<?php
require_once "config.php";
function GetData($statement){

// Create connection
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

//define and execute query
    $sql = $statement;
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}