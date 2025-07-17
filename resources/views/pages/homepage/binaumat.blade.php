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
                        Warta dan Informasi - Bina Umat</h1>
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
                        class="bg-solitude-blue text-uppercase fs-13 ps-25px pe-25px alt-font fw-600 text-base-color lh-40 sm-lh-55 border-radius-100px d-inline-block mb-25px">Bina Umat Edisi Terbaru</span>
                    <h3 class="fw-600 text-dark-gray ls-minus-2px alt-font sm-w-80 xs-w-100 mx-auto sm-mb-20px">Bina Umat
                        {{ $header->judul ?? 'Nama Gereja' }}</h3>
                    <!-- Warta Jemaat -->
                    <div class="col-lg-12 mb-8">
                        {{-- <div class="text-center mb-3">
                        <h6 class="alt-font text-dark-gray fw-600">Warta Jemaat</h6>
                    </div> --}}

                        @foreach ($binaumat as $item)
                            <div class="mb-4">
                                <div
                                    class="bg-white border border-color-extra-medium-gray p-20px box-shadow-small border-radius-6px d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="me-3 mb-5 flex-grow-1">
                                        <span class="fw-600 text-dark-gray">{{ $item->nama }}</span>
                                    </div>
                                    <div class="text-nowrap">
                                        <a href="{{ asset('storage/'.$item->file_upload) }}" target="_blank"
                                            class="btn btn-sm btn-warning btn-rounded">
                                            <i class="bi bi-file-earmark-pdf me-1"></i> Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- end section -->
@endsection
