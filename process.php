<?php


echo print_r($_POST);

$conn = new mysqli("localhost","root", "", "ecmmerce");

// B
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// A
$name = $_POST["name"];
$itemcode = $_POST["itemcode"];

$sql = "INSERT INTO Product (name, itemcode) VALUES ('$name', '$itemcode')";
if($conn->query($sql)){
    echo "Inserted...";
}



?>