<section class="section section-lg py-4">
    <div class="container mt-n5 mt-md-n6">
        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card-group">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="card border-left-md border-soft" id="card-{{ $i }}" title="">
                            <div class="card-body text-center">
                                <h6 class="font-weight-bold mb-2">
                                    ระดับน้ำ - สถานี
                                </h6>
                                <!-- Heading -->
                                <h2 class="text-gray mb-0" id="wl_thungsong">
                                    <span class="icon-danger mr-2">
                                        <!-- <i class=" fas fa-long-arrow-alt-up "></i> -->
                                        <i class="fas "></i>
                                    </span>
                                    <span class="counter display-3 mr-2">0</span>
                                </h2>
                                <!-- Text -->
                                <span class="text-center text-muted mb-0">ม.ทรก.</span>
                            </div>
                        </div>
                    @endfor
                    {{-- <div class="card border-left-md border-soft">
                        <div class="card-body text-center">
                            <h6 class="font-weight-bold mb-2">
                                ปริมาณฝน - ทุ่งสง
                            </h6>
                            <!-- Heading -->
                            <h2 class="text-gray mb-0" id="rain_thungsong">
                                <span class="icon-danger mr-2">
                                    <!-- <i class=" fas fa-long-arrow-alt-up "></i> -->
                                    <i class="fas "></i>
                                </span>
                                <span class="counter display-3 mr-2">0.0</span>
                            </h2>
                            <!-- Text -->
                            <span class="text-center text-muted mb-0">มิลลิเมตร</span>
                        </div>
                    </div>
                    <div class="card border-left-md border-soft">
                        <div class="card-body text-center">
                            <h6 class="font-weight-bold mb-2">
                                ระดับน้ำ - บ้านประดู่
                            </h6>
                            <!-- Heading -->
                            <h2 class="text-gray mb-0" id="wl_baanpradoo">
                                <span class="icon-danger mr-2">
                                    <!-- <i class=" fas fa-long-arrow-alt-down "></i> -->
                                    <i class="fas "></i>
                                </span>
                                <span class="counter display-3 mr-2">0</span>
                            </h2>
                            <!-- Text -->
                            <span class="text-center text-muted mb-0">ม.ทรก</span>
                        </div>
                    </div>
                    <div class="card border-left-md border-soft">
                        <div class="card-body text-center">
                            <h6 class="font-weight-bold mb-2">
                                ปริมาณฝน - ฝายคลองท่าเลา
                            </h6>
                            <!-- Heading -->
                            <h2 class="text-gray mb-0" id="rain_faiklongtalao">
                                <span class="icon-danger mr-2">
                                    <!-- <i class="fas fa-long-arrow-alt-up "></i> -->
                                    <i class="fas "></i>
                                </span>
                                <span class="counter display-3 mr-2">0</span>
                            </h2>
                            <!-- Text -->
                            <span class="text-center text-muted mb-0">มิลลิเมตร</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        // api/statistic/now
        document.addEventListener('DOMContentLoaded', async (event) => {
            console.log('DOM fully loaded and parsed');
            // let promise = await fetch("{{ url('api/statistic/now') }}");
            // let data = await promise.json();

            // console.log("STATISTIC : ", data);
            // document.querySelector("#wl_thungsong .counter").innerHTML = data.wl_thungsong.latest?data.wl_thungsong.latest.value:"0";
            // document.querySelector("#wl_baanpradoo .counter").innerHTML = data.wl_baanpradoo.latest?data.wl_baanpradoo.latest.value:"0";
            // document.querySelector("#rain_thungsong .counter").innerHTML = data.rain_thungsong.latest?data.rain_thungsong.latest
            //     .rainfall_value:"0";
            // document.querySelector("#rain_faiklongtalao .counter").innerHTML = data.rain_faiklongtalao.latest?data.rain_faiklongtalao.latest
            //     .rainfall_value:"0";

            // document.querySelector("#wl_thungsong i").classList.add(data.wl_thungsong.d > 0 ?
            //     "fa-long-arrow-alt-up" : "fa-long-arrow-alt-down");
            // document.querySelector("#wl_baanpradoo i").classList.add(data.wl_baanpradoo.d > 0 ?
            //     "fa-long-arrow-alt-up" : "fa-long-arrow-alt-down");
            // document.querySelector("#rain_thungsong i").classList.add(data.rain_thungsong.d > 0 ?
            //     "fa-long-arrow-alt-up" : "fa-long-arrow-alt-down");
            // document.querySelector("#rain_faiklongtalao i").classList.add(data.rain_faiklongtalao.d > 0 ?
            //     "fa-long-arrow-alt-up" : "fa-long-arrow-alt-down");


            let promiseWL = await fetch("{{ url('api/now/wl') }}");
            let dataWL = await promiseWL.json();
            let promiseRain = await fetch("{{ url('api/now/rain') }}");
            let dataRain = await promiseRain.json();
            dataWL = dataWL.filter((item) => (item.station.tele_station_lat >= 8.174971));
            dataRain = dataRain.filter((item) => (item.station.tele_station_lat >= 8.174971));
            dataWL = dataWL.map((item) => {
                return {
                    "title": `ระดับน้ำ - ${item.station.tele_station_name.th}`,
                    "number": `${item.waterlevel_msl}`,
                    "unit": "ม.รทก.",
                    "direction": `${item.waterlevel_msl-item.waterlevel_msl_previous}`,
                    "datetime": `${item.waterlevel_datetime}`,
                    "station_id": `${item.station.id}`,
                }
            });
            dataRain = dataRain.map((item) => {
                return {
                    "title": `ปริมาณฝน - ${item.station.tele_station_name.th}`,
                    "number": `${item.rain_24h}`,
                    "unit": "มิลลิเมตร",
                    "direction": `0`,
                    "datetime": `${item.rainfall_datetime}`,
                    "station_id": `${item.station.id}`,
                }
            });
            dataWL.sort(function(a, b) {
                return a.station_id - b.station_id
            });
            dataRain.sort(function(a, b) {
                return a.station_id - b.station_id
            });
            console.log("STATISTIC : ", dataWL, dataRain);
            var intervel_counter = 0;
            // var onSwapCards = () => {
            //     // element.innerHTML += "Hello"
            //     if (intervel_counter % 2 == 0) {
            //         dataWL.forEach((item, index) => {
            //             document.querySelector(`#card-${index}`).setAttribute("title",
            //                 `อัพเดทข้อมูลเมื่อ : ${item.datetime}`);
            //             document.querySelector(`#card-${index} h6`).innerHTML = item.title;
            //             document.querySelector(`#card-${index} .counter`).innerHTML = item
            //                 .number;
            //             document.querySelector(`#card-${index} span.text-center`).innerHTML =
            //                 item.unit;
            //             // document.querySelector(`#card-${index} h6`).innerHTML = item.title;
            //             // document.querySelector("#rain_faiklongtalao i").classList.add(data
            //             //     .rain_faiklongtalao.d > 0 ?
            //             //     "fa-long-arrow-alt-up" : "fa-long-arrow-alt-down");
            //         });
            //     } else {
            //         dataRain.forEach((item, index) => {
            //             document.querySelector(`#card-${index}`).setAttribute("title",
            //                 `อัพเดทข้อมูลเมื่อ : ${item.datetime}`);
            //             document.querySelector(`#card-${index} h6`).innerHTML = item.title;
            //             document.querySelector(`#card-${index} .counter`).innerHTML = item
            //                 .number;
            //             document.querySelector(`#card-${index} span.text-center`).innerHTML =
            //                 item.unit;
            //             // document.querySelector(`#card-${index} h6`).innerHTML = item.title;
            //             // document.querySelector("#rain_faiklongtalao i").classList.add(data
            //             //     .rain_faiklongtalao.d > 0 ?
            //             //     "fa-long-arrow-alt-up" : "fa-long-arrow-alt-down");
            //         });

            //     }
            //     $('.counter').counterUp({
            //         delay: 10,
            //         time: 1000,
            //         offset: 70,
            //         // beginAt: 100,
            //         formatter: function(n) {
            //             return n.replace(/,/g, '.');
            //         }
            //     });
            //     intervel_counter++;
            // };
            // onSwapCards();
            setInterval(() => {
                // element.innerHTML += "Hello"
                if (intervel_counter % 2 == 0) {
                    dataWL.forEach((item, index) => {
                        document.querySelector(`#card-${index}`).setAttribute("title",
                            `อัพเดทข้อมูลเมื่อ : ${item.datetime}`);
                        document.querySelector(`#card-${index} h6`).innerHTML = item.title;
                        document.querySelector(`#card-${index} .counter`).innerHTML = item
                            .number;
                        document.querySelector(`#card-${index} span.text-center`).innerHTML =
                            item.unit;
                        // document.querySelector(`#card-${index} h6`).innerHTML = item.title;
                        // document.querySelector("#rain_faiklongtalao i").classList.add(data
                        //     .rain_faiklongtalao.d > 0 ?
                        //     "fa-long-arrow-alt-up" : "fa-long-arrow-alt-down");
                    });
                } else {
                    dataRain.forEach((item, index) => {
                        document.querySelector(`#card-${index}`).setAttribute("title",
                            `อัพเดทข้อมูลเมื่อ : ${item.datetime}`);
                        document.querySelector(`#card-${index} h6`).innerHTML = item.title;
                        document.querySelector(`#card-${index} .counter`).innerHTML = item
                            .number;
                        document.querySelector(`#card-${index} span.text-center`).innerHTML =
                            item.unit;
                        // document.querySelector(`#card-${index} h6`).innerHTML = item.title;
                        // document.querySelector("#rain_faiklongtalao i").classList.add(data
                        //     .rain_faiklongtalao.d > 0 ?
                        //     "fa-long-arrow-alt-up" : "fa-long-arrow-alt-down");
                    });

                }
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000,
                    offset: 70,
                    // beginAt: 100,
                    formatter: function(n) {
                        return n.replace(/,/g, '.');
                    }
                });
                intervel_counter++;
            }, 5000);

        });
    </script>
</section>
