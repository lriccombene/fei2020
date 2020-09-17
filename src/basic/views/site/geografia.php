<?php
use yii\widgets\DetailView;
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'My Yii Application';
$this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap');


?>
<script type="text/javascript">

</script>

<style>
    #map {
      width: 100%;
      height: 400px;
      background-color: grey;
    }
  </style>

<div class="jumbotron">

<div class="site-index" style="background-color:#0F6A54">

      <p class="lead">Mapa coordenadas</p>
  </div>
      <?php
      $latitud='';
      $longitud='';
      $municipio='';
      $detalle= '';

      foreach ($geografia as $nombre) {
          $municipio=$nombre->municipio->nombre;
          $latitud=$nombre->latitud;
          $longitud=$nombre->longitud;
          $detalle=$nombre->detalle;
        }

      ?>
       <h2><?php echo print_r($municipio); ?></h2>
       <!--The div element for the map -->
      <div class="row">
         <div style="width:100%; height:300px;" id="map"></div>
      </div>
      <div style = 'background-color: #b2d235'><h3>Breve descripción de su geografía </h3></div>

      <textarea style = ' width:100%; height:300px;' name = "course_id" cols=40  rows=3>
      <?php echo $detalle ?>
      </textarea>
    </div>


 <script>
// Initialize and add the map
function initMap() {
// The location of Uluru
var uluru = {lat:<?php echo $latitud ?> , lng: <?php echo $longitud ?> };
// The map, centered at Uluru
var map = new google.maps.Map(
   document.getElementById('map'), {zoom: 12, center: uluru});
// The marker, positioned at Uluru
var marker = new google.maps.Marker({position: uluru, map: map});
}
 </script>
 <!--Load the API from the specified URL
 * The async attribute allows the browser to render the page while the API loads
 * The key parameter will contain your own API key (which is not needed for this tutorial)
 * The callback parameter executes the initMap() function
 -->
 <script defer
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtlsqeui87dlGAWFgdTwBukHKOkA7MpFk&callback=initMap">
 </script>


</div>
