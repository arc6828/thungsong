<div class="card-body" style="height:500px; padding:20px;">
    <div id="map" style="height: 500px;padding:20"></div>
    <!-- <div class="" style="position: absolute; bottom: 55px; left: 25px;"><img class="" src="https://weather.ckartisan.com/image/scale.png" width="30%"></div> -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-NoP20OejFNd_gxMizvmRCDHwRPg0gJI"></script>
    <script>
        //google.maps.event.addDomListener(window, 'load', init);
        var map;
        var overlay;
        USGSOverlay.prototype = new google.maps.OverlayView();

        //var src = "https://weather.ckartisan.com/sample/kml/test1.kmz";
        //var src = "https://weather.ckartisan.com/sample/kml/2D_Base.kmz";
        // /2D_Base.kmz
        //var src = "https://weather.ckartisan.com/reports/2019-08-14_10-00-00/kml/1RG.kmz";
        //var src = "https://csincube.com/us_states.kml";
        //var src = 'https://developers.google.com/maps/documentation/javascript/examples/kml/westcampus.kml';
        // var src = "https://weather.ckartisan.com/storage/uploads/wL9wyTDWRs3snitOn4hUm3MnnQIIUj6m4NE7X5F8.zip ";
        var src = "{{ url('/kml/kml.zip') }}";
        


        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                //center: {lat: 21.3143328800798, lng: 105.603779579014},
                // center: { lat: 13.751288, lng: 100.628847 },
                center: { lat: 8.1620741, lng: 99.6699411 },
                //13.751288, 100.628847
                zoom: 11
            });

            var kmlLayer = new google.maps.KmlLayer(src, {
                suppressInfoWindows: true,
                preserveViewport: true,
                map: map
            });
            console.log("kmlLayer : ", kmlLayer);

            //OVERLAY                                        

            var bounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(7.9810505258, 99.4672642786),
                new google.maps.LatLng(8.2529753306, 99.8307601372));



            // The photograph is courtesy of the U.S. Geological Survey.                                       
            // var srcImage = 'http://weather.bangkok.go.th/Images/Radar/NjKML/njRadarOnGoogle.png';
            var srcImage = "{{ url('/kml/Tungsong_FM_2006 2006-02-10-07-00.png') }}";

            // The custom USGSOverlay object contains the USGS image,
            // the bounds of the image, and a reference to the map.
            overlay = new USGSOverlay(bounds, srcImage, map);

        }

        function USGSOverlay(bounds, image, map) {
            // Initialize all properties.
            this.bounds_ = bounds;
            this.image_ = image;
            this.map_ = map;

            // Define a property to hold the image's div. We'll
            // actually create this div upon receipt of the onAdd()
            // method so we'll leave it null for now.
            this.div_ = null;

            // Explicitly call setMap on this overlay.
            this.setMap(map);
        }
        USGSOverlay.prototype.onAdd = function() {

            var div = document.createElement('div');
            div.style.borderStyle = 'none';
            div.style.borderWidth = '0px';
            div.style.position = 'absolute';

            // Create the img element and attach it to the div.
            var img = document.createElement('img');
            img.src = this.image_;
            img.style.width = '100%';
            img.style.height = '100%';
            //img.style.position = 'absolute';
            div.appendChild(img);

            this.div_ = div;

            // Add the element to the "overlayLayer" pane.
            var panes = this.getPanes();
            panes.overlayLayer.appendChild(div);
        };

        USGSOverlay.prototype.draw = function() {

            // We use the south-west and north-east
            // coordinates of the overlay to peg it to the correct position and size.
            // To do this, we need to retrieve the projection from the overlay.
            var overlayProjection = this.getProjection();

            // Retrieve the south-west and north-east coordinates of this overlay
            // in LatLngs and convert them to pixel coordinates.
            // We'll use these coordinates to resize the div.
            var sw = overlayProjection.fromLatLngToDivPixel(this.bounds_.getSouthWest());
            var ne = overlayProjection.fromLatLngToDivPixel(this.bounds_.getNorthEast());

            // Resize the image's div to fit the indicated dimensions.
            var div = this.div_;
            div.style.left = sw.x + 'px';
            div.style.top = ne.y + 'px';
            div.style.width = (ne.x - sw.x) + 'px';
            div.style.height = (sw.y - ne.y) + 'px';
        };

        // The onRemove() method will be called automatically from the API if
        // we ever set the overlay's map property to 'null'.
        USGSOverlay.prototype.onRemove = function() {
            this.div_.parentNode.removeChild(this.div_);
            this.div_ = null;
        };
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>

</div>