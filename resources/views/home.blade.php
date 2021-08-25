@extends('theme')
@section('content')

<!-- Hero -->
<section class="section-header bg-soft text-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 d-md-none">
                <h1 class="display-2 font-weight-bold mb-0">We<span class="font-weight-bold"> safeguard </span> the environment.</h1>
            </div>
            <div class="col-8 col-md-7 col-lg-6 order-lg-1">
                <!-- Heading -->
                <h1 class="display-2 font-weight-bold d-none d-md-inline">We<span class="font-weight-bold"> safeguard </span> the environment.</h1>
                <!-- Text -->
                <p class="lead text-muted mt-4">Over the past several decades, as the world has <br class="d-none d-lg-inline">increasingly warmed, so has its potential to burn.</p>
                <!-- Buttons -->
                <div class="mt-4 mt-lg-5 mb-5 mb-lg-0">
                    <a href="./html/pages/our-mission.html" class="btn btn-md btn-primary animate-up-2 mr-3">
                        <span class="btn-inner-text"><i class="fas fa-book-reader mr-2"></i>Our mission</span>
                    </a>
                    <a href="#" class="btn btn-md btn-white animate-up-2 d-none d-lg-inline-block">
                        <span class="btn-inner-text"><i class="fas fa-file-download mr-2"></i>Download report</span>
                    </a>
                </div>
            </div>
            <div class="col-4 col-md-5 col-lg-6 order-lg-2"> 
                <!-- Image -->
                <img src="./asset/img/forest.svg" class="img-fluid mb-lg-6 mb-0" alt="Forest Illustration"> -->
                <img src="{{ asset('leaf/assets/img/forest.svg') }}" class="img-fluid mb-lg-6 mb-0" alt="Forest Illustration">
            </div>

            @include('map')

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
                            <h6 class="font-weight-bold mb-2">Carbon Dioxide</h6>
                            <!-- Heading -->
                            <h2 class="text-gray mb-0">
                                <span class="icon-danger mr-2"><i class="fas fa-long-arrow-alt-up"></i></span><span class="counter display-3 mr-2">412</span>
                            </h2>
                            <!-- Text -->
                            <span class="text-center text-muted mb-0">parts per million</span>
                        </div>
                    </div>
                    <div class="card border-left-md border-soft">
                        <div class="card-body text-center">
                            <h6 class="font-weight-bold mb-2">Global Temperature</h6>
                            <!-- Heading -->
                            <h2 class="text-gray mb-0">
                                <span class="icon-danger mr-2"><i class="fas fa-long-arrow-alt-up"></i></span><span class="counter display-3 mr-2">1.9</span>°F
                            </h2>
                            <!-- Text -->
                            <span class="text-center text-muted mb-0">since 1880</span>
                        </div>
                    </div>
                    <div class="card border-left-md border-soft">
                        <div class="card-body text-center">
                            <h6 class="font-weight-bold mb-2">Arctic Ice Minimum</h6>
                            <!-- Heading -->
                            <h2 class="text-gray mb-0">
                                <span class="icon-danger mr-2"><i class="fas fa-long-arrow-alt-down"></i></span><span class="counter display-3 mr-2">13</span>%
                            </h2>
                            <!-- Text -->
                            <span class="text-center text-muted mb-0">percent per decade</span>
                        </div>
                    </div>
                    <div class="card border-left-md border-soft">
                        <div class="card-body text-center">
                            <h6 class="font-weight-bold mb-2">Sea Level</h6>
                            <!-- Heading -->
                            <h2 class="text-gray mb-0">
                                <span class="icon-danger mr-2"><i class="fas fa-long-arrow-alt-up"></i></span><span class="counter display-3 mr-2">3.3</span>
                            </h2>
                            <!-- Text -->
                            <span class="text-center text-muted mb-0">millimeters per year</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="section section-lg">
    <div class="container">
        <div class="row mb-4 mb-lg-6">
            <div class="col-lg-6 pr-lg-5">
                <p class="h5 font-weight-bold lh-180">LEAF was created to provide policymakers with regular scientific assessments on climate change, its implications and potential future risks, as well as to put forward adaptation and mitigation options.</p>
            </div>
            <div class="col-lg-6">
                <p class="lead lh-180">Through its assessments, the LEAF determines the state of knowledge on climate change. It identifies where there is agreement in the scientific community on topics related to climate change, and where further research is needed. The reports are drafted and reviewed in several stages, thus guaranteeing objectivity and transparency. The LEAF does not conduct its own research.</p>
                <p class="lead lh-180">LEAF reports are neutral, policy-relevant but not policy-prescriptive. The assessment reports are a key input into the international negotiations to tackle climate change.</p>
            </div>
        </div>
        <div class="col text-center">
            <a href="./html/pages/about.html" class="btn btn-md btn-primary animate-up-2 mr-3">
                <span class="btn-inner-text"><i class="fas fa-book-open mr-2"></i>Learn more about Leaf</span>
            </a>
        </div>
    </div>
</div>
<section class="section section-lg pb-10 pb-lg-11 bg-soft">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center text-dark">
                <h2 class="h1">What is Climate Change?</h2>
                <p class="lead text-gray my-4">Climate change occurs when changes in Earth's climate system result in new weather patterns that remain in place for an extended period of time.</p>
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
                        <span class="badge badge-secondary badge-pill mb-2">Evidence</span>
                        <h5 class="mb-3">How Do We Know?</h5>
                        <p class="text-gray mb-0">The Earth's climate has changed throughout history</p>
                    </div>
                    <div>
                        <img src="./asset/img/illustrations/evidence.svg" class="img-fluid img-center" alt="Illustration">
                    </div>
                </a>
            </div>
            <div class="col-12 col-lg-4 mb-5">
                <a class="card animate-up-3 shadow-sm border-soft" href="./html/pages/our-mission.html">
                    <div class="px-5 pt-4 pb-5">
                        <span class="badge badge-primary badge-pill mb-2">Causes</span>
                        <h5 class="mb-3">Causes of Climate Change</h5>
                        <p class="text-gray mb-0">Life on Earth depends on energy coming from the Sun</p>
                    </div>
                    <div>
                        <img src="./asset/img/illustrations/causes.svg" class="img-fluid img-center" alt="Illustration">
                    </div>
                </a>
            </div>
            <div class="col-12 col-lg-4 mb-5">
                <a class="card animate-up-3 shadow-sm border-soft" href="./html/pages/our-mission.html">
                    <div class="px-5 pt-4 pb-5">
                        <span class="badge badge-tertiary badge-pill mb-2">Solution</span>
                        <h5 class="mb-3">Solving the problem</h5>
                        <p class="text-gray mb-0">NASA is a world leader in climate studies and Earth science</p>
                    </div>
                    <div>
                        <img src="./asset/img/illustrations/solution.svg" class="img-fluid img-center" alt="Illustration">
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
                <span class="badge badge-primary badge-pill badge-lg mb-4">Our Activities</span>
                <p class="h2">The main activity of the <span class="font-weight-bold">LEAF</span> is the preparation of reports assessing the state of knowledge of climate change.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <!-- Card -->
                <a class="card mb-5 mb-lg-0 pb-11 overlay-primary rounded bg-image animate-up-3" href="./html/pages/update.html" data-background="./asset/img/activity-1.jpg">
                    <!-- Body -->
                    <div class="card-body z-2 my-auto text-white">
                        <span class="font-weight-bold"><i class="fas fa-dot-circle mr-2"></i>Scoping Meeting</span>
                        <!-- Heading -->
                        <h4 class="font-weight-normal mt-4 mb-3">
                            Scoping meeting for the Synthesis Report of the Sixth Assessment Report
                        </h4>

                        <!-- Text -->
                        <p class="mb-0">
                            <i class="far fa-calendar-alt mr-2"></i>October 21, <span class="current-year"></span>
                        </p>

                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <!-- Card -->
                <a class="card mb-4 mb-lg-0 pb-11 overlay-secondary rounded bg-image animate-up-3" href="./html/pages/update.html" data-background="./asset/img/activity-2.jpg">
                    <!-- Body -->
                    <div class="card-body z-2 my-auto text-white">
                        <span class="font-weight-bold"><i class="fas fa-dot-circle mr-2"></i>Lead Author Meetings</span>
                        <!-- Heading -->
                        <h4 class="font-weight-normal mt-4 mb-3">
                            Third Lead Author Meeting of the IPCC Working Group I Sixth Assessment Report
                        </h4>

                        <!-- Text -->
                        <p class="mb-0">
                            <i class="far fa-calendar-alt mr-2"></i>August 26, <span class="current-year"></span>
                        </p>

                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <!-- Card -->
                <a class="card mb-4 mb-lg-0 pb-11 overlay-tertiary rounded bg-image animate-up-3" href="./html/pages/update.html" data-background="./asset/img/activity-3.jpg">
                    <!-- Body -->
                    <div class="card-body z-2 my-auto text-white">
                        <span class="font-weight-bold"><i class="fas fa-dot-circle mr-2"></i>Meeting</span>
                        <!-- Heading -->
                        <h4 class="font-weight-normal mt-4 mb-3">
                            Second Joint Session of IPCC Working Groups I, II and III, in cooperation with the TFI and IPCC 50
                        </h4>

                        <!-- Text -->
                        <p class="mb-0">
                            <i class="far fa-calendar-alt mr-2"></i>August 1, <span class="current-year"></span>
                        </p>

                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 d-flex d-lg-none">
                <!-- Card -->
                <a class="card mb-5 mb-lg-0 pb-11 overlay-primary rounded bg-image animate-up-3" href="./html/pages/update.html" data-background="./asset/img/activity-3.jpg">
                    <!-- Body -->
                    <div class="card-body z-2 my-auto text-white">
                        <span class="font-weight-bold"><i class="fas fa-dot-circle mr-2"></i>Meeting</span>
                        <!-- Heading -->
                        <h4 class="font-weight-normal mt-4 mb-3">
                            Second Joint Session of IPCC Working Groups I, II and III, in cooperation with the TFI and IPCC 50
                        </h4>

                        <!-- Text -->
                        <p class="mb-0">
                            <i class="far fa-calendar-alt mr-2"></i>August 1, <span class="current-year"></span>
                        </p>

                    </div>
                </a>
            </div>
        </div>
        <div class="col text-center mt-lg-6">
            <a href="./html/pages/updates.html" class="btn btn-md btn-primary animate-hover mr-3">
                <span class="btn-inner-text">View all Activities<i class="fas fa-arrow-right animate-right-3 ml-2"></i></span>
            </a>
        </div>
    </div>
</section>

@include('pricing')

@include('_pre-footer')
@endsection