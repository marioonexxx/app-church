<!doctype html>
<html class="no-js" lang="id">

<head>
    <title>@yield('meta_title', 'Selamat Datang di GPM Halong Anugerah')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="GPM Halong Anugerah">
    <meta name="description" content="@yield('meta_description', 'Website resmi GPM Halong Anugerah yang berisi berita gereja, kegiatan pelayanan, dan informasi rohani lainnya.')">
    <meta name="keywords" content="@yield('meta_keywords', 'GPM Halong Anugerah, gereja, kegiatan gereja, ibadah, pelayanan, jemaat, Ambon')">

    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{ asset('crafto/images/favicon2.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('crafto/images/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('crafto/images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('crafto/images/apple-touch-icon-114x114.png') }}">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- style sheets and font icons -->
    <link rel="stylesheet" href="{{ asset('crafto/css/vendors.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('crafto/css/icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('crafto/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('crafto/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('crafto/demos/business/business.css') }}" />
    @yield('script')
</head>

<body data-mobile-nav-style="classic">
    @include('pages.homepage.layout.menubar')
    @yield('content')
    @include('pages.homepage.layout.footer')
    {{-- <!-- start sticky column -->
    <div class="sticky-wrap z-index-1 d-none d-xl-inline-block" data-animation-delay="100" data-shadow-animation="true">
        <span class="fs-15 fw-500"><i class="feather icon-feather-mail icon-small me-10px align-middle"></i>Effective
            business solutions? — <a href="demo-business-contact.html" class="text-decoration-line-bottom fw-600">Get
                started now</a></span>
    </div>
    <!-- end sticky column --> --}}
    <!-- start scroll progress -->
    <div class="scroll-progress d-none d-xxl-block">
        <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
        </a>
    </div>
    <!-- end scroll progress -->
    <!-- javascript libraries -->
    <script type="text/javascript" src="{{ asset('crafto/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('crafto/js/vendors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('crafto/js/main.js') }}"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


    @stack('script')
</body>

</html>
