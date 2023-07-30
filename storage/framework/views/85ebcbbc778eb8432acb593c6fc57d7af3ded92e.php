<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_Qajj9nMV6UZB_L8cAReXPdXeRoodnc8&callback=initMap&v=3.exp&?sensor=false">
</script>

<script>
  var maps = [];

   var markers = [];

   function initMap() {

       var $maps = $('.map');

       $.each($maps, function (i, value) {
        var sourceLat = parseFloat($(value).attr('lat'));
        var sourceLng = parseFloat($(value).attr('lng')) ;
        var destinationLat = parseFloat($(value).attr('lat2'));
        var destinationLng = parseFloat($(value).attr('lng2'));
        var mapDivId = $(value).attr('id');





if( destinationLat != null && destinationLng != null ){
  var uluru2 = new google.maps.LatLng(destinationLat,destinationLng);
  maps[mapDivId] = new google.maps.Map(document.getElementById(mapDivId), {
               center: uluru2,
               zoom: 13,
           });

           markers[mapDivId] = new google.maps.Marker({
               position: uluru2,
               map: maps[mapDivId],
               title: "destination",
               label: "<?php echo e(__('order.from')); ?>",
           });
}


       
if( sourceLat != null && sourceLng != null ){
  var uluru = new google.maps.LatLng(sourceLat,sourceLng);
  markers[mapDivId] = new google.maps.Marker({
               position: uluru,
               map: maps[mapDivId],
               title: "source",
              label: "<?php echo e(__('order.to')); ?>",
           });
}
        

          
       })
   }
   initMap();
</script>


<?php /**PATH /home/kafoosaappsjanna/lara/resources/views/components/admin/google-map-multi-js.blade.php ENDPATH**/ ?>