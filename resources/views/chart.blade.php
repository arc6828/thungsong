<x-leaf.theme mode="navbar-light">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        async function drawChart() {
            let url = "{{ url('api/waterlevel/predict') }}";
            let promise = await fetch(url);
            let wl_predict = await promise.json();
            // console.log(waterlevel);
            let url2 = "{{ url('api/waterlevel/now') }}";
            let promise2 = await fetch(url2);
            let wl_now = await promise2.json();
            console.log(wl_predict);
            console.log(wl_now);
            //RESIZE
            wl_now = wl_now.data.graph_data;
            wl_now = wl_now.filter(function(item) {
                return item.datetime.includes(":00") || item.datetime.includes(":30");
            });
            wl_now = wl_now.map(function(item) {
                return [item.datetime, item.value, null];
            });
            //
            wl_predict = wl_predict.map(function(item, index) {
                return [(new Date(item.datetime + 30 * 60 * 1000 * index)).toISOString(), null, item[
                    "forecast_wl(msl)"]];
            });
            console.log(wl_predict);
            let dataset = [
                ['Year', 'ข้อมูลจริง', 'ข้อมูลทำนาย'],
                // ['2003', 900, null],
                // ['2004', 1000, null],
                // ['2005', 1170, 1170],
                // ['2006', null, 1120],
                // ['2007', null, 540]
                // ['2022-12-01 00:00', 51.17, null],
                // ['2022-12-02 00:00', 51.17, 0]
            ];


            dataset = dataset.concat(wl_now, wl_predict);
            console.log(dataset);

            var data = google.visualization.arrayToDataTable(dataset);

            var options = {
                title: 'ระดับน้ำข้อมูลจริง/ทำนาย',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
            var chart2 = new google.visualization.LineChart(document.getElementById('curve_chart2'));

            chart2.draw(data, options);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUVQ6Qn1MqMrgH25iE31qUA3yGxPvmW8M"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                //center: {lat: 21.3143328800798, lng: 105.603779579014},
                // center: { lat: 13.751288, lng: 100.628847 },
                center: {
                    lat: 8.1170129282,
                    lng: 99.6490122079
                },
                //13.751288, 100.628847
                zoom: 11
            });

        }
        google.maps.event.addDomListener(window, 'load', initMap);

        function initMap2() {
            var map2 = new google.maps.Map(document.getElementById('map2'), {
                //center: {lat: 21.3143328800798, lng: 105.603779579014},
                // center: { lat: 13.751288, lng: 100.628847 },
                center: {
                    lat: 8.1170129282,
                    lng: 99.6490122079
                },
                //13.751288, 100.628847
                zoom: 11
            });

        }
        google.maps.event.addDomListener(window, 'load', initMap2);
    </script>



    <section class="section section-header">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>กราฟ</h1>
                    <p class="mb-0"> </p>
                    <hr class="my-4" />
                </div>
            </div>
            <div class="row" style="min-height: 500px;">
                <div class="col-lg-4">
                    <div id="map" style="height: 400px;padding:20"></div>
                </div>
                <div class="col-lg-8">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        สถานีทุ่งสง
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div id="curve_chart" style="width: 900px; height: 500px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        สถานีบ้านประดู่
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div id="curve_chart2" style="width: 900px; height: 500px"></div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
            <div class="row" style="min-height: 500px;">
                <div class="col-lg-4">
                    <div id="map2" style="height: 400px;padding:20"></div>
                </div>
                <div class="col-lg-8">

                </div>
            </div>



        </div>
        <script>
            $('#accordionExample').on('show.bs.collapse', function() {
                // do something...
                console.log("OPEN");
                drawChart();
            })
        </script>
    </section>
</x-leaf.theme>
