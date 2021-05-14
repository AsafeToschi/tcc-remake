<?php

include '_sqlconn.php';

$id = $_POST['id']; 
$status = $_POST['status'];
$tabela = $_POST['tabela'];

$sql = "UPDATE ".$tabela." SET status='".$status."' WHERE id=".$id;

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
   // header("location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>