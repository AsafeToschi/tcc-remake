<?php

include '_sqlconn.php';

$descricao = $_POST['descricao'];
$valor = str_replace(",", ".", $_POST['valor']);
$crtdate = date('Y/m/d');
$vencimento = $_POST['vencimento'];
$categoria = $_POST['categoria'];
$tabela = $_POST['tabela'];

$sql = "INSERT INTO ".$tabela." (vencimento,descricao, valor ,categoria, crtdate, status )
VALUES ('".$vencimento."','".$descricao."','".$valor."','".$categoria."','".$crtdate."','false')";

if ($conn->query($sql) === TRUE) {
    if($tabela=='contarecebimento'){
   		 header("location: index.php");
    }else if($tabela=='despesa'){
   		 header("location: despesas-fixas.php");
    }else{
   		 header("location: despesas-variaveis.php");
   		}
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();


?>