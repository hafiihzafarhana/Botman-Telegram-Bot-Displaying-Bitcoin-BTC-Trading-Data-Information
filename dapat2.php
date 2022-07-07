<?php
    require_once './database/config.php';
    $ranges1 = $_GET['tgl1']." ".$_GET['time1'];
    // echo $ranges1;
    // echo "<br>";
    $ranges2 = $_GET['tgl2']." ".$_GET['time2'];
    // echo $ranges2;
    ?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Waktu','Harga IDR'],
          <?php
          $datas = mysqli_query($conn,"SELECT tanggal as tgl, hargaidr FROM btc WHERE tanggal != '0000-00-00 00:00:00' AND tanggal BETWEEN '$ranges1' AND '$ranges2'");
            while($row = mysqli_fetch_array($datas)){

            ?>

            ["<?php echo $row[0]?>",<?php echo $row[1] ?>],

            <?php
            }
            ?>

        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 1500px; height: 750px"></div>
  </body>
</html>
