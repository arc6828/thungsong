<div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        async function loadWaterLevelThungsong() {
            let url = "{{ url('api/waterlevel/predict') }}";
            let promise = await fetch(url);
            let wl_predict = await promise.json();
            // console.log(waterlevel);
            let url2 = "{{ url('api/waterlevel/station/795') }}"; //THUNGSONG
            let promise2 = await fetch(url2);
            let wl_now = await promise2.json();
            // console.log(wl_predict);
            // console.log(wl_now);

            //PREPARE DATA
            let wl_max = wl_now.data.min_bank;
            let wl_min = wl_now.data.ground_level;
            wl_now = wl_now.data.graph_data;
            wl_now = wl_now.filter(function(item) {
                // return (item.datetime.includes(":00") || item.datetime.includes(":30")) && item.value !== null;
                return item.value !== null;
            });
            wl_now = wl_now.map(function(item) {
                return [new Date(item.datetime), wl_min, wl_max, item.value, null];
            });
            //
            wl_predict = wl_predict.map(function(item, index) {
                return [
                    (new Date(item.datetime + 30 * 60 * 1000 * index - 60 * 60 * 7 * 1000)),
                    wl_min,
                    wl_max,
                    null,
                    item["forecast_wl(msl)"],
                ];
            });
            // console.log(wl_predict);
            return [wl_now, wl_predict];
        }
        async function loadWaterLevelBannPradoo() {
            // let url2 = "{{ url('api/waterlevel/station/1101568') }}"; //BannPradoo
            let url2 = "{{ url('api/waterlevel/station/13892') }}"; //Faiklongtalao
            let promise2 = await fetch(url2);
            let wl_now = await promise2.json();
            console.log(wl_now);
            //RESIZE            
            let wl_max = wl_now.data.min_bank;
            let wl_min = wl_now.data.ground_level;
            wl_now = wl_now.data.graph_data;
            wl_now = wl_now.filter(function(item) {
                return item.value != null;
            });
            wl_now = wl_now.map(function(item) {
                return [new Date(item.datetime), wl_min, wl_max, item.value];
            });
            return wl_now;
        }
        async function loadRain(station_id) {
            let url2 = "{{ url('api/rain/station') }}/" + station_id;
            let promise2 = await fetch(url2);
            let rain_now = await promise2.json();
            console.log(rain_now);
            //RESIZE
            rain_now = rain_now.data;
            rain_now = rain_now.filter(function(item) {
                return (item.rainfall_datetime.includes(":00") || item.rainfall_datetime.includes(":30")) &&
                    item.rainfall_value != null;
            });
            rain_now = rain_now.map(function(item) {
                return [new Date(item.rainfall_datetime), item.rainfall_value];
            });
            return rain_now;
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });

        //WATER LEVEL THUNGSONG
        google.charts.setOnLoadCallback(drawChartWaterLevelThungsong);

        async function drawChartWaterLevelThungsong() {
            let [wl_now, wl_predict] = await loadWaterLevelThungsong();

            let dataset = [
                ['Year', 'ระดับท้องน้ำ', 'ระดับตลิ่ง', 'ข้อมูลจริง', 'ข้อมูลทำนาย'],
                // ['2003', 900, null],
                // ['2004', 1000, null],
                // ['2005', 1170, 1170],
                // ['2006', null, 1120],
                // ['2007', null, 540]
            ];

            dataset = dataset.concat(wl_now, wl_predict);
            // console.log(dataset);

            var data = google.visualization.arrayToDataTable(dataset);
            var ticks = dataset.filter(function(item, index) {
                return (index % 10 == 9);
            });

            var options = {
                title: 'ระดับน้ำข้อมูลจริง/ทำนาย',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                },
                series: {
                    0: {
                        lineDashStyle: [10, 5]
                    },
                    1: {
                        lineDashStyle: [10, 5]
                    },
                    2: {},
                    3: {
                        // lineDashSize: 2,
                        lineDashStyle: [2.5, 10]
                    },
                },

                // pointSize: 2,
                hAxis: {
                    // format: 'HH:mm',
                    // title : 'วันที่',
                    viewWindow: {
                        min: new Date(Date.now() - 24 * 60 * 60 * 1000),
                    },
                },
                vAxis: {
                    title: 'ม.ทรก.',
                },
                chartArea: {
                    'width': '80%',
                    'height': '80%'
                },

            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_wl_thungsong'));
            chart.draw(data, options);
        }

        //WATER LEVEL BANN PRA DOO
        google.charts.setOnLoadCallback(drawChartWaterLevelBannPradoo);

        async function drawChartWaterLevelBannPradoo() {
            let wl_now = await loadWaterLevelBannPradoo();

            let dataset = [
                ['Year', 'ระดับท้องน้ำ', 'ระดับตลิ่ง', 'ข้อมูลจริง'],
                // ['2003', 900, null],
                // ['2004', 1000, null],
                // ['2005', 1170, 1170],
                // ['2006', null, 1120],
                // ['2007', null, 540]
            ];
            dataset = dataset.concat(wl_now);
            // console.log(dataset);

            var data = google.visualization.arrayToDataTable(dataset);


            var options = {
                title: 'ระดับน้ำข้อมูลจริง',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                },
                series: {
                    0: {
                        lineDashStyle: [10, 5]
                    },
                    1: {
                        lineDashStyle: [10, 5]
                    },
                    2: {},
                },
                hAxis: {
                    // format: 'MMM dd, YYYY',
                    // title : 'วันที่',
                    viewWindow: {
                        min: new Date(Date.now() - 24 * 60 * 60 * 1000),
                    },
                },
                vAxis: {
                    title: 'ม.ทรก.',
                },
                chartArea: {
                    'width': '80%',
                    'height': '80%'
                },
            };
            var chart = new google.visualization.LineChart(document.getElementById('chart_wl_bann_pradoo'));
            chart.draw(data, options);
        }

        //RAIN
        google.charts.setOnLoadCallback(drawChartRain);

        async function drawChartRain() {
            //THUNGSONG
            let rain_now = await loadRain(795);
            let dataset = [
                ['Year', 'ข้อมูลจริง'],
                // ['2003', 900, null],
                // ['2004', 1000, null],
                // ['2005', 1170, 1170],
                // ['2006', null, 1120],
                // ['2007', null, 540]
            ];
            dataset = dataset.concat(rain_now);
            // console.log(dataset);

            var data = google.visualization.arrayToDataTable(dataset);

            var options = {
                title: 'ปริมาณฝน',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                },
                vAxis: {
                    title: "มิลลิเมตร",
                    viewWindow: {
                        max: rain_now.reduce((accumulator, item)=>(Math.max(item[1], accumulator)),0)+0.1,
                        min: 0,
                    },
                },
                // width: 900,
                // height: 500,
                chartArea: {
                    'width': '80%',
                    'height': '80%'
                },
            };
            var chart = new google.visualization.LineChart(document.getElementById('chart_rain_thungsong'));
            chart.draw(data, options);

            //fai_klong_ta_lao
            let rain_now2 = await loadRain(13892);
            let dataset2 = [
                ['Year', 'ข้อมูลจริง'],
                // ['2003', 900, null],
                // ['2004', 1000, null],
                // ['2005', 1170, 1170],
                // ['2006', null, 1120],
                // ['2007', null, 540]
            ];
            dataset2 = dataset2.concat(rain_now2);
            // console.log(dataset);

            var data = google.visualization.arrayToDataTable(dataset2);

            var options = {
                title: 'ปริมาณฝน',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                },
                hAxis: {
                    // format: 'MMM dd, YYYY',
                    // title : 'วันที่',
                    viewWindow: {
                        min: new Date(Date.now() - 24 * 60 * 60 * 1000),
                    },
                },
                vAxis: {
                    title: "มิลลิเมตร",
                    viewWindow: {
                        // max: 100,
                        max: rain_now2.reduce((accumulator, item)=>(Math.max(item[1], accumulator)),0)+0.1,
                        min: 0,
                    }
                },
                // width: 900,
                // height: 500,
                chartArea: {
                    'width': '80%',
                    'height': '80%'
                },
            };
            var chart = new google.visualization.LineChart(document.getElementById('chart_rain_fai_klong_ta_lao'));
            chart.draw(data, options);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUVQ6Qn1MqMrgH25iE31qUA3yGxPvmW8M"></script>
    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                //center: {lat: 21.3143328800798, lng: 105.603779579014},
                // center: { lat: 13.751288, lng: 100.628847 },
                center: {
                    lat: 8.174971,
                    lng: 99.678874
                },
                //13.751288, 100.628847
                zoom: 11
            });

            // FETCH MARKERS
            fetch("{{ url('api/now/wl') }}")
                .then((data) => data.json())
                .then((data) => {
                    data = data.filter((item) => {
                        return item.station.tele_station_lat >= 8.174971;
                    });
                    console.log("Wl : ", data);
                    const infos = data.map(function(item) {
                        // console.log(item.agency_name);
                        let div = document.createElement('div');
                        let h = document.createElement('h6');
                        let h7 = document.createElement('h7');
                        let p = document.createElement('div');
                        let ul = document.createElement('div');
                        let items = [
                            `ระดับน้ำ (ม.ทรก.) : ${item.waterlevel_msl}`,
                            `สถานะ : ${item.diff_wl_bank_text} ${item.diff_wl_bank}`,
                            `ปริมาณน้ำเต็มความจุ  : ${item.storage_percent}%`,
                            `เวลา : ${item.waterlevel_datetime}`,
                            `รหัสสถานี : ${item.station.id}`,
                            `แหล่งข้อมูล : ${item.agency.agency_name.th}`,

                        ];
                        items.map(function(item) {
                            let li = document.createElement('div');
                            li.innerHTML = item;
                            ul.appendChild(li);
                            return li;
                        });
                        div.appendChild(h);
                        // div.appendChild(p);
                        div.appendChild(ul);
                        h.innerHTML =
                            ` ${item.station.tele_station_name.th} <br />จ.${item.geocode.province_name.th} อ.${item.geocode.amphoe_name.th} ต.${item.geocode.tumbon_name.th}`;
                        h.classList.add("mb-2");
                        p.innerHTML = item.geocode.province_name.th;
                        return new google.maps.InfoWindow({
                            content: div,
                            ariaLabel: item.station.tele_station_name.th,
                        });
                    });
                    const markers = data.map(function(item, index) {
                        let m = new google.maps.Marker({
                            position: {
                                lat: item.station.tele_station_lat,
                                lng: item.station.tele_station_long
                            },
                            map: map,
                            // label: item.rain_24h.toFixed(0),
                            title: `${item.station.tele_station_name.th} จ.${item.geocode.province_name.th} อ.${item.geocode.amphoe_name.th} ต.${item.geocode.tumbon_name.th}`,
                        });
                        m.addListener("click", () => {
                            infos[index].open({
                                anchor: m,
                                map: map,
                            });
                        });
                    });

                })

            // IMG OVERLAY 
            class USGSOverlay extends google.maps.OverlayView {
                bounds;
                image;
                div;
                constructor(bounds, image) {
                    super();
                    this.bounds = bounds;
                    this.image = image;
                }
                // [END maps_overlay_hideshow_subclass]
                // [START maps_overlay_hideshow_onadd]
                /**
                 * onAdd is called when the map's panes are ready and the overlay has been
                 * added to the map.
                 */
                onAdd() {
                    this.div = document.createElement("div");
                    this.div.style.borderStyle = "none";
                    this.div.style.borderWidth = "0px";
                    this.div.style.position = "absolute";

                    // Create the img element and attach it to the div.
                    const img = document.createElement("img");

                    img.src = this.image;
                    img.style.width = "100%";
                    img.style.height = "100%";
                    img.style.position = "absolute";
                    this.div.appendChild(img);

                    // Add the element to the "overlayLayer" pane.
                    const panes = this.getPanes();

                    panes.overlayLayer.appendChild(this.div);
                }
                // [END maps_overlay_hideshow_onadd]
                // [START maps_overlay_hideshow_draw]
                draw() {
                    // We use the south-west and north-east
                    // coordinates of the overlay to peg it to the correct position and size.
                    // To do this, we need to retrieve the projection from the overlay.
                    const overlayProjection = this.getProjection();
                    // Retrieve the south-west and north-east coordinates of this overlay
                    // in LatLngs and convert them to pixel coordinates.
                    // We'll use these coordinates to resize the div.
                    const sw = overlayProjection.fromLatLngToDivPixel(
                        this.bounds.getSouthWest()
                    );
                    const ne = overlayProjection.fromLatLngToDivPixel(
                        this.bounds.getNorthEast()
                    );

                    // Resize the image's div to fit the indicated dimensions.
                    if (this.div) {
                        this.div.style.left = sw.x + "px";
                        this.div.style.top = ne.y + "px";
                        this.div.style.width = ne.x - sw.x + "px";
                        this.div.style.height = sw.y - ne.y + "px";
                    }
                }
                // [END maps_overlay_hideshow_draw]
                // [START maps_overlay_hideshow_onremove]
                /**
                 * The onRemove() method will be called automatically from the API if
                 * we ever set the overlay's map property to 'null'.
                 */
                onRemove() {
                    if (this.div) {
                        this.div.parentNode.removeChild(this.div);
                        delete this.div;
                    }
                }
                // [END maps_overlay_hideshow_onremove]
                // [START maps_overlay_hideshow_hideshowtoggle]
                /**
                 *  Set the visibility to 'hidden' or 'visible'.
                 */
                hide() {
                    if (this.div) {
                        this.div.style.visibility = "hidden";
                    }
                }
                show() {
                    if (this.div) {
                        this.div.style.visibility = "visible";
                    }
                }
                toggle() {
                    if (this.div) {
                        if (this.div.style.visibility === "hidden") {
                            this.show();
                        } else {
                            this.hide();
                        }
                    }
                }
                toggleDOM(map) {
                    if (this.getMap()) {
                        this.setMap(null);
                    } else {
                        this.setMap(map);
                    }
                }
                // [END maps_overlay_hideshow_hideshowtoggle]
            }

            const bounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(7.9810505258, 99.4672642786),
                new google.maps.LatLng(8.2529753306, 99.8307601372)
            );
            // The photograph is courtesy of the U.S. Geological Survey.
            let image = "https://ckartisanspace.sgp1.digitaloceanspaces.com/thungsong/predict/floodoverlay.png";

            // [START maps_overlay_hideshow_init]
            const overlay = new USGSOverlay(bounds, image);

            overlay.setMap(map);

            // [END maps_overlay_hideshow_init]
            // [START maps_overlay_hideshow_controls]

            // // CREATE ELEMENTS
            const centerControlDiv = document.createElement("div");
            centerControlDiv.style.backgroundColor = "white";
            centerControlDiv.style.borderRadius = "2px";
            const checkbox = document.createElement("input");
            checkbox.setAttribute("type", "checkbox");
            checkbox.setAttribute("checked", "true");
            checkbox.setAttribute("id", "visibleOverlayControl");
            // checkbox.setAttribute("onchange", "onToggle(this)");
            checkbox.addEventListener("change", () => {
                overlay.toggle();
            });
            checkbox.style.width = "20px";
            checkbox.style.height = "20px";
            const label = document.createElement("span");
            label.innerHTML = " Flood";
            label.style.fontFamily = "Prompt";
            label.style.fontSize = "20px";

            centerControlDiv.appendChild(checkbox);
            centerControlDiv.appendChild(label);

            centerControlDiv.index = 1;
            centerControlDiv.style.padding = "5px 10px";
            centerControlDiv.style.marginTop = "10px";


            map.controls[google.maps.ControlPosition.TOP_LEFT].push(centerControlDiv);

            // const toggleButton = document.createElement("button");

            // toggleButton.textContent = "Toggle";
            // toggleButton.classList.add("custom-map-control-button");

            // const toggleDOMButton = document.createElement("button");

            // toggleDOMButton.textContent = "Toggle DOM Attachment";
            // toggleDOMButton.classList.add("custom-map-control-button");
            // toggleButton.addEventListener("click", () => {
            //     overlay.toggle();
            // });
            // toggleDOMButton.addEventListener("click", () => {
            //     overlay.toggleDOM(map);
            // });
            // // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(toggleDOMButton);
            // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(toggleButton);


            ///
            // const imageBounds = {
            //     north: 8.2529753306,
            //     south: 7.9810505258,
            //     east: 99.8307601372,
            //     west: 99.4672642786,
            // };
            // let imgURL = "https://ckartisanspace.sgp1.digitaloceanspaces.com/thungsong/predict/floodoverlay.png";
            // var historicalOverlay = new google.maps.GroundOverlay(imgURL, imageBounds);
            // historicalOverlay.setMap(map);

            // function redrawOverlay() {
            //     historicalOverlay.setMap(map);
            // }

            // function removeOverlay() {
            //     historicalOverlay.setMap(null);
            // }

            // const onToggle = (e) => {
            //     if (e.checked) {
            //         redrawOverlay()
            //     } else {
            //         removeOverlay()
            //     }
            // }

            // // CREATE ELEMENTS
            // const centerControlDiv = document.createElement("div");
            // centerControlDiv.style.backgroundColor = "white";
            // centerControlDiv.style.borderRadius = "2px";
            // const checkbox = document.createElement("input");
            // checkbox.setAttribute("type", "checkbox");
            // checkbox.setAttribute("id", "visibleOverlayControl");
            // checkbox.setAttribute("onchange", "onToggle(this)");
            // checkbox.style.width = "20px";
            // checkbox.style.height = "20px";
            // const label = document.createElement("span");
            // label.innerHTML = " Flood";
            // label.style.fontFamily = "Prompt";
            // label.style.fontSize = "20px";

            // centerControlDiv.appendChild(checkbox);
            // centerControlDiv.appendChild(label);

            // centerControlDiv.index = 1;
            // centerControlDiv.style.padding = "5px 10px";
            // centerControlDiv.style.marginTop = "10px";
            // map.controls[google.maps.ControlPosition.TOP_LEFT].push(centerControlDiv);

        }

        google.maps.event.addDomListener(window, 'load', initMap);

        function initMap2() {
            const map2 = new google.maps.Map(document.getElementById('map2'), {
                //center: {lat: 21.3143328800798, lng: 105.603779579014},
                // center: { lat: 13.751288, lng: 100.628847 },
                center: {
                    lat: 8.174971,
                    lng: 99.678874
                },
                //13.751288, 100.628847
                zoom: 11
            });

            fetch("{{ url('api/now/rain') }}")
                .then((data) => data.json())
                .then((data) => {
                    data = data.filter((item) => {
                        return item.station.tele_station_lat >= 8.174971;
                    });
                    console.log("Rain : ", data);
                    const infos = data.map(function(item) {
                        // console.log(item.agency_name);
                        let div = document.createElement('div');
                        let h = document.createElement('h6');
                        let h7 = document.createElement('h7');
                        let p = document.createElement('div');
                        let ul = document.createElement('div');
                        let items = [
                            `ปริมาณฝน (มม.) : ${item.rain_24h}`,
                            `เวลา : ${item.rainfall_datetime}`,
                            `รหัสสถานี : ${item.station.id}`,
                            `แหล่งข้อมูล : ${item.agency.agency_name.th}`,
                        ];
                        items.map(function(item) {
                            let li = document.createElement('div');
                            li.innerHTML = item;
                            ul.appendChild(li);
                            return li;
                        });
                        div.appendChild(h);
                        // div.appendChild(p);
                        div.appendChild(ul);
                        h.innerHTML =
                            ` ${item.station.tele_station_name.th} <br />จ.${item.geocode.province_name.th} อ.${item.geocode.amphoe_name.th} ต.${item.geocode.tumbon_name.th}`;
                        h.classList.add("mb-2");
                        p.innerHTML = item.geocode.province_name.th;
                        return new google.maps.InfoWindow({
                            content: div,
                            ariaLabel: item.station.tele_station_name.th,
                        });
                    });
                    const markers = data.map(function(item, index) {
                        let m = new google.maps.Marker({
                            position: {
                                lat: item.station.tele_station_lat,
                                lng: item.station.tele_station_long
                            },
                            map: map2,
                            // label: item.rain_24h.toFixed(0),
                            title: `${item.station.tele_station_name.th} จ.${item.geocode.province_name.th} อ.${item.geocode.amphoe_name.th} ต.${item.geocode.tumbon_name.th}`,
                        });
                        m.addListener("click", () => {
                            infos[index].open({
                                anchor: m,
                                map: map2,
                            });
                        });
                    });

                })



        }
        google.maps.event.addDomListener(window, 'load', initMap2);
        // window.initMap2 = initMap2;
    </script>

    <section class="section section-lg py-6">
        <div class="container">
            <div class="row d-none">
                <div class="col-12 text-center">
                    <h1>กราฟ</h1>
                    <p class="mb-0"> </p>
                    <hr class="my-4" />
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h5><i class="fas fa-water mr-2"></i> ระดับน้ำและระบบคาดการณ์อุทกภัยเรียลไทม์</h5>
                    {{-- <i class="fa-solid fa-arrow-up-wide-short"></i> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4" style="min-height: 600px;">
                    <div id="map" style="height: 600px; padding:20"></div>
                </div>
                <div class="col-lg-8">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header p-2" id="headingOne">
                                <h3 class="mb-0">
                                    <button class="btn btn-link btn-sm btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        ระดับน้ำ - สถานีทุ่งสง
                                    </button>
                                </h3>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div id="chart_wl_thungsong" style="width: 100%; height: 400px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header p-2" id="headingTwo">
                                <h3 class="mb-0">
                                    <button class="btn btn-link btn-sm btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        ระดับน้ำ - สถานีฝายคลองท่าเลา
                                    </button>
                                </h3>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div id="chart_wl_bann_pradoo" style="width: 100%; height: 400px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <h5><i class="fas fa-cloud-rain mr-2"></i> ปริมาณฝน</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4" style="min-height: 600px;">
                    <div id="map2" style="height: 600px; padding:20"></div>
                </div>
                <div class="col-lg-8">
                    <div class="accordion" id="accordionExample2">
                        <div class="card">
                            <div class="card-header p-2" id="headingOne2">
                                <h3 class="mb-0">
                                    <button class="btn btn-link btn-sm btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
                                        ปริมาณน้ำฝน - สถานีทุ่งสง
                                    </button>
                                </h3>
                            </div>

                            <div id="collapseOne2" class="collapse show" aria-labelledby="headingOne2" data-parent="#accordionExample2">
                                <div class="card-body">
                                    <div id="chart_rain_thungsong" style="width: 100%; height: 400px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header p-2" id="headingTwo2">
                                <h3 class="mb-0">
                                    <button class="btn btn-link btn-sm btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo">
                                        ปริมาณน้ำฝน - สถานีฝายคลองท่าเลา
                                    </button>
                                </h3>
                            </div>
                            <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2" data-parent="#accordionExample2">
                                <div class="card-body">
                                    <div id="chart_rain_fai_klong_ta_lao" style="width: 100%; height: 400px"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>
        <script>
            $('#accordionExample').on('show.bs.collapse', function() {
                // do something...
                console.log("OPEN");
                drawChartWaterLevelBannPradoo();
                drawChartWaterLevelThungsong();
            })
            $('#accordionExample2').on('show.bs.collapse', function() {
                // do something...
                console.log("OPEN");
                drawChartRain();
            })
        </script>
    </section>
</div>