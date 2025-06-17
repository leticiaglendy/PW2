<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Produto', 'Quantidade'],
          @foreach($produtos as $produto)
            ['{{ $produto->nome }}', {{ $produto->quantidade }}],
          @endforeach
        ]);

        var options = {
          title: 'Quantidade de Produtos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>

    <!-- Formulário de logout -->
    <form action="/logoutUser" method="POST">
      @csrf
      <button type="submit" class="btn btn-primary">Logout</button>
    </form>
  </body>
</html>
