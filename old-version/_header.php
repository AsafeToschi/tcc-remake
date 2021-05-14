<div id="load_screen"><div id="loading"></div></div>
<?php
if(isset($_GET['id']) == 1){
  unset ($_SESSION['nome']);
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  session_destroy();
  echo "<script>window.history.back();</script>";
}
date_default_timezone_set('America/Sao_Paulo');
?>



<?php
    include '_sqlconn.php';
    $hj2 = date('Y/m/d');
    $hj = strtotime(date('Y/m/d'));
    $querynot = "SELECT descricao, valor, categoria, vencimento,  'contarecebimento' as tabela  FROM contarecebimento WHERE status = 'false' and vencimento <= '".date('Y/m/d')."' UNION SELECT  descricao, valor, categoria, vencimento,  'despesa' as tabela  FROM despesa WHERE status = 'false' and vencimento <= '".date('Y/m/d')."' ";
    $dadosnot = $conn->query($querynot);
    $se = 1;
    $numero_avisos= mysqli_num_rows($dadosnot);
?>

<div class="header">
  <a href="#" class="nav-trigger">
    </i><i class="fas fa-bars"></i>
  </a>
  <div class="logo">
    <span><img src="images/alfatec-logo.png"></span>
  </div>
  <div class="text-sm-right">
    <span>
      <?php echo " Olá, ".$_SESSION['nome']; ?> 
    </span>
    <!-- notificações -->
    <v-menu class="btn-notificacoes"  bottom left v-model="notificacoes" transition="slide-y-transition" <?php if ($numero_avisos == 0){ echo "disabled onclick='alerta()' style='cursor:pointer;'";}?> :close-on-content-click="false" >
      <v-btn <?php if ($numero_avisos != 0){ echo " style='margin-left:20px;'";}?>
        slot="activator" text dark icon>
        <?php if ($numero_avisos != 0){ echo "
        <v-badge left>
          <span slot='badge'>".$numero_avisos."</span> ";}?><!-- Contar o numero de avisos e colocar AQUI!! -->
          <v-icon>
            notifications
          </v-icon>
        <?php if ($numero_avisos != 0){ echo "</v-badge>";}?>

      </v-btn>

      <v-card class="v_menu_header alert">
        <!-- /// Não retirar - botão 'close' /// --> 
        <span style="position: absolute; top: 5px;left: 10px;">Você tem <b><?php echo $numero_avisos; ?></b> avisos.</span>
        <span style="position: absolute; top: 5px;right: 50px;">Atualizado em: <?php echo date('d/m/Y H:i'); ?></span>
        <v-btn class="close_header_icon" icon small text @click="notificacoes = false"><i class="fas fa-times"></i> </v-btn>
        <div class="notificacoes-container">

        <?php
        while($not = mysqli_fetch_assoc($dadosnot)){
          if(date('Y/m/d',$hj)==date('Y/m/d',strtotime($not['vencimento']))){

            echo "
            <v-alert
            :value='true'
            type='warning'
            outline
          >
            <div class='alerta-hj'>
              <div class='alerta-hj-msg'>
                <span>
            ";

          }else{
              echo "

              <v-alert
            :value='true'
            type='error'
            outline
          >
            <div class='alerta-atrasado'>
              <div class='alerta-atrasado-msg'>
                <span>
";
}
                  $tabela = $not['tabela'];
                    if ($tabela == "contarecebimento"){ 
                        if(date('Y/m/d',$hj)==date('Y/m/d',strtotime($not['vencimento']))){
                          echo "<b>O recebimento deverá ser feito hoje!</b> ";
                        }else{
                          echo "<b>O recebimento está ATRASADO!</b> ";
                        }
                    } elseif($tabela == "despesa"){
                      if(date('Y/m/d',$hj)==date('Y/m/d',strtotime($not['vencimento']))){
                         echo "<b>A conta deverá ser paga hoje!</b>";
                      }else{
                        echo "<b>A conta está ATRASADA!</b>";
                      }
                    }
                    $valor = number_format($not['valor'], 2, ',', '.');
echo "
                </span>
              </div> 
              <div class='row'> 
                <div class='col-md-6' style='padding:5px 5px 5px 15px;'><b>Valor:</b> R$ ".$valor."</div>
                <div class='col-md-6' style='padding:5px 5px 5px 15px;'><b>Vencimento:</b> ".date('d/m/Y',strtotime($not['vencimento']))."</div>
                <div class='col-md-12' style='padding:5px 5px 5px 15px;'><b>Categoria:</b> ".$not['categoria']."</div>
                <div class='col-md-12' style='padding:5px 5px 5px 15px;'><b>Descrição:</b> ".$not['descricao']."</div> 
              </div>
            </div>
          </v-alert>

              ";

            $se++;
        }
        ?>

          
        </div>
      </v-card>
    </v-menu>
    <!-- logoff - criar usuários -->
    <v-menu bottom left v-model="menu" transition="slide-y-transition" :close-on-content-click="false">
      <v-btn
        slot="activator" text dark icon>
        <v-icon >more_vert</v-icon>
      </v-btn>

      <v-card class="v_menu_header">
        <!-- /// Não retirar - botão 'close' /// -->
        <v-btn class="close_header_icon" icon small text @click="menu = false"><i class="fas fa-times"></i> </v-btn>

        <a href="novousuario.php"><i class="fas fa-user-plus"></i> Criar Usuário</a>
        
        <v-layout row justify-center>
          
          <a  href="javascript:void(0)"
              @click="dialogSair = true">
            <i class="fas fa-power-off"></i> Sair do Sistema
          </a>
          </v-btn> 
      
          <v-dialog
            v-model="dialogSair"
            max-width="350"
          >
            <v-card>
              <v-card-title class="headline">Tem certeza que deseja sair do Sistema?</v-card-title>
              <v-card-actions>
                <v-spacer></v-spacer>
      
                <v-btn
                  color="green darken-1"
                  text="text"
                  @click="dialogSair = false"
                  class="text-xs-left"
                >
                  Voltar
                </v-btn>
                <form action="?id=1" method="post">
                  <v-btn
                  type="submit"
                  color="red darken-1"
                  text="text"
                  @click="dialogSair = false"
                  >
                    Sair do Sistema
                  </v-btn>
                </form>
                
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-layout>
      </v-card>
    </v-menu>
  </div>  

</div>

<?php include_once("_side-nav.php"); ?>

<script> 
function alerta(){
  alert("Você não possui notificações")
}
</script>