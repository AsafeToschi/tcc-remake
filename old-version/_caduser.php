<?php 

include '_sqlconn.php';

$nome= $_POST['nome'];
$login= $_POST['login'];
$pass= md5($_POST['pass']);

if(isset($_POST['perm'])){
$perm= 'true';
}else{$perm='false';}

//verificacao
$sqlverif = mysqli_query($conn, "SELECT login FROM users WHERE login='".$login."'");


$sql = "INSERT INTO users (nome_usuario, login, password, perm)
VALUES ('".$nome."', '".$login."', '".$pass."', '".$perm."')";

if (mysqli_num_rows($sqlverif)>0){
	echo "<script>

	alert ('Usuário já cadastrado');
	window.location.href = 'index.php';

	</script>";
}	else if ($conn->query($sql) === TRUE) {
	echo "<script>

	alert ('Usuário criado com sucesso!');
	window.location.href = 'index.php';

	</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 ?>