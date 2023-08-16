<x-leaf.theme mode="navbar-light" title="สถานที่"
    description="บทความที่เกี่ยวข้องกับงายวิจัย ความรู้ที่เป็นประโยชน์และต้องการเผยแพร่สู่สาธารณะ"
    image="https://cdn-images-1.medium.com/max/1024/1*pnw6OuU-R4JXzgUUPWbmbg.jpeg">

    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery.min.css" />

    <!-- lightgallery plugins -->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-zoom.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-thumbnail.min.css" />

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


            <div class="row">

                <div class="col-12">
                    <div class="blog-card">
                        <div class="card border-0" data-equalize-height="related-news">
                            <a href="" target="_blank">
                                <img src="https://hips.hearstapps.com/hmg-prod/images/index-luxuryfurniture-1659361945.jpg?resize=1200:*"
                                    class="card-img-top" alt="Related news image 1" height=300>
                            </a>
                            <div class="card-body px-0">
                                <small class="d-block mb-2">
                                    {{-- January 20, <span class="current-year">2022</span> --}}

                                </small>
                                <h2 class="h5">
                                    <a href="" target="_blank"></a>
                                </h2>
                                <p class="card-text my-2"></p>
                                <small class="d-block mb-2">

                                </small>
                            </div>
                            <div class="card-footer px-0 pt-0">
                                <a class="btn btn-sm btn-block btn-primary animate-up-2" href="" target="_blank">
                                    <span class="fas fa-book-open mr-1"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div id="animated-thumbnails">
                        @foreach(range(1,16) as $i)
                        <a href="https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-{{$i}}.png">
                            <img src="https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-{{$i}}.png" />
                        </a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/mediumZoom/lg-medium-zoom.min.js"></script>

    <script>
        lightGallery(document.getElementById('animated-thumbnails'), {
            thumbnail: true,
        });
    </script>
</x-leaf.theme>
