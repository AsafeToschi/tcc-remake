<?php 
session_cache_expire(1);
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset ($_SESSION['nome']);
	unset ($_SESSION['perm']);
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
  session_destroy();
  header('location:login.php');
  }
 
$logado = $_SESSION['nome'];
?>
