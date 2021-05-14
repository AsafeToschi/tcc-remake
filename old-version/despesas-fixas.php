<?php include_once("_sessionverif.php"); ?>
<?php 
$pagina = "caixa";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Painel Administrativo | Alfatec Vistorias</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <?php include_once("_header-default.php"); ?>

</head>
<body>
  
  <div id="app">
    <v-app id="inspire">
      <?php include_once("_header.php"); ?>
  
      <div class="main-content" id="contas">

        <div class="container-fluid">
          <div class="row contas">
            <div id="tabs">
              <ul>
                <li class="tabela-nav"><a href="index.php">Recebimento</a></li>
                <li class="tabela-nav"><span>Despesas</span></li>
              </ul>
             <div id="app">
                <v-app id="inspire">
                  <div class="elevation-1">
                    <v-toolbar text color="white">
                        <v-dialog v-model="dialog1" max-width="600px">
                        <v-btn slot="activator" color="primary" dark class="mb-2">Adicionar Receita</v-btn>
                        <v-card>
                          <v-card-title>
                            <span class="headline">Novo Item</span>
                          </v-card-title>
                          <form action="_novaconta.php" method="post" autocomplete="off">
                          <v-card-text>
                            <v-container grid-list-md>
                              <v-layout wrap>
                                <v-flex xs12 sm6 md4>
                                  <v-menu
                                    ref="datapicker"
                                    :close-on-content-click="false"
                                    v-model="datapicker"
                                    :nudge-right="40"
                                    :return-value.sync="date"
                                    transition="scale-transition"
                                    offset-y
                                  >
                                    <v-text-field
                                      name='vencimento'
                                      required
                                      v-model="datanovo"
                                      label="Vencimento"
                                      slot="activator"
                                      readonly="readonly"
                                    ></v-text-field>
                                    <v-date-picker v-model="datanovo" locale="pt-br" @input="$refs.datapicker.save(date)"></v-date-picker>
                                  </v-menu>
                                  <v-text-field name='tabela' value='despesa' style='display: none'></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm6 md4>
                                  <v-text-field name='valor' onkeypress="return Onlynumbers(event)" required label="Valor"></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm6 md4>
                                  <v-text-field name='categoria' required label="Categoria"></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm12 md12>
                                  <v-textarea
                                    rows="1"
                                    auto-grow
                                    name="descricao"
                                    v-model="editedItem.descricao"
                                    label="Descrição"
                                    onkeypress="return enterNone(event)"
                                  ></v-textarea>
                                </v-flex>
                              </v-layout>
                            </v-container>
                          </v-card-text>
                
                          <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" text @click="dialog1 = false">Cancelar</v-btn>
                            <v-btn color="blue darken-1" text type='submit'>Salvar</v-btn>
                          </v-card-actions>
                        </v-card>
                        </form>
                      </v-dialog>
                      <v-dialog v-model="dialog" max-width="500px">
                        <v-card>
                          <v-card-title>
                            <span class="headline">{{ formTitle }}</span>
                          </v-card-title>
                          <form action="_alteraconta.php" method="post" autocomplete="off">
                          <v-card-text>
                            <v-container grid-list-md>
                              <v-layout wrap>
                                <v-flex xs12 sm6 md4 style='display: none;'>
                                  <v-text-field name='id'  v-model="editedItem.id" label="ID"></v-text-field>
                                  <v-text-field name='tabela' value='despesa' ></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm6 md4>
                                  <v-menu
                                    ref="datapicker2"
                                    :close-on-content-click="false"
                                    v-model="datapicker2"
                                    :nudge-right="40"
                                    :return-value.sync="date"
                                    transition="scale-transition"
                                    offset-y
                                  >
                                    <v-text-field
                                      name='vencimento'
                                      required
                                      v-model="editedItem.vencimentoref"
                                      label="Vencimento"
                                      slot="activator"
                                      readonly="readonly"
                                    ></v-text-field>
                                    <v-date-picker v-model="editedItem.vencimentoref" locale="pt-br" @input="$refs.datapicker2.save(date)"></v-date-picker>
                                </v-flex>
                                <v-flex xs12 sm6 md4>
                                  <v-text-field  name='valor' required onkeypress="return Onlynumbers(event)" v-model="editedItem.valor" label="Valor"></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm6 md4>
                                  <v-text-field  name='categoria' v-model="editedItem.categoria" label="Categoria"></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm12 md12>
                                  <v-textarea
                                    rows="1"
                                    auto-grow
                                    name="descricao"
                                    v-model="editedItem.descricaoref"
                                    label="Descrição"
                                    onkeypress="return enterNone(event)"
                                  ></v-textarea>
                                </v-flex>
                              </v-layout>
                            </v-container>
                          </v-card-text>
                
                          <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" text @click.native="close">Cancelar</v-btn>
                            <v-btn color="blue darken-1" text  type='submit'>Salvar</v-btn>
                          </v-card-actions>
                        </v-card>
                        </form>
                      </v-dialog>
                      <v-spacer></v-spacer>
                      <v-text-field
                        v-model="search"
                        append-icon="search"
                        label="Procurar"
                        single-line
                        hide-details
                      ></v-text-field>
                    </v-toolbar>
                    <v-data-table
                      :headers="headers"
                      :items="contarecebimento"
                      :footer-props.items-per-page-options="footerProps"
                      footer-props.items-per-page-text="Linhas por página"
                      no-results-text="Nenhum resultado encontrado"
                      :items="contarecebimento"
                      :search="search"
                      item-key="id"
                      :options.sync="options"
                    >
                      <template slot="items" slot-scope="props">
                        
                        <td :class='props.item.status'><v-switch v-model='props.item.pago' color='blue accent-2' @click.native="AlteraStatus(props.item)"></v-switch></td>
                        <td>{{ props.item.num }}</td>
                        <td>{{ props.item.vencimento }}</td>
                        <td><span v-html="props.item.descricao"></td>
                        <td>R$ {{ props.item.valor }}</td>
                        <td><span v-html="props.item.categoria"></td>
                        <td class="justify-center layout px-0">
                          <v-icon
                            small
                            class="mr-2"
                            @click="editItem(props.item)"
                          >
                            edit
                          </v-icon>
                          <v-icon
                            small
                            @click="deleteItem(props.item)"
                          >
                            delete
                          </v-icon>
                        </td>
                      </template>
                      <template slot="pageText" slot-scope="item">
                        {{item.pageStart}} - {{item.pageStop}} de {{item.itemsLength}}
                      </template>
                    </v-data-table>
                  </div>
                </v-app>
              </div>
            </div>
          </div>
        </div>
      </div>
    </v-app>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>

<?php
include '_sqlconn.php';
$query = "SELECT * FROM despesa";
$dados = $conn->query($query);

echo "
<script>
function Onlynumbers(e)
  {
    var tecla=new Number();
    if(window.event) {
      tecla = e.keyCode;
    }
    else if(e.which) {
      tecla = e.which;
    }
    else {
      return true;
    }
    if((tecla >= '48') && (tecla <= '57') || (tecla == 46) || (tecla == 44)){
      return true;
    }else{
      return false;
    }
  }
  function enterNone(e)
  {
    var tecla=new String();
    if(window.event) {
      tecla = e.keyCode;
    }
    else if(e.which) {
      tecla = e.which;
    }
    else {
      return true;
    }
    if(tecla == 13){
      return false;
    }
  }
 new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      data: () => ({
        footerProps: {'items-per-page-options': [5, 10, 25, 50]},
        options: {
          rowsPerPage: 10,
          descending: true
        },
        datapicker: false,
        menu: false,
        notificacoes: false,
        dialogSair: false,
        datapicker2: false,
        datanovo: '',
        date:'',
        search: '',
        dialog: false,
        dialog1: false,
        headers: [
          { text: 'Pago?',
            value: 'pago',
            sortable: false},
          {
            text: 'ID',
            align: 'left',
            value: 'num'
          },
          { text: 'Vencimento', value: 'vencimentoref' },
          { text: 'Descrição', value: 'descricao' },
          { text: 'Valor', value: 'valor' },
          { text: 'Categoria', value: 'categoria' },
          { text: 'Ações', value: 'name', sortable: false }
        ],
        contarecebimento: [],
        statusconta: '',
        editedIndex: -1,
        editedItem: {
          name: '',
        },
        defaultItem: {
          name: '',
        },

      }),

      computed: {
        formTitle () {
          return this.editedIndex === -1 ? 'Novo Item' : 'Editar Item'
        }
      },

      watch: {
        dialog (val) {
          val || this.close()
        }
      },

      created () {
        this.initialize()
      },

      methods: {
        initialize () {
          this.contarecebimento = [
            ";
      $i = 1;
      while($row = mysqli_fetch_assoc($dados)){
        $status = $row['status'];
        $vencimento =  strtotime($row['vencimento']);
        $vencimento2 =  date('Y/m/d',strtotime($row['vencimento']));
        $difdate = (strtotime($hj2) - $vencimento);
        if ($status == 'true'){
          if($hj > $vencimento){
            echo "
              {
              status: 'paga',
              statusref: 'atrasada',";
          }elseif(date('Y/m/d',$hj)==date('Y/m/d',$vencimento)){
            echo "
              {
              status: 'paga',
              statusref: 'hj',";
            }else{
            echo "
              {
              status: 'paga',
              statusref: 'default',";             
            }
        }else{
          if($hj > $vencimento){
          echo "
            {
            status: 'atrasada',
            statusref: 'atrasada',";
          }elseif(date('Y/m/d',$hj)==date('Y/m/d',$vencimento)){
          echo "
            {
            status: 'hj',
            statusref: 'hj',";
          }else{
          echo "
            {
            status: 'default',
            statusref: 'default',";
          }
        }

          echo "
          pago: ".$status.",
          id: '".$row['id']."',
          num: '".$row['id']."',
          vencimento: '".date('d/m/Y', $vencimento)."',
          vencimentoref: '".$row['vencimento']."',";

          if($row['descricao']==''){
            echo "
            descricao: '<i>Sem Descrição</i>',
            descricaoref: '',";
          }else{
            echo "
          descricao: '".$row['descricao']."',
          descricaoref: '".$row['descricao']."',
            ";
          }

          echo "
          valor: '".number_format($row['valor'],2,",",".")."',
          categoria: '".$row['categoria']."'
        },
        ";
        $i++;
      }

echo "
          ]
          this.statusconta = 1
        },

        editItem (item) {
          this.editedIndex = this.contarecebimento.indexOf(item)
          this.editedItem = Object.assign({}, item)
          this.dialog = true
        },

        deleteItem (item) {

                const index = this.contarecebimento.indexOf(item)
                r = confirm('Você tem certeza que deseja deletar esse item?') && this.contarecebimento.splice(index, 1)

                if (r!=false){
                excluir();
              }
                    

                  function excluir(){

                  var exdata = {
                    id : item.id ,
                    vencimento : item.vencimento,
                    tabela: 'despesa'
                  }

                  $.ajax({
                        method: 'post',
                        url: '_excluir.php',
                        data: exdata,
                        dataType: 'json',
                        encode: true

              });
            }



        },


        close () {
          this.dialog = false
          setTimeout(() => {
            this.editedItem = Object.assign({}, this.defaultItem)
            this.editedIndex = -1
          }, 300)
        },

        save () {
          if (this.editedIndex > -1) {
            Object.assign(this.contarecebimento[this.editedIndex], this.editedItem)
          } else {
            this.contarecebimento.push(this.editedItem)
          }
          this.close()
        },



        AlteraStatus (item){
          var statusnew = item.pago
          if(statusnew == true){
            item.status = 'paga'
            item.status = 'paga'
            item.status = 'paga'
            item.status = 'paga'
          }else{
            item.status = item.statusref
            item.status = item.statusref
            item.status = item.statusref
            item.status = item.statusref
          }
          altstatus()
            function altstatus(){

              var altdata = {
                    id : item.id ,
                    status : item.pago,
                    tabela: 'despesa'
                  }

                $.ajax({
                    method: 'post',
                    url: '_alterastatus.php',
                    data: altdata,
                    dataType: 'json',
                    encode: true

              });
            }
        }

      }
    })
</script>
";
?>
  <?php include_once("_footer-default.php"); ?>
  
</body>
</html>