
<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

function AJAX(){
          var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                drawChart(this.responseText);
                            }
                                 };
                            xmlhttp.open("GET", "../logica/estadisticaEstablecimientos.php", true);
                            xmlhttp.send();
  }
      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(AJAX);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart(strDatos) {

        alert(strDatos);
        var data = new google.visualization.DataTable();
        var arr= strDatos.split(",");
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        for(var i=0; i<arr.length-1; i++)
         {
            var aux = arr[i].split(":")
            alert(aux[0]+"/"+aux[1]);
            data.addRow([aux[0],parseInt(aux[1])]);
            }
        

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>