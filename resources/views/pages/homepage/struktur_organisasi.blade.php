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
                        Tentang - Struktur Organisasi</h1>
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

    <!-- start section struktur majelis jemaat -->
    <section class="bg-very-light-gray background-position-center-top sm-background-image-none"
        style="background-image: url('images/vertical-line-bg-medium-gray.svg')">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-xl-6 col-lg-8 text-center">
                    <h3 class="fw-600 text-dark-gray ls-minus-1px">Perangkat Majelis Jemaat</h3>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2"
                data-anime='{ "el": "childs", "translateX": [-50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                @foreach ($perangkat as $item)
                    <div class="col text-center team-style-01 md-mb-30px">
                        <figure class="mb-0 hover-box box-hover position-relative">
                            <img src="{{ $item->foto_upload ? asset('storage/' . $item->foto_upload) : asset('images/default.jpg') }}"
                                alt="Foto" class="border-radius-6px" />

                            <figcaption class="w-100 p-30px lg-p-20px bg-white">
                                <div class="position-relative z-index-1 overflow-hidden lg-pb-5px">
                                    <span
                                        class="fs-18 d-block fw-600 text-dark-gray lh-26 ls-minus-05px">{{ $item->nama_lengkap }}</span>
                                    <p class="m-0">{{ $item->nama_jabatan }}</p>
                                    <div class="social-icon hover-text mt-20px lg-mt-10px social-icon-style-05">
                                        <a href="{{ $item->url_facebook }}" target="_blank"
                                            class="fw-600 text-dark-gray">Fb.</a>
                                        <a href="{{ $item->url_instagram }}" target="_blank"
                                            class="fw-600 text-dark-gray">In.</a>
                                    </div>
                                </div>
                                <div class="box-overlay bg-white box-shadow-quadruple-large border-radius-6px"></div>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- end team member item -->
                @endforeach
                <!-- start team member item -->

            </div>
            <div class="col-md-12 text-center mt-2">
                <a href="#" class="btn btn-base-color btn-small btn-rounded text-center">Selengkapnya</a>
            </div>
        </div>
    </section>
    <!-- end section -->
@endsection
