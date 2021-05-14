<?php
include '_sqlconn.php';

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

  if($_SESSION['perm']=='false'){
  		echo "<script>

	alert ('Usuário sem permissão!');
	window.history.back();

	</script>";
  }
 
$logado = $_SESSION['nome'];



 ?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Login | Alfatec Vistorias</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <?php include_once("_header-default.php"); ?>
  
</head>
<body>
<div id="load_screen"><div id="loading"></div></div>
<div id="app" style="margin-bottom: -200px">
	<v-layout justify-center column fill-height>
		<v-flex >
		  <v-app id="inspire" style='padding-top: 13%' >
		    <v-card
		      class="mx-auto elevation-5"
		      width="400"
		    >
		      <v-card-title class="title font-weight-regular justify-space-between">
		        <span>{{ Title }}</span>
		        <!-- <span>senha: {{pass}}</span>
		        <span>senha: {{passconfirm}}</span>
		        <span>confirm: {{confirm}}</span> -->
		      </v-card-title>
		  
		     <v-form action="_caduser.php" method="post" autocomplete="off">
		          <v-card-text>
		          	<v-layout justify-center row >
					  	<v-flex xs9 sm6 md6>
					        <v-text-field
								autocomplete='off'	
								name='nome'
								v-model='nome'
								prepend-icon='fas fa-user fa-lg'
								label="Nome de Usuário"
								:rules="[(v) => v && v.length >= 4 || 'Mínimo de 4 caracteres']"
					        ></v-text-field>
					    </v-flex>
					  </v-layout>
					<v-layout justify-center row >
					  	<v-flex xs9 sm6 md6>
					        <v-text-field
								autocomplete='off'	
								name='login'
								v-model='login'
								prepend-icon='fas fa-user fa-lg'
								label="Login"
								:rules="[(v) => v && v.length >= 4 || 'Mínimo de 4 caracteres']"
					        ></v-text-field>
					    </v-flex>
					  </v-layout>
					  <v-layout justify-center row >
					  	<v-flex xs9 sm6 md6>
					      <v-text-field    
					        type='password'
					        name="pass"
					        v-model='pass'
					        prepend-icon='fas fa-lock fa-lg'
					        label="Senha"
					        class="input-group--focused"
					        @keyup='passesconfirm'
					        :rules="[(v) => v && v.length >= 6 || 'Mínimo de 6 caracteres']"
					      ></v-text-field>
					    </v-flex>
					</v-layout>
					<v-layout justify-center row >
					  	<v-flex xs9 sm6 md6>
					      <v-text-field
					        name="passconfirm"
					        v-model='passconfirm'
					        :color="confirm ? 'red':'blue darken-1' "
					        type='password'
					        :prepend-icon="confirm ? 'fas fa-times' : 'fas fa-check'"
					        label="Confirmar Senha"
					        class="input-group--focused"
					        @keyup='passesconfirm'
					      ></v-text-field>
					    </v-flex>
					</v-layout>
					<v-layout justify-center row >
					  	<v-flex xs9 sm6 md6>
					      <v-checkbox
					      	type='checkbox'
					        label="Administrador"
					        v-model="checkbox"
					        color="blue darken-1"
					        name='perm'
					      ></v-checkbox>
					    </v-flex>
					</v-layout>
		          </v-card-text>

		  
		      <v-divider></v-divider>
		  
		      <v-card-actions>
		        <v-btn
		          text
		          @click='back'
		        >
		          Voltar
		        </v-btn>		      	
		      <v-spacer></v-spacer>

		        
		        <v-btn
		          :disabled='!nome || !login || !pass || !passconfirm || pass != passconfirm'
		          color="error"
		          depressed
		          type='submit'
		        >
		          Registrar
		        </v-btn>
		      </v-card-actions>
		    </v-card>
		    </v-form>
		  </v-app>
		<v-flex>
  </v-layout>
</div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
<script>
new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data: () => ({
	show2: false,
	confirm: false,
	valid: false,
    Title: 'Cadastrar Usuário',
    login: '',
    nome: '',
    pass: '',
    passconfirm:'',
    checkbox: false,
   
  }),

  computed: {
  },

  methods: {
  	      clear () {
        this.login = '',
        this.pass = ''
      },
      passesconfirm(){
      	if(this.passconfirm==''){
      		this.confirm = false
      	}else if(this.pass!=this.passconfirm){
      	this.confirm = true
       	}else{this.confirm = false}
      },
      valido(){
      	return true
      },
      back(){
      	goback()
      	function goback(){
      	window.history.back();
      }
      }
  }

})


</script>
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
  <?php include_once("_footer-default.php"); ?>
  
</body>
</html>