<!DOCTYPE html>
<html >
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Google Map </title>
    <style type="text/css">
        #map {
          height: 500px;
          width: 92%;
          margin: 0 auto;
        }
        button{  
          background-color: red;  
          color: black;  
          font-size: 20px;  
        }
        .container {  
          padding-top: 10px; 
          display: flex;  
          justify-content: center;  
          align-items: center;  
}  
    </style>
</head>
    
<body>
    <div id="map"></div>
    <div class="container">
    <button onclick="showMap({{ $laporan-> lat }},{{ $laporan-> long }},)">Show Map</button>  
      </div>
    <script type="text/javascript">
       
        function showMap(lat, lng) {
          const myLatLng = { lat: lat, lng: lng };
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: myLatLng,
          });
  
          new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Lokasi",
          });
        }  
        showMap({{ $laporan-> lat }},{{ $laporan-> long }});
    </script>
  
   <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries" >
</script>



</body>
</html>
