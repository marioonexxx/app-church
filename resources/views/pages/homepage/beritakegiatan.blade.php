@extends('pages.homepage.layout.navbar')

@section('content')
    <!-- start page title -->
    <section class="page-title-big-typography bg-dark-gray ipad-top-space-margin" data-parallax-background-ratio="0.5"
        style="background-image: url('{{ asset('crafto/images/header/header-1.jpg') }}')">
        <div class="opacity-extra-medium bg-dark-slate-blue"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center extra-small-screen">
                <div class="col-12 position-relative text-center page-title-extra-large">
                    <h1 class="m-auto text-white text-shadow-double-large fw-500 ls-minus-3px xs-ls-minus-2px"
                        data-anime='{ "translateY": [15, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        Berita dan Kegiatan</h1>
                </div>
                <div class="down-section text-center"
                    data-anime='{ "translateY": [-15, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <a href="#down-section" aria-label="scroll down" class="section-link">
                        <div
                            class="d-flex justify-content-center align-items-center mx-auto rounded-circle fs-30 text-white">
                            <i class="feather icon-feather-chevron-down"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->

    <!-- start section -->
    <section id="down-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">

                <div class="col-xl-12"
                    data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <span
                        class="bg-solitude-blue text-uppercase fs-13 ps-25px pe-25px alt-font fw-600 text-base-color lh-40 sm-lh-55 border-radius-100px d-inline-block mb-25px">Berita dan Kegiatan</span>
                    <h3 class="fw-600 text-dark-gray ls-minus-2px alt-font sm-w-80 xs-w-100 mx-auto sm-mb-20px">Berita dan Kegiatan Terbaru {{ $header->judul ?? 'Nama Gereja' }}</h3>



                </div>

                 <div class="col-xl-12"
                    data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <ul class="blog-classic blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large"
                        data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <li class="grid-sizer"></li>

                        @foreach ($blogPost as $item)
                        <!-- start blog item -->
                        <li class="grid-item">
                            <div class="card bg-transparent border-0 h-100">
                                <div class="blog-image position-relative overflow-hidden border-radius-6px">
                                    <a href="{{ route('homepage.blogdetail', $item->slug) }}">
                                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->judul }}" />
                                    </a>
                                </div>
                                <div class="card-body px-0 pb-30px pt-30px xs-pb-15px">
                                    <span class="fs-14 text-uppercase mb-5px d-block">
                                        <a class="text-dark-gray fw-600 categories-text">{{ $item->kategori->nama_kategori }}</a><a href="#"
                                            class="blog-date">{{ $item->created_at->format('d-M-Y') }}</a>
                                        </span>
                                    <a href="{{ route('homepage.blogdetail', $item->slug) }}" class="card-title mb-0 fw-500 fs-18 lh-30 text-dark-gray d-inline-block">{{ $item->judul}}</a>
                                </div>
                            </div>
                        </li>
                        <!-- end blog item -->

                           @endforeach

                    </ul>

                </div>

            </div>

        </div>
    </section>
    <!-- end section -->
@endsection
