<?php

include '_sqlconn.php';

$id = $_POST['id'];
$vencimento = $_POST['vencimento'];
$tabela = $_POST['tabela'];


$sql = "

DELETE FROM ".$tabela." WHERE id = ".$id."

";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
//    header("location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>