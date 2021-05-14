<?php

include '_sqlconn.php';
$id = $_POST['id']; 
$descricao = $_POST['descricao'];
$caracter = array(",",".");
$valor = $_POST['valor'];
$valornovo = str_replace(".", "", $valor);
$valorfinal = str_replace(",", ".", $valornovo);
$vencimento = date('Y/m/d', strtotime($_POST['vencimento']));
$categoria = $_POST['categoria'];
$tabela = $_POST['tabela'];

$sql = "UPDATE ".$tabela." SET vencimento='".$vencimento."', descricao='".$descricao."',valor='".$valorfinal."',categoria='".$categoria."' WHERE id=".$id;

if ($conn->query($sql) === TRUE) {
    if($tabela=='contarecebimento'){
   		 header("location: index.php");
    }elseif($tabela=='despesa'){
   		 header("location: despesas-fixas.php");
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>