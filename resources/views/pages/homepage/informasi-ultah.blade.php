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
                        Informasi Ulang Tahun {{ $header->judul }}</h1>
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

                <div class="col-xl-12 col-lg-6 offset-lg-1 col-md-9 ps-6 text-center text-lg-start lg-ps-15px"
                    data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <span
                        class="bg-solitude-blue text-uppercase fs-13 ps-25px pe-25px alt-font fw-600 text-base-color lh-40 sm-lh-55 border-radius-100px d-inline-block mb-25px">Informasi
                        Ulang Tahun</span>
                    {{-- <h3 class="fw-600 text-dark-gray ls-minus-2px alt-font sm-w-80 xs-w-100 mx-auto sm-mb-20px">Minggu Ini
                        {{ $header->judul ?? 'Nama Gereja' }}</h3> --}}

                    <!-- Pengumuman -->
                    <div class="col-lg-12">
                        <!-- Info Ulang Tahun -->


                        <div class="mb-4">
                            <div
                                class="bg-solitude-blue border border-color-extra-medium-gray p-30px sm-p-20px box-shadow-small border-radius-6px h-100">
                                <div class="mb-3">
                                    <span class="badge bg-base-color text-white me-2">
                                        <i class="fa-solid fa-cake-candles me-1"></i> Yang berulang tahun minggu ini:
                                    </span>


                                </div>
                                @foreach ($ultahJemaat as $item)
                                    <p class="text-dark-gray mb-15px">
                                        {{ strtoupper($item->nama) }} | TGL HUT:
                                        {{ strtoupper(\Carbon\Carbon::parse($item->tgl_lahir)->translatedFormat('d F Y')) }}
                                        | SEKTOR : {{ strtoupper($item->sektor) }}
                                        UNIT : {{ strtoupper($item->unit) }}
                                    </p>
                                @endforeach




                            </div>
                        </div>





                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- end section -->
@endsection
