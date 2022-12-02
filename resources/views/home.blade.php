<x-leaf.theme mode="navbar-light">
    <!-- Hero -->
    <section class="section-header bg-soft text-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 d-md-none">
                    <h1 class="display-2 font-weight-bold mb-0">
                        {{-- We<span class="font-weight-bold">
                            safeguard
                        </span>
                        the environment. --}}
                        เเผนที่น้ำท่วม<br />เเละจักรกลเรียนรู้
                    </h1>
                </div>
                <div class="col-8 col-md-7 col-lg-6 order-lg-1">
                    <!-- Heading -->
                    <!-- <h1 class="display-2 font-weight-bold d-none d-md-inline">We<span class="font-weight-bold">
                                safeguard </span> the environment.</h1> -->
                    <h1 class="
                                    display-2
                                    font-weight-bold
                                    d-none d-md-inline
                                ">
                        เเผนที่น้ำท่วม<br />เเละจักรกลเรียนรู้
                    </h1>

                    <!-- Text -->
                    <!-- <p class="lead text-muted mt-4">Over the past several decades, as the world has <br
                                class="d-none d-lg-inline">increasingly warmed, so has its potential to burn.</p> -->
                    <p class="lead text-muted mt-4">
                        แสดงภาพแผนที่น้ำท่วมบริเวณใกล้เคียงกับที่อยู่อาศัยของคุณร่วมกับแผนที่
                        GIS
                        พร้อมทั้งทำนายเหตุการณ์ที่จะเกิดในอนาคตอันใกล้ด้วยเทคนิคจักกลเรียนรู้
                        (Machine Learning)
                    </p>

                    <!-- Buttons -->
                    <!-- <div class="mt-4 mt-lg-5 mb-5 mb-lg-0">
                            <a href="./html/pages/our-mission.html" class="btn btn-md btn-primary animate-up-2 mr-3">
                                <span class="btn-inner-text"><i class="fas fa-book-reader mr-2"></i>Our mission</span>
                            </a>
                            <a href="#" class="btn btn-md btn-white animate-up-2 d-none d-lg-inline-block">
                                <span class="btn-inner-text"><i class="fas fa-file-download mr-2"></i>Download
                                    report</span>
                            </a>
                        </div> -->
                    <div class="mt-4 mt-lg-5 mb-5 mb-lg-0">
                        <a href="./html/pages/our-mission.html" class="
                                        btn btn-md btn-primary
                                        animate-up-2
                                        mr-3
                                    ">
                            <span class="btn-inner-text"><i class="fas fa-book-reader mr-2"></i>ดูการพยากรณ์</span>
                        </a>
                        <a href="#" class="
                                        btn btn-md btn-white
                                        animate-up-2
                                        d-none d-lg-inline-block
                                    ">
                            <span class="btn-inner-text"><i class="fas fa-file-download mr-2"></i>Download รายงาน</span>
                        </a>
                    </div>
                </div>
                <div class="col-4 col-md-5 col-lg-6 order-lg-2">
                    <!-- Image -->
                    <!-- <img src="./assets/img/forest.svg" class="img-fluid mb-lg-6 mb-0" alt="Forest Illustration" /> -->
                    <img src="{{ asset('leaf/assets/img/forest.svg')}}" class="img-fluid mb-lg-6 mb-0" alt="Forest Illustration" />
                </div>
            </div>
        </div>
    </section>
    <section class="section section-lg py-0">
        <div class="container mt-n5 mt-md-n6">
            <div class="row">
                <div class="col-12">
                    <!-- Card -->
                    <div class="card-group">
                        <div class="card border-left-md border-soft">
                            <div class="card-body text-center">
                                <h6 class="font-weight-bold mb-2">
                                    น้ำฝนฝายคลองเปิก
                                </h6>
                                <!-- Heading -->
                                <h2 class="text-gray mb-0">
                                    <span class="icon-danger mr-2">
                                        <i class=" fas fa-long-arrow-alt-up "></i>
                                    </span>
                                    <span class="counter display-3 mr-2">412</span>
                                </h2>
                                <!-- Text -->
                                <span class="text-center text-muted mb-0">มิลลิเมตร</span>
                            </div>
                        </div>
                        <div class="card border-left-md border-soft">
                            <div class="card-body text-center">
                                <h6 class="font-weight-bold mb-2">
                                    น้ำฝนน้ำตกปลิว
                                </h6>
                                <!-- Heading -->
                                <h2 class="text-gray mb-0">
                                    <span class="icon-danger mr-2">
                                        <i class=" fas fa-long-arrow-alt-up "></i>
                                    </span>
                                    <span class="counter display-3 mr-2">1.9</span>
                                </h2>
                                <!-- Text -->
                                <span class="text-center text-muted mb-0">มิลลิเมตร</span>
                            </div>
                        </div>
                        <div class="card border-left-md border-soft">
                            <div class="card-body text-center">
                                <h6 class="font-weight-bold mb-2">
                                    น้ำฝนบ้านไสใหญ่
                                </h6>
                                <!-- Heading -->
                                <h2 class="text-gray mb-0">
                                    <span class="icon-danger mr-2">
                                        <i class=" fas fa-long-arrow-alt-down "></i>
                                    </span>
                                    <span class="counter display-3 mr-2">13</span>
                                </h2>
                                <!-- Text -->
                                <span class="text-center text-muted mb-0">มิลลิเมตร</span>
                            </div>
                        </div>
                        <div class="card border-left-md border-soft">
                            <div class="card-body text-center">
                                <h6 class="font-weight-bold mb-2">
                                    ระดับน้ำสถานีทุ่งสง
                                </h6>
                                <!-- Heading -->
                                <h2 class="text-gray mb-0">
                                    <span class="icon-danger mr-2"><i class="
                                                        fas
                                                        fa-long-arrow-alt-up
                                                    "></i></span><span class="counter display-3 mr-2">3.3</span>
                                </h2>
                                <!-- Text -->
                                <span class="text-center text-muted mb-0">ม.ทรก</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section section-lg">
        <div class="container">
            <div class="display-5">
                ทุ่งสง
                เป็นอำเภอที่มีความเจริญเป็นอันดับสองของจังหวัดนครศรีธรรมราช
                รองจากอำเภอเมืองนครศรีธรรมราช
                เนื่องจากมีที่ตั้งอยู่ตรงกลางของภาคใต้และเป็นจุดศูนย์กลางคมนาคมทางบกทั้งรถยนต์และรถไฟ
                มีสถานีตรวจวัดระดับน้ำ 1 สถานี้
                และสถานีตรวจวัดระดับน้ำฝน 10 สถานี
            </div>
            <br />
            <div class="row mb-4 mb-lg-6">
                <!-- <div class="col-lg-6 pr-lg-5">
                            <p class="h5 font-weight-bold lh-180">
                                LEAF was created to provide policymakers with
                                regular scientific assessments on climate
                                change, its implications and potential future
                                risks, as well as to put forward adaptation and
                                mitigation options.
                            </p>
                        </div> -->
                <div class="col-lg-6 pr-lg-5">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">สถานี</th>
                                <th scope="col">ที่ตั้ง</th>
                                <th scope="col">ระดับน้ำ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ทุ่งสง</td>
                                <td>
                                    ต.ปากเเพรก อ.ทุ่งสง จ.นครศรีธรรมราช
                                </td>
                                <td>51.30</td>
                            </tr>
                            <!-- <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                    </tr> -->
                        </tbody>
                    </table>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ชื่อสถานี</th>
                                <th scope="col">ที่ตั้ง</th>
                                <th scope="col">เวลา</th>
                                <th scope="col">ฝนล่าสุด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>บ้านคลองตูกเหนือ</td>
                                <td>
                                    ต.กะปาง อ.ทุ่งสง จ.นครศรีธรรมราช
                                </td>
                                <td>14.00</td>
                                <td>
                                    <button type="button" class="btn btn-warning">
                                        51
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    หน่วยพิทักษ์อุทยานเเห่งชาติที่ ขป.๔
                                    (บ้านน้ำตก)
                                </td>
                                <td>
                                    ต.น้ำตก อ.ทุ่งสง จ.นครศรีธรรมราช
                                </td>
                                <td>16.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        48.8
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>ทุ่งสง</td>
                                <td>
                                    ต.ปากเเพรก อ.ทุ่งสง จ.นครศรีธรรมราช
                                </td>
                                <td>16.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        43.8
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>บ้านหิวราว</td>
                                <td>
                                    ต.เขาขาว อ.ทุ่งสง จ.นครศรีธรรมราช
                                </td>
                                <td>15.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        41
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>ฝายคลองเปิก</td>
                                <td>
                                    ต.ถ้ำใหญ่ อ.ทุ่งสง จ.นครศรีธรรมราช
                                </td>
                                <td>16.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        40.8
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>รร.บ้านพูน</td>
                                <td>
                                    ต.กะปาง อ.ทุ่งสง จ.นครศรีธรรมราช
                                </td>
                                <td>16.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        37.4
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="col-lg-6">
                            <p class="lead lh-180">
                                Through its assessments, the LEAF determines the
                                state of knowledge on climate change. It
                                identifies where there is agreement in the
                                scientific community on topics related to
                                climate change, and where further research is
                                needed. The reports are drafted and reviewed in
                                several stages, thus guaranteeing objectivity
                                and transparency. The LEAF does not conduct its
                                own research.
                            </p>
                            <p class="lead lh-180">
                                LEAF reports are neutral, policy-relevant but
                                not policy-prescriptive. The assessment reports
                                are a key input into the international
                                negotiations to tackle climate change.
                            </p>
                        </div> -->
                <div class="col-lg-6">
                    <div id="map"></div>
                    <script>
                        var map = L.map("map").setView([0, 0], 1);
                        L.tileLayer(
                            "https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=4XVGrxzCZYBYVpqyAVTs", {
                                attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
                            }
                        ).addTo(map);
                        var marker = L.marker([
                            8.169742463710204, 99.67182347414169,
                        ]).addTo(map);
                    </script>
                </div>
            </div>
            <div class="col text-center">
                <a href="./html/pages/about.html" class="btn btn-md btn-primary animate-up-2 mr-3">
                    <span class="btn-inner-text"><i class="fas fa-book-open mr-2"></i>
                        ดูข้อมูลย้อนหลัง
                    </span>
                </a>
            </div>
        </div>
    </div>
    <section class="section section-lg pb-10 pb-lg-11 bg-soft">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center text-dark">
                    <h2 class="h1">วิธีการที่เราใช้</h2>
                    <p class="lead text-gray my-4">
                        ระบบนี้เป็นรวมงานวิศวกรรมด้านเซนเซอร์
                        และการทำโมเดลน้ำท่วม
                        และการทำจักรกลเรียนรู้ทั้งสามด้านเข้าด้วยกัน
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="section py-0">
        <div class="container">
            <div class="row mt-n9">
                <div class="col-12 col-lg-4 mb-5">
                    <a class="card animate-up-3 shadow-sm border-soft" href="./html/pages/our-mission.html">
                        <div class="px-5 pt-4 pb-5">
                            <span class="
                                            badge badge-secondary badge-pill
                                            mb-2
                                        ">Sensoring
                            </span>
                            <!-- ตอนเเรกเป็น h5 เปลี่ยนเพราะ พื้นที่เกินไม่สวย -->
                            <h6 class="mb-3">
                                การจัดเก็บข้อมูลจากเซนเซอร์
                            </h6>
                            <p class="text-gray mb-0">
                                ข้อมูลจากเซนเซอร์ต่างๆ จะได้รับมาจากหน่วยงานที่ดูแลด้านข้อมูลซึ่งข้อมูลที่เราใช้จะเป็นข้อมูล ทุติยภูมิ
                            </p>
                        </div>
                        <div>
                            <img src="{{ asset('leaf/assets/img/illustrations/evidence.svg') }}" class="img-fluid img-center" alt="Illustration" />
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-4 mb-5">
                    <a class="card animate-up-3 shadow-sm border-soft" href="./html/pages/our-mission.html">
                        <div class="px-5 pt-4 pb-5">
                            <span class=" badge badge-primary badge-pill mb-2 ">Modeling</span>
                            <!-- ตอนเเรกเป็น h5 -->
                            <h6 class="mb-3">การสร้างโมเดลน้ำท่วม</h6>
                            <p class="text-gray mb-0">
                                การจัดทำแผนที่น้ำท่วม โดยใช้ข้อมูลจากระดับน้ำและปริมาณฝนที่ได้รับมาทำการแสดงเป็นแผนที่ GIS และแสดงผลผลเว็บแอพพลิเคชั่นโดยใช้ซอฟแวร์ด้านวิศวกรรมน้ำ
                            </p>
                        </div>
                        <div>
                            <img src="{{ asset('leaf/assets/img/illustrations/causes.svg') }}" class="img-fluid img-center" alt="Illustration" />
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-4 mb-5">
                    <a class="card animate-up-3 shadow-sm border-soft" href="./html/pages/our-mission.html">
                        <div class="px-5 pt-4 pb-5">
                            <span class=" badge badge-tertiary badge-pill mb-2 ">Machine Learning</span>
                            <h5 class="mb-3">จักรกลเรียนรู้</h5>
                            <p class="text-gray mb-0">
                                เลียนแบบการทำงานและวิธีออกผลลัพธ์ของซอฟแวร์ด้านวิศวกรรมน้ำ โดยในอนาคตจะเป็นซอฟแวร์ที่มาแทนที่ ซอฟแวร์ด้านวิศกรรมน้ำ
                            </p>
                        </div>
                        <div>
                            <img src="{{asset('leaf/assets/img/illustrations/solution.svg')}}" class="img-fluid img-center" alt="Illustration" />
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="section section-lg pb-5">
        <div class="container">
            <div class="row justify-content-center mb-5 mb-lg-7">
                <div class="col-lg-10 text-center">
                    <span class=" badge badge-primary badge-pill badge-lg mb-4 ">กิจกรรมของเรา</span>
                    <p class="h2">
                        กิจกรรมของเราที่ทำร่วมกับชาวบ้านในอำเภอทุ่งสง
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <!-- Card -->
                    <a class=" card mb-5 mb-lg-0 pb-11 overlay-primary rounded bg-image animate-up-3 " href="./html/pages/update.html" data-background="./assets/img/activity-1.jpg">
                        <!-- Body -->
                        <div class="card-body z-2 my-auto text-white">
                            <span class="font-weight-bold"><i class="fas fa-dot-circle mr-2"></i>Scoping Meeting</span>
                            <!-- Heading -->
                            <h4 class="font-weight-normal mt-4 mb-3">
                                Scoping meeting for the Synthesis Report
                                of the Sixth Assessment Report
                            </h4>

                            <!-- Text -->
                            <p class="mb-0">
                                <i class="far fa-calendar-alt mr-2"></i>October 21,
                                <span class="current-year"></span>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <!-- Card -->
                    <a class=" card mb-4 mb-lg-0 pb-11 overlay-secondary rounded bg-image animate-up-3 " href="./html/pages/update.html" data-background="./assets/img/activity-2.jpg">
                        <!-- Body -->
                        <div class="card-body z-2 my-auto text-white">
                            <span class="font-weight-bold"><i class="fas fa-dot-circle mr-2"></i>Lead Author Meetings</span>
                            <!-- Heading -->
                            <h4 class="font-weight-normal mt-4 mb-3">
                                Third Lead Author Meeting of the IPCC
                                Working Group I Sixth Assessment Report
                            </h4>

                            <!-- Text -->
                            <p class="mb-0">
                                <i class="far fa-calendar-alt mr-2"></i>August 26,
                                <span class="current-year"></span>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <!-- Card -->
                    <a class=" card mb-4 mb-lg-0 pb-11 overlay-tertiary rounded bg-image animate-up-3 " href="./html/pages/update.html" data-background="./assets/img/activity-3.jpg">
                        <!-- Body -->
                        <div class="card-body z-2 my-auto text-white">
                            <span class="font-weight-bold"><i class="fas fa-dot-circle mr-2"></i>Meeting</span>
                            <!-- Heading -->
                            <h4 class="font-weight-normal mt-4 mb-3">
                                Second Joint Session of IPCC Working
                                Groups I, II and III, in cooperation
                                with the TFI and IPCC 50
                            </h4>

                            <!-- Text -->
                            <p class="mb-0">
                                <i class="far fa-calendar-alt mr-2"></i>August 1,
                                <span class="current-year"></span>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 d-flex d-lg-none">
                    <!-- Card -->
                    <a class=" card  mb-5 mb-lg-0  pb-11  overlay-primary rounded  bg-image animate-up-3 " href="./html/pages/update.html" data-background="./assets/img/activity-3.jpg">
                        <!-- Body -->
                        <div class="card-body z-2 my-auto text-white">
                            <span class="font-weight-bold"><i class="fas fa-dot-circle mr-2"></i>Meeting</span>
                            <!-- Heading -->
                            <h4 class="font-weight-normal mt-4 mb-3">
                                Second Joint Session of IPCC Working
                                Groups I, II and III, in cooperation
                                with the TFI and IPCC 50
                            </h4>

                            <!-- Text -->
                            <p class="mb-0">
                                <i class="far fa-calendar-alt mr-2"></i>August 1,
                                <span class="current-year"></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col text-center mt-lg-6">
                <a href="./html/pages/updates.html" class="btn btn-md btn-primary animate-hover mr-3">
                    <span class="btn-inner-text">ดูกิจกรรมทั้งหมดของเรา<i class=" fas fa-arrow-right animate-right-3 ml-2 "></i></span>
                </a>
            </div>
        </div>
    </section>

    <!-- End of section -->
    

    
</x-leaf.theme>