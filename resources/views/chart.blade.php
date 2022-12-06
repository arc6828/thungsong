<x-leaf.theme mode="navbar-light">
    <section class="section section-header">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>กราฟ</h1>
                    <p class="mb-0"> </p>
                    <hr class="my-4" />
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
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
                            wl_now = wl_now.filter(function(item){
                                return item.datetime.includes(":00") || item.datetime.includes(":30");
                            });
                            wl_now = wl_now.map(function(item){
                                return [item.datetime,item.value, null];
                            });
                            //
                            wl_predict = wl_predict.map(function(item,index){
                                return [(new Date(item.datetime+30*60*1000*index)).toISOString(), null, item["forecast_wl(msl)"]];
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


                            dataset = dataset.concat(wl_now,wl_predict);
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
                        }
                    </script>
                    <div id="curve_chart" style="width: 900px; height: 500px"></div>

                </div>
            </div>



        </div>
    </section>
</x-leaf.theme>
