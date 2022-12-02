<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Primary Meta Tags -->
    <title>THUNGSONG</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="title" content="Leaf - Non Profit environmental Bootstrap 4 Theme" />
    <meta name="author" content="Themesberg" />
    <meta name="description" content="Leaf is the highest quality and most abundantly featured non profit environmental Bootstrap 4 theme ever created. Having a clean and beautiful UI and UX you can reach and truly get your message across about environmental issues." />
    <meta name="keywords" content="bootstrap 4, bootstrap, bootstrap 4 theme, bootstrap 4 non profit, bootstrap 4 environmental, climate change theme, environmental theme, green bootstrap 4 theme, themesberg, gulp, sass, responsive, responsive bootstrap 4 theme" />
    <link rel="canonical" href="https://themesberg.com/product/web-templates/leaf-non-profit-environmental-bootstrap-4-theme" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://themesberg.com/product/web-templates/leaf-non-profit-environmental-bootstrap-4-theme" />
    <meta property="og:title" content="Leaf - Non Profit environmental Bootstrap 4 Theme" />
    <meta property="og:description" content="Leaf is the highest quality and most abundantly featured non profit environmental Bootstrap 4 theme ever created. Having a clean and beautiful UI and UX you can reach and truly get your message across about environmental issues." />
    <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/leaf/leaf-preview.jpg" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://themesberg.com/product/web-templates/leaf-non-profit-environmental-bootstrap-4-theme" />
    <meta property="twitter:title" content="Leaf - Non Profit environmental Bootstrap 4 Theme" />
    <meta property="twitter:description" content="Leaf is the highest quality and most abundantly featured non profit environmental Bootstrap 4 theme ever created. Having a clean and beautiful UI and UX you can reach and truly get your message across about environmental issues." />
    <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/leaf/leaf-preview.jpg" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('leaf/assets/img/favicon/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('leaf/assets/img/favicon/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('leaf/assets/img/favicon/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('leaf/assets/img/favicon/site.webmanifest') }}" />
    <link rel="mask-icon" href="{{ asset('leaf/assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="theme-color" content="#ffffff" />

    <!-- Fontawesome -->
    <link type="text/css" href="{{ asset('leaf/node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />

    <!-- Prism -->
    <link type="text/css" href="{{ asset('leaf/node_modules/prismjs/themes/prism.css') }}" rel="stylesheet" />

    <!-- World Map -->
    <link type="text/css" href="{{ asset('leaf/node_modules/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />

    <!-- Leaf CSS -->
    <link type="text/css" href="{{ asset('leaf/css/leaf.css') }}" rel="stylesheet" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js",
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-THQTXJ7");
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141734189-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "UA-141734189-6");
    </script>

    <!-- leaflet map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <style>
        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
        h1, h2, h3, h4, h5, h6, nav, .nav, .menu, button, .button, .btn, .price, ._heading, .wp-block-pullquote blockquote, blockquote, label, legend, a, .card-header, th ,p, li{
            font-family: "Prompt", "Open Sans script=all rev=1" !important;
            font-weight: 400 !important;
            
        }
        #ofBar{
            display: none !important;
        }
    </style>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THQTXJ7" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <x-leaf.header mode="{{ $mode }}"></x-leaf.header>
    <main>
        {{ $slot }}
        {{-- <x-leaf.pre-footer></x-leaf.pre-footer> --}}
    </main>

    <!-- Footer -->
    <x-leaf.footer></x-leaf.footer>
    <!-- End of Footer -->

    <!-- Core -->
    <x-leaf.script></x-leaf.script>
</body>

</html>