<x-leaf.theme mode="navbar-light" title="สถานที่"
    description="บทความที่เกี่ยวข้องกับงายวิจัย ความรู้ที่เป็นประโยชน์และต้องการเผยแพร่สู่สาธารณะ"
    image="https://cdn-images-1.medium.com/max/1024/1*pnw6OuU-R4JXzgUUPWbmbg.jpeg">

    <link type="text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery.min.css" />

    <!-- lightgallery plugins -->
    <link type="text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-zoom.min.css" />
    <link type="text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-thumbnail.min.css" />

    <section class="section section-header">



        <!-- OR -->


        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>สถานี{{ $data['station']['tele_station_name']['th'] }}</h1>
                    <p class="mb-0">
                        {{-- Updated August 10th, --}}
                        {{ "ต.{$data['geocode']['tumbon_name']['th']} อ.{$data['geocode']['amphoe_name']['th']} จ.{$data['geocode']['province_name']['th']}" }}
                        <span class="current-year"></span>
                    </p>
                    <hr class="my-4" />
                </div>
            </div>

            {{-- number --}}
            <div class="row mt-4">
                <div class="col-lg-12">
                    <x-leaf.statistic.number></x-leaf.statistic.number>                    
                </div>                
            </div>

            {{-- buttons --}}
            <div class="row my-5 ">
                <div class="col-6 text-right">
                    <button class="btn btn-lg btn-primary">
                        <i class="fas fa-water mr-2"></i> ระดับน้ำย้อนหลัง
                    </button>             
                </div>                
                <div class="col-6 text-start">
                    <button class="btn btn-lg btn-secondary">
                        <i class="fas fa-cloud-rain mr-2"></i> ปริมาณฝนย้อนหลัง
                    </button>             
                </div>                
            </div>

            <div class="row mt-5">

                <div class="col-12">
                    <div id="animated-thumbnails"  data-responsive="img/1-375.jpg 375, img/1-480.jpg 480, img/1-757.jpg 757">
                        @foreach ($images as $item)
                            <a data-sub-html="#caption{{ $item["id"] }}" href="{{ $item["download_url"] }}">
                                <img class="img-responsive" width="200"src="{{ $item["download_url"] }}" />
                            </a>
                        @endforeach
                    </div>
                    <div class="caption">
                        @foreach ($images as $item)
                            <div id="caption{{ $item["id"] }}" style="display:none">
                                <h4>{{$item["author"]}}</h4>
                                <p>
                                    {{ date("Y-M-d", mt_rand(1, time())) }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <script src="js/lightgallery.umd.js"></script> --}}
    <!-- Or use the minified version -->
    {{-- https://cdnjs.com/libraries/lightgallery --}}
    {{-- https://www.lightgalleryjs.com/demos/ --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js"></script>

    <!-- lightgallery plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/mediumZoom/lg-medium-zoom.min.js">
    </script>

    <script>
        lightGallery(document.getElementById('animated-thumbnails'), {
            thumbnail: true,
        });
    </script>
</x-leaf.theme>
