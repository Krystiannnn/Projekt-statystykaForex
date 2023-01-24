
<html>
<!DOCTYPE html>
<html lang="pl"> 
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div id="container">

   <div id="stat">
   </div>

   <div id="chart">
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['year', 'wynik'],
          
          <?php
          
           
            require_once "connect.php";
            $conn = new mysqli($host, $db_user, $db_password, $db_name);
            $q = ("SELECT * FROM wynik");
           
            $q=mysqli_query($conn,$q);
            while($data=mysqli_fetch_array($q)){
                $year=$data['year'];
                $wynik=$data['wynik'];
               
            

          ?>
          ['<?php echo $year;?>',<?php echo $wynik;?>],
          <?php
          }
          ?>
        ]);

        var options = {
          title: 'Forex',
          curveType: 'function',
          fontSize: 12,
          chartArea:{left:50,top:20,width:'93%',height:'90%'},
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <div id="curve_chart" ></div>
   </div>

   <div id="menu">
   </div>  
  </div>
 
  
  </body>
</html>
