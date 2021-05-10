<?php include_once("_sessionverif.php");
$pagina_mãe = "relatorios";
$sub_pagina = "recebimentos";
$pagina_atual = "recebimento_dia";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Painel Administrativo | Alfatec Vistorias</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <?php include_once("_header-default.php"); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
<?php
include '_sqlconn.php';

$hj = strtotime(date('Y/m/d'));
$td = strtotime("-30 days");
$ultimadata='';
$query = "SELECT vencimento from contarecebimento WHERE vencimento > '".date('Y/m/d',$td)."' GROUP BY vencimento ORDER BY vencimento";
$dados = $conn->query($query);
echo "
  <script type='text/javascript'>
      google.charts.load('current', {'packages':['corechart'], 'language': 'pt-BR'});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dias', 'Recebimentos'],
";
        while($row = mysqli_fetch_assoc($dados)){
          $data = date('d/m',strtotime($row['vencimento']));

          $query2 = "SELECT SUM(valor) AS valor FROM contarecebimento WHERE vencimento = '".$row['vencimento']."'  GROUP BY vencimento";
          $dados2 = $conn->query($query2);
          $recibo = mysqli_fetch_assoc($dados2);      
          echo " ['".$data."',  ".$recibo['valor']."], 
          ";   
        }

echo"
        ]);
        var formatter = new google.visualization.NumberFormat(
            {prefix: 'R$ '});
        formatter.format(data, 1);
        var options = {
          fontName: 'Roboto',
          legend: { position: 'top' },
          backgroundColor: { fill:'transparent' },
          hAxis: {
            title: 'Dia',
            slantedText: true,
            slantedTextAngle: -45,
            textStyle: {
              color: '#666',
              fontSize: 13,
            },
            titleTextStyle: {
              bold: false,
              italic: false,
              color: '#666',
            }
          },
          vAxis:{
            format:'currency',
            minValue: 0,
          },
          colors:['#3366CC'], //altera cor da linha

        };

        var chart = new google.visualization.LineChart(document.getElementById('linechart'));

        chart.draw(data, options);
      }

    </script>";
    ?>
</head>
<body>
  
  <div id="app">
    <v-app id="inspire">
      <?php include_once("_header.php"); ?>
      <div class="main-content" id="contas">
        <div class="container-fluid">
          <div class="row contas"> 
            <h4>Relatórios</h4>
            <div id="tabs">
              <div class="col-md-12">
                <div class="content">
                  <div class="graf">
                    <h2>Recebimentos - Dia</h2>
                    <small class="pull-right">Últimos 30 dias</small>
                    <div id="linechart"></div>
                  </div>
                </div>
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

<script>
  new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data: () => ({
      menu: false,
      notificacoes: false,
      dialogSair: false,
    })
  })
</script>

  <?php include_once("_footer-default.php"); ?>
  
</body>
</html>