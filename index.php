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
    <p><h2 align="center">Monitor Temperature & Humidity: Praweenporn Mathurot </h2></bp>
    <p><h4 align="center">Update <span id="lastUpdate"></span></h4></p>
    <div class="container">
      <div class="row">
        <div class="col-6">
          <canvas id="chart1" width="400" height="200"></canvas>
          <p><h6 align="center"><b>Humidity : </b><span id="lastHumidity"></span></h6></p>
        </div>

        <div class="col-6">
          <canvas id="chart2" width="400" height="200"></canvas>
          <p><h6 align="center"><b>Temperature : </b><span id="lastTemperature"></span></h6></p>
        </div>

        <div class="col-6">
        <p><canvas id="chart3" width="400" height="200"></canvas></p>
        <p><h6 align="center"><b>Light value : </b><span id="lastLightvalue"></span></h6></p>
        </div>
      
        <div class="col-6">
        <p><canvas id="chart4" width="400" height="200"></canvas></p>
        <br><h6 align="center"><b>Light Status : </b><span id="lastLightStatus"></span></h6></br>
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

      function showChart3(data,lab,id,label,width,height){
        var myCanvas = document.getElementById("chart3");
        var ctx = myCanvas.getContext("2d");
        var myChart = new Chart(myCanvas,{
          type:"line",
          data: {
            labels: lab,
            datasets:[
              {
                label: label,
                data: data,
                backgroundColor: "rgb(102, 102, 0)",
                borderColor: "rgb(255,255,0)"
              }
            ]
          }
        });
        console.log(lab);
        console.log(data);
      }

      function showChart4(data,lab,id,label,width,height){
        var myCanvas = document.getElementById("chart4");
        var ctx = myCanvas.getContext("2d");
        var myChart = new Chart(myCanvas,{
          type:"line",
          data: {
            labels: lab,
            datasets:[
              {
                label: label,
                data: data,
                backgroundColor: "rgb(0, 102, 0)",
                borderColor: "rgb(0,255,0)"
              }
            ]
          }
        });
        console.log(lab);
        console.log(data);
      }

      $(()=>{
        
        var lab = [];
        var data1 = [];
        var data2 = [];   
        var data3 = [];
        var data4 = [];

        let url="https://api.thingspeak.com/channels/1497536/feeds.json?results=240";
          $.getJSON(url,function(data){
              let feeds = data.feeds;
              console.log(data);
              $("#lastTemperature").text(feeds[0].field2+ " C");
              $("#lastHumidity").text(feeds[0].field1+ " %");
              $("#lastLightvalue").text(feeds[0].field3+ " Lux");
              $("#lastLightStatus").text(feeds[0].field4);
              $("#lastUpdate").text(feeds[0].created_at);
         
          for (let i = 0; i < feeds.length; i++){
            lab[i] = i+1;
            data1[i] = feeds[i].field1;
            data2[i] = feeds[i].field2; 
            data3[i] = feeds[i].field3;
            data4[i] = feeds[i].field4; 
        }

          var id1 = "canvas1";
          var id2 = "canvas2";
          var id3 = "canvas3";
          var id4 = "canvas4";
          var label1 = "Humidity";
          var label2 = "Temperature";
          var label3 = "Light value";
          var label4 = "Light Status";

          showChart1(data1,lab,id1,label1);
          showChart2(data2,lab,id2,label2);
          showChart3(data3,lab,id3,label3);
          showChart4(data4,lab,id4,label4);
        });

      });
  </script>
</html>
