
<?php include '_sessionverif.php' ?>
<?php

if($_GET['id'] == 1){

	session_start();
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	session_destroy();
	echo "<script>

	alert ('Usuário Desconectado! ');
	window.history.back();

	</script>";
}
?>
<form action="?id=1" method="post">
	<button type="submit">
		Log Off
	</button>
</form>


<div id='box'>
	<form method="post" action="_caduser.php">
		<fieldset>
		Insira um nome de usuário <br> <input autocomplete="off" type="text" name="user" required <br> <br> <br>
		Insira uma senha senha <br><input autocomplete="off" type="password" name="pass" id="pass" onkeyup="PassVerif()" required> <br> 
		Confirme sua senha <br><input autocomplete="off" type="password" name="passverif" id="passverif" onkeyup="PassVerif()" required> <br> <p id="dvaviso" style="display: none;color: red">*As senhas devem ser iguais</p> <br> <br>
		<input type="submit" name="btnsend" id="sbtbtn" disabled> 
	
	</fieldset>
	</form>
</div>

<script type="text/javascript">
	function PassVerif(){


		if (document.getElementById("pass").value != document.getElementById("passverif").value){
			document.getElementById("sbtbtn").disabled = true;
			document.getElementById("dvaviso").style.display = "initial" ;
		}else{
			document.getElementById("sbtbtn").disabled = false;
			document.getElementById("dvaviso").style.display = "none";
		}
		return;
	}
</script>

<style>
#box{
	margin-top: 20%;
	width:100%;
	text-align: center;
}


</style>
<script src=’https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js’ type=’text/javascript’/>
<script src=’https://jquery.gocache.net/jquery-1.4.3.min.js’ type=’text/javascript’/>
