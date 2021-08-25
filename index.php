<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Web Frontend DHT11</title>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"> </script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-6">
          <canvas id="canvas" width="400" height="200"></canvas>
        </div>
      </div>

      <div class="class row">
        <div class="class col-3">
          <div class="class row">
            <div class="class col-4"><b>Temperature</b></div>
            <div class="col-8" >
              <span id="lastTemperature"></span>
            </div>      
          </div>

          <div class="class row">
            <div class="class col-4"><b>Humidity</b></div>
            <div class="col-8" >
              <span id="lastHumidity"></span>
            </div>
          </div>

          <div class="class row">
            <div class="class col-4"><b>Update</b></div>
            <div class="col-8" >
              <span id="lastUpdate"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  <script>
      function loadData(plot_data){
        var lb = [];
        var data1 = [];
        var data2 = [];

        let url="https://api.thingspeak.com/channels/1458414/feeds.json?results=50";
          $.getJSON(url,function(data){
              let feeds = data.feeds;
              console.log(feeds[0]);
              $("#lastTemperature").text(feeds[0].field2+ " C");
              $("#lastHumidity").text(feeds[0].field1+ " %");
              $("#lastUpdate").text(feeds[0].created_at);
         
          for (let i = 0; i < feeds.length; i++){
            lb[i] i++;
            data1[i] = feeds[i].field1;
            data2[i] = feeds[i].field2; 
        });
      });
        console.log(plot_data);
      }

      function showChart(label,id,lb,data){
        var canvas = document.getElementById(id).getContext("2d");
        var data;

        var myChart = new Chart(canvas, {
          type:"line",
          data: {
            labels: lb,
            datasets:[
              {
                label: label,
                data: data,
                options: {
                responsive: true,
                plugins: {
                legend: {
                position: 'top',
                }
              }
            ]
          }
        });
      }

      $(()=>{
          //alert("Hello");
          var plot_data = Object();
          var id1 = 'myChart1';
          var id2 = 'myChart2';
          var label1 = 'Humidity';
          var label2 = 'Temperature';
          loadData(plot_data);
          showChart(plot_data,id1,label1,ld);
          showChart(plot_data,id2,label2,ld);
      });
  </script>
</html>
