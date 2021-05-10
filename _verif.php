<?php 

include '_sqlconn.php';
$login= $_POST['login'];
$pass= md5($_POST['pass']);



//verificacao
$sqlverif = mysqli_query($conn, "SELECT login FROM users WHERE login='".$login."' and password='".$pass."'");
$nome_usuario = mysqli_fetch_assoc($conn->query("SELECT perm, nome_usuario AS nome FROM users WHERE login='".$login."' and password='".$pass."'"));
echo $nome_usuario;
if (mysqli_num_rows($sqlverif)>0){
	echo 'logado <br>';
	session_cache_expire(1);
	session_start();
	$_SESSION['nome'] = $nome_usuario['nome'];
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $pass;
	$_SESSION['perm'] = $nome_usuario['perm'];
	header('location:index.php');
} else{
	session_start();
	unset ($_SESSION['nome']);
	unset ($_SESSION['perm']);
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	session_destroy();
	echo "<script>

	alert ('Login e/ou Senha Incorretos');
	window.history.back();

	</script>";
}

 ?>