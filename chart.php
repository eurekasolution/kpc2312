    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['학번', '국어', '영어', '수학'],
          ['2004',  70,      40, 30],
          ['2005',  80,      46, 45],
          ['2006',  66,       33, 70],
          ['2007',  50,      54, 50]
        ]);

        var options = {
          title: '성적 분포',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

    <div class="row">
      <div class="col colLine">
        <div id="curve_chart" style="width: 900px; height: 700px"></div>
      </div>
    </div>