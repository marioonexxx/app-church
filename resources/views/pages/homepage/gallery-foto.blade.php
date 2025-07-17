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
                        Gallery - Foto</h1>
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
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 text-center">
                    <h3 class="fw-600 text-dark ls-minus-1px">Foto & Video Gallery Terbaru</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul
                        class="image-gallery-style-02 gallery-wrapper grid grid-4col xxl-grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-large">
                        <li class="grid-sizer"></li>
                        <!-- start gallery item -->
                        @foreach ($fotoGallery as $item)
                            <li class="grid-item transition-inner-all atropos" data-atropos data-atropos-perspective="1150">
                                <div class="atropos-scale">
                                    <div class="atropos-rotate">
                                        <div class="atropos-inner" data-atropos-offset="3">
                                            <div class="gallery-box">

                                                <a href="{{ asset('storage/' . $item->foto_upload) }}"
                                                    data-group="lightbox-group-gallery-item-2" title="{{ $item->caption }}">
                                                    <div class="position-relative gallery-image bg-slate-blue">
                                                        <img src="{{ asset('storage/' . $item->foto_upload) }}"
                                                            alt="{{ $item->caption }}" class="img-fluid" />

                                                        <div
                                                            class="d-flex align-items-center justify-content-center position-absolute top-0px left-0px w-100 h-100 gallery-hover move-bottom-top">
                                                            <i class="bi bi-camera icon-medium text-white"></i>
                                                        </div>
                                                    </div>
                                                </a>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <!-- end gallery item -->


                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
@endsection
