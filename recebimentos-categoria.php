<?php include_once("_sessionverif.php");
$pagina_mãe = "relatorios";
$sub_pagina = "recebimentos";
$pagina_atual = "recebimento_categoria";
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
$query = "SELECT categoria , valor FROM contarecebimento where vencimento > '".date('Y/m/d',$td)."' GROUP BY categoria ORDER BY valor DESC";
$dados = $conn->query($query);
$ultimo='';
    echo "
      <script type='text/javascript'>
        google.charts.load('current', {packages:['corechart'], 'language': 'pt-BR'});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Categoria', 'Valor'],";
            while($row = mysqli_fetch_assoc($dados)){
                echo"
                    ['".$row['categoria']."',    ".$row['valor']."],              
                ";
            }
        echo"  ]);
          var formatter = new google.visualization.NumberFormat(
                {prefix: 'R$ '});
          formatter.format(data, 1);
          var options = {
            pieHole: 0.4,
            legend: {
            textStyle: {color: '#555'},
            position: 'labeled',
            },
            'tooltip' : {
              trigger: 'none'
            },
            colors: ['#3366cc', '#dc3912', '#ff9900', '#109618', '#990099', '#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722', '#795548', '#9e9e9e', '#607d8b', '#000000', '#ffffff'],
            pieSliceText: 'value',
            pieSliceTextStyle: {
            fontSize: 18,
            },
            fontName: 'Roboto',
            fontSize: 20,
            backgroundColor: { fill:'transparent' },
            enableInteractivity: true,
          };
          var container = document.getElementById('donutchart2');
          var chart = new google.visualization.PieChart(container);
          var drawCount = 0;
          var drawMax = 100;

          google.visualization.events.addListener(chart, 'ready', function () {
            var observer = new MutationObserver(function () {
              var svg = container.getElementsByTagName('svg');
              if (svg.length > 0) {
                var legend = getLegend(svg[0]);
                // check number of markers
                if (legend.length !== data.getNumberOfRows()) {
                  // increase height & redraw chart
                  options.height = parseFloat(svg[0].getAttribute('height')) + 32;
                  drawCount++;
                  if (drawCount < drawMax) {
                    chart.draw(data, options);
                  }
                } else {
                  // change legend marker colors
                  var colorIndex = 0;
                  legend.forEach(function (legendMarker) {
                    legendMarker.path.setAttribute('stroke', options.colors[colorIndex]);
                    if (legendMarker.hasOwnProperty('circle')) {
                      legendMarker.circle.setAttribute('fill', options.colors[colorIndex]);
                    }
                    colorIndex++;
                    if (colorIndex > options.colors.length) {
                      colorIndex = 0;
                    }
                  });
                }
              }
            });
            observer.observe(container, {
              childList: true,
              subtree: true
            });
          });

          // get array of legend markers -- {path: pathElement, circle: circleElement}
          function getLegend(svg) {
            var legend = [];
            Array.prototype.forEach.call(svg.childNodes, function(child) {
              var group = child.getElementsByTagName('g');
              Array.prototype.forEach.call(group, function(subGroup) {
                var path = subGroup.getElementsByTagName('path');
                if (path.length > 0) {
                  if (path[0].getAttribute('fill') === 'none') {
                    var legendMarker = {
                      path: path[0]
                    };
                    var circle = subGroup.getElementsByTagName('circle');
                    if (circle.length > 0) {
                      legendMarker.circle = circle[0];
                    }
                    legend.push(legendMarker);
                  }
                }
              });
            });
            return legend;
          }

          chart.draw(data, options);

        } 
      </script>";?>
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
                    <h2>Por categoria</h2>
                    <div id="donutchart2" style="height: 800px;"></div>
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