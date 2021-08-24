<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Web Frontend DHT11</title>
    <script src="https://code.jquery.com/jquery-2.2.4.js"
    integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"> </script>
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-6">
          <canvas id="myChart" width="400" height="200"></canvas>
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
      function loadData(){
        let url="https://api.thingspeak.com/channels/1458414/feeds.json?results=2";

          $.getJSON(url)
            .done(function(data){
              //console.log(data);
              let feed=data.feeds;
              console.log(feed[0]);
              $("#lastTemperature").text(feed[0].field2+  " C");
              $("#lastHumidity").text(feed[0].field1+  " %");
              $("#lastUpdate").text(feed[0].created_at);
            })
            .fail(function(error){
              console.log(error);
            });
      }

      function showChart(){
        var ctx = documnet.getElementByID("myChart").getContext("2d");
        var xlabel = [1,2,3,4,5,6,7,8,9,10];
        var data1 = [2,3,4,5,10];
        var data2 = [3,8,2,4,1];
        var mychart = new Chart(ctx, {
          type:"line",
          data: {
            labels: xlabel,
            datasets:[
              {
                label: "1st line ",
                data: data1
              },
              {
                label: "2nd line ",
                data: data2
              }
            ]
          }
        });
      }

      function showLine(chartid, data){
        var ctx = documnet.getElementByID("myChart").getContext("2d");
        var mychart = new Chart(ctx, {
          type:"line",
          data: {
            labels: data.xlabel,
            datasets:[
              {
                label: "1st line ",
                data: data1
              },
              {
                label: "2nd line ",
                data: data2
              }
            ]
          }
        });
      }

      $(()=>{
          //alert("Hello");
          showChart();

      });
  </script>
</html>
