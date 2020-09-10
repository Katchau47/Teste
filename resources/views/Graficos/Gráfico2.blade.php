@extends('adminlte::page')

@section('title', 'Gráfico 2')

@section('content_header')
<div class="text-dark"> 
    <h1>Gráfico referente a quantidade de carros por sexo </h1>
    </br>
</div>
<div>
@stop

@section('content')

<html>
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <style type="text/css">
   .box{
    width:800px;
    margin:0 auto;
   }
  </style>
  <script type="text/javascript">
   var analytics = <?php echo $sexo; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>
 </head>
 <body>
  <br />
  <div class="container-fluid">
   
   <div class="panel panel-default">
    </div>
    <div class="panel-body">
     <div id="pie_chart" style="width:750px; height:450px;">

     </div>
    </div>
   </div>
   
  </div>
 </body>
</html>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
  