<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Hello, world!</title>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
  </head>
  <body>  
    <h2> Praweenporn Mathurot</h2>
    <div class="container"> 
      <div class="row">
        <div class="col-3">
          <div class="row">
            <div class="col-4"><b>Temperture</b></div>
            <div class="col-8"> 
              <span id="lastTemperature"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
                <b>Humidity</b>
            </div>
            <div class="col-8"> 
              <span id="lastHumidity">
              </span>
            </div>
          </div>
        </div>
        last update <span id="lastupdate"></span>
      </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>

   <script>
       $(()=>{
           let url = "https://api.thingspeak.com/channels/1458414/feeds.json?results=1";
           $.getJSON(url){
             .done(funtion(data){
              //console.log(data);
              let feeds = data.feeds;
              console.log(feeds[0]);
              $("#lastTemperature").text(feed[0].field2+" C");
              $("#lastHumidity").text(feed[0].field1+" %");
              $("#lastupdate").text(feed[0].created_at);

         });
       });

   </script>
</html>
