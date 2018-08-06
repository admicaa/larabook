<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>

        <script type="text/javascript">
            function init() {
                google.load("visualization", "1.1", { packages:["corechart"], callback: 'drawCharts' });
            }

            function drawCharts() {
                drawAccountImpressions('chart-account-impressions');
            }
            
            function drawAccountImpressions(containerId) {
            	var data = google.visualization.arrayToDataTable([
                    ['Day', 'This month', 'Last month'],
                    ['01', 1000, 400],
                    ['05', 800, 700],
                    ['09', 1000, 700],
                    ['13', 1000, 400],
                    ['17', 660, 550],
                    ['21', 660, 500],
                    ['23', 750, 700],
                    ['27', 800, 900]
                ]);

                var options = {
                    width: 700,
                    height: 400,
                    hAxis: { title: 'Day',  titleTextStyle: { color: '#333' } },
                    vAxis: { minValue: 0 },
                    curveType: 'function',
                    chartArea: {
                        top: 30,
                        left: 50,
                        height: '70%',
                        width: '100%'
                    },
                    legend: 'bottom'
                };

                var chart = new google.visualization.LineChart(document.getElementById(containerId));
                chart.draw(data, options);
            }
        </script>
    </head>
    
    <body onload="init()">
    	<div id="chart-account-impressions"></div>
    </body>
</html>