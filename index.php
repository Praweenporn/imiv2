<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>DHT11 Web</title>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"> </script>
  </head>
  <body>
    <br><h1 align="center">Monitor Temperature & Humidity: Praweenporn Mathurot </h1></br>
    <div class="container">
      <div class="row">
        <div class="col-6">
          <canvas id="chart1" width="400" height="200"></canvas>
        </div>
        <div class="col-6">
          <canvas id="chart2" width="400" height="200"></canvas>
        </div>
      </div>
      
      <div class="class row">
        <div class="class col-3">
          <div class="class row">
            <div class="class col-4"><br><b>Humidity</b></br></div>
            <div class="col-8" >
              <br><span id="lastHumidity"></span></br>
            </div>      
          </div>

          <div class="class row">
            <div class="class col-4"><b>Temperature</b></div>
            <div class="col-8" >
              <span id="lastTemperature"></span>
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
      function showChart1(data,lab,id,label,width,height){
        var myCanvas = document.getElementById("chart1");
        var ctx = myCanvas.getContext("2d");
        var myChart = new Chart(myCanvas,{
          type:"line",
          data: {
            labels: lab,
            datasets:[
              {
                label: label,
                data: data,
                backgroundColor: "rgb(0,153,153)",
                borderColor: "rgb(0, 255, 255)"
              }
            ]
          }
        });
        console.log(lab);
        console.log(data);
      }

      function showChart2(data,lab,id,label,width,height){
        var myCanvas = document.getElementById("chart2");
        var ctx = myCanvas.getContext("2d");
        var myChart = new Chart(myCanvas,{
          type:"line",
          data: {
            labels: lab,
            datasets:[
              {
                label: label,
                data: data,
                backgroundColor: "rgb(204,102,0)",
                borderColor: "rgb(255, 153, 51)"
              }
            ]
          }
        });
        console.log(lab);
        console.log(data);

      }

      $(()=>{
          //alert("Hello");
        var lab = [];
        var data1 = [];
        var data2 = [];

        let url="https://api.thingspeak.com/channels/1458414/feeds.json?results=50";
          $.getJSON(url,function(data){
              let feeds = data.feeds;
              console.log(data);
              $("#lastTemperature").text(feeds[0].field2+ " C");
              $("#lastHumidity").text(feeds[0].field1+ " %");
              $("#lastUpdate").text(feeds[0].created_at);
         
          for (let i = 0; i < feeds.length; i++){
            lab[i] = i+1;
            data1[i] = feeds[i].field1;
            data2[i] = feeds[i].field2; 
        }

          var id1 = "canvas1";
          var id2 = "canvas2";
          var label1 = "Humidity";
          var label2 = "Temperature";

          showChart1(data1,lab,id1,label1);
          showChart2(data2,lab,id2,label2);
        });

      });
  </script>
</html>
