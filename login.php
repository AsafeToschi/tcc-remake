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
		      class="mx-auto"
		      width="400"
		    >
		      <v-card-title class="title font-weight-regular justify-space-between">
		        <span>{{ Title }}</span>
		      </v-card-title>
		  
		     <v-form action="_verif.php" method="post" autocomplete="off">
		          <v-card-text>
			          <v-layout justify-center row >
				          	<v-flex xs9 sm6 md6>
					            <v-text-field
					              autocomplete='off'	
					              name='login'
					              v-model='login'
					              prepend-icon='fas fa-user fa-lg'
					              label="login"
					            ></v-text-field>
					        </v-flex>
					      </v-layout>
					      <v-layout justify-center row >
				          	<v-flex xs9 sm6 md6>
					          <v-text-field
					            :append-icon="show2 ? 'visibility_off' : 'visibility'"
					            :type="show2 ? 'text' : 'password'"
					            name="pass"
					            v-model='pass'
					            prepend-icon='fas fa-lock fa-lg'
					            label="Senha"
					            class="input-group--focused"
					            @click:append="show2 = !show2"
					          ></v-text-field>
					        </v-flex>
				       </v-layout>
		          </v-card-text>

		  
		      <v-divider></v-divider>
		  
		      <v-card-actions>
		      <v-spacer></v-spacer>
		        <v-btn
		          flat
		          @click='clear'
		        >
		          Limpar
		        </v-btn>
		        
		        <v-btn
		          :disabled='!login || !pass'
		          color="error"
		          depressed
		          type='submit'
		        >
		          Login
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
  data: () => ({
	show2: false,
    Title: 'Login',
    login: '',
    pass: ''
   
  }),

  computed: {
  },

  methods: {
  	      clear () {
        this.login = '',
        this.pass = ''
      },
      valido(){
      	return true
      }
  }

})
</script>

  <?php include_once("_footer-default.php"); ?>
  
</body>
</html>