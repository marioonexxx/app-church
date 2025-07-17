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
                        Gallery - Video</h1>
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
    <section class="bg-gradient-very-light-gray ps-6 pe-6 lg-ps-2 lg-pe-2">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center mb-2">
                    <h3 class="alt-font fw-700 text-dark-gray ls-minus-1px">Video Gallery</h3>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                @foreach ($videoGallery as $item)
                    <div class="col text-center fit-videos mb-4">
                        <iframe width="300" height="200" src="{{ $item->link_video }}" allowfullscreen></iframe>
                        <div class="text-dark-gray fs-18 fw-600 mt-3">{{ $item->caption }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- end section -->
@endsection
