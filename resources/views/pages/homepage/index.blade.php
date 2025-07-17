@extends('pages.homepage.layout.navbar')

@section('content')
    <!-- start section image slider -->
    <section class="section-dark p-0 bg-dark-gray">
        <div class="swiper lg-no-parallax magic-cursor  full-screen md-h-600px sm-h-500px ipad-top-space-margin swiper-light-pagination"
            data-slider-options='{ "slidesPerView": 1, "loop": true, "parallax": true, "speed": 1000, "pagination": { "el": ".swiper-pagination-bullets", "clickable": true }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "autoplay": { "delay": 4000, "disableOnInteraction": false },  "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
            <div class="swiper-wrapper">
                <!-- start slider item -->
                @foreach ($slideShow as $item)
                    <div class="swiper-slide overflow-hidden">
                        <div class="cover-background position-absolute top-0 start-0 w-100 h-100" data-swiper-parallax="500"
                            style="background-image:url('{{ Storage::url($item->image) }}');">
                            <div class="opacity-light bg-gradient-sherpa-blue-black"></div>
                            <div class="container h-100" data-swiper-parallax="-500">
                                <div class="row align-items-center h-100">
                                    <div class="col-xl-7 col-lg-8 col-md-10 position-relative text-white text-center text-md-start"
                                        data-anime='{ "el": "childs", "translateX": [100, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                                        <div>
                                            <span
                                                class="fs-20 opacity-6 mb-25px sm-mb-15px d-inline-block fw-300">{{ $item->judul }}</span>
                                        </div>
                                        <h1 class="alt-font w-90 xl-w-100 text-shadow-double-large ls-minus-2px"><span
                                                class="fw-600">{{ $item->sub_judul }}</span></h1>
                                        @if (!empty($item->link) && $item->link !== '#')
                                            <a href="{{ $item->link }}" target="_blank"
                                                class="btn btn-extra-large btn-rounded with-rounded btn-base-color btn-box-shadow box-shadow-extra-large mt-20px sm-mt-0">
                                                Selengkapnya
                                                <span class="bg-white text-base-color">
                                                    <i class="fas fa-arrow-right"></i>
                                                </span>
                                            </a>
                                        @endif

                                    </div>
                                </div>
                                <div class="position-absolute bottom-minus-45px"
                                    data-anime='{ "translateY": [150, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                                    <span
                                        class="alt-font number text-base-color opacity-3 fs-190 fw-600 ls-minus-5px">01</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- start slider pagination -->
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>
            <!-- end slider pagination -->
            <!-- start slider navigation -->
            <!--<div class="slider-one-slide-prev-1 icon-extra-large text-white swiper-button-prev slider-navigation-style-06 d-none d-sm-inline-block"><i class="line-icon-Arrow-OutLeft"></i></div>
                                                                                                                                                    <div class="slider-one-slide-next-1 icon-extra-large text-white swiper-button-next slider-navigation-style-06 d-none d-sm-inline-block"><i class="line-icon-Arrow-OutRight"></i></div>-->
            <!-- end slider navigation -->
        </div>
    </section>
    <!-- end section -->


    <!-- start section sambutan KMJ -->
    <section class="pb-8 md-pb-17 xs-pb-28 bg-solitude-blue" id="tentang">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-9 md-mb-50px text-center text-lg-start"
                    data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <span
                        class="bg-solitude-blue text-uppercase fs-13 ps-25px pe-25px alt-font fw-600 text-base-color lh-40 sm-lh-55 border-radius-100px d-inline-block mb-25px">Sambutan
                        KMJ</span>
                    <h3 class="alt-font text-dark-gray fw-600 ls-minus-1px mb-20px sm-w-85 xs-w-100 mx-auto">Selamat
                        Datang di {{ $header->judul ?? 'Nama Gereja' }}</h3>
                    <p>Salam sejahtera dalam kasih Tuhan kita Yesus Kristus,
                        Puji dan syukur kita panjatkan kepada Tuhan yang telah menyertai perjalanan pelayanan Gereja
                        Protestan Maluku (GPM), khususnya Jemaat GPM Halong Anugerah, hingga saat ini. Dengan penuh sukacita
                        kami menyambut kehadiran saudara/i di website resmi jemaat ini — sebuah ruang digital yang kami
                        hadirkan sebagai wujud keterbukaan informasi, pelayanan, dan komunikasi antara gereja dan jemaat,
                        serta masyarakat umum.</p>
                    <div class="d-flex flex-row justify-content-center justify-content-lg-start align-items-center mt-35px">


                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 offset-xl-1 position-relative">
                    <div class="text-end w-80 md-w-75 ms-auto" data-animation-delay="500" data-shadow-animation="true"
                        data-bottom-top="transform: translateY(50px)" data-top-bottom="transform: translateY(-50px)">
                        <img src="{{ asset('crafto/images/kmj/kmj-edit-1.png') }}" alt="Ketua Mejalis Jemaat"
                            class="border-radius-5px">


                        {{-- <img src="https://placehold.co/750x800" alt="" class="border-radius-5px"> --}}
                    </div>
                    {{-- <div class="w-60 md-w-50 xs-w-55 overflow-hidden position-absolute left-15px bottom-minus-50px"
                        data-shadow-animation="true" data-animation-delay="500"
                        data-bottom-top="transform: translateY(-50px)" data-top-bottom="transform: translateY(50px)">
                        <img src="https://placehold.co/638x638" alt=""
                            class="border-radius-5px box-shadow-quadruple-large" />
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- start section jadwal kebaktian -->
    <section class="bg-gradient-very-light-gray position-relative" id="jadwal-kebaktian">
        <div class="container">
            <div class="row">
                <div class="row justify-content-center mb-2">
                    <div class="col-xl-7 col-lg-9 col-md-10 text-center">
                        <span
                            class="bg-solitude-blue text-uppercase fs-13 ps-25px pe-25px alt-font fw-600 text-base-color lh-40 sm-lh-55 border-radius-100px d-inline-block mb-25px"
                            data-anime='{ "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>Jadwal
                        </span>
                        <h3 class="alt-font text-dark-gray fw-600 ls-minus-1px"
                            data-anime='{ "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            Jadwal Kebaktian & Agenda</h3>
                    </div>
                </div>

                <div class="col tab-style-01">
                    <ul class="nav nav-tabs justify-content-center border-0 text-center fs-18 alt-font fw-600 mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab_sec1">Kebaktian Minggu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab_sec2">Kebaktian Kategorial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab_sec3">Agenda Minggu Ini</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- Tab 1: Kebaktian Minggu -->
                        <div class="tab-pane fade in active show" id="tab_sec1">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-6 animation-float sm-mb-50px"
                                    data-anime='{ "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                                    <img src="{{ asset('crafto/images/homepage/pray-1.png') }}">
                                </div>
                                <div class="col-lg-5 offset-lg-1 col-md-6 text-center text-md-start"
                                    data-anime='{ "el": "childs", "willchange": "transform", "opacity": [0, 1], "rotateY": [-90, 0], "rotateZ": [-10, 0], "translateY": [80, 0], "translateZ": [50, 0], "staggervalue": 200, "duration": 600, "delay": 100, "easing": "easeOutCirc" }'>
                                    <span
                                        class="ps-20px pe-20px mb-25px md-mb-20px text-uppercase text-cornflower-blue fs-13 lh-40 border-radius-100px md-lh-50 alt-font fw-700 bg-solitude-blue d-inline-block">JADWAL</span>
                                    <h3 class="alt-font text-dark-gray fw-700 ls-minus-1px">Jadwal Kebaktian Minggu</h3>
                                    <h6 class="w-80 xl-w-85 lg-w-90 md-w-100 mb-30px">{!! $kebaktianMinggu->konten ?? '' !!}</h6>
                                </div>
                            </div>
                        </div>
                        <!-- End Tab 1 -->

                        <!-- Tab 2: Kebaktian Kategorial -->
                        <div class="tab-pane fade" id="tab_sec2">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-12 text-center">
                                    <span
                                        class="ps-20px pe-20px mb-25px md-mb-20px text-uppercase text-cornflower-blue fs-13 lh-40 border-radius-100px md-lh-50 alt-font fw-700 bg-solitude-blue d-inline-block">
                                        Kebaktian Kategorial
                                    </span>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped text-center">
                                            <thead class="bg-extra-light-gray">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Ibadah</th>
                                                    <th>Waktu</th>
                                                    <th>Tempat</th>
                                                    <th>Pemimpin</th>
                                                    <th>Kategori</th>
                                                    <th>Sektor</th>
                                                    <th>Unit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kebaktianKategorial as $index => $ibadah)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $ibadah->nama }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($ibadah->waktu)->translatedFormat('l, d F Y') }}
                                                        </td>
                                                        <td>{{ $ibadah->tempat }}</td>
                                                        <td>{{ $ibadah->pemimpin }}</td>
                                                        <td>{{ $ibadah->kategori }}</td>
                                                        <td>{{ $ibadah->sektor }}</td>
                                                        <td>{{ $ibadah->unit }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <a href="#"
                                        class="btn btn-medium btn-switch-text btn-rounded btn-base-color btn-box-shadow">
                                        <span>
                                            <span class="btn-double-text" data-text="Selengkapnya">Selengkapnya</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Tab 2 -->
                        <!-- Tab 3: Agenda Minggu Ini -->
                        <div class="tab-pane fade" id="tab_sec3">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-12 text-center">
                                    <span
                                        class="ps-20px pe-20px mb-25px md-mb-20px text-uppercase text-cornflower-blue fs-13 lh-40 border-radius-100px md-lh-50 alt-font fw-700 bg-solitude-blue d-inline-block">
                                        Agenda Minggu Ini
                                    </span>
                                    <div class="row justify-content-center"
                                        data-anime='{ "el": "childs", "perspective": [1200,1200], "translateY": [30, 0], "scale": [1.05, 1], "rotateX": [30, 0], "opacity": [0,1], "duration": 800, "delay": 0, "easing": "easeOutQuad" }'>
                                        <!-- start fancy text box item -->
                                        <div class="col-lg-6 col-md-8 fancy-text-box-style-02 mb-30px">
                                            <div
                                                class="feature-box feature-box-left-icon-middle h-100 bg-white hover-box dark-hover border-radius-6px ps-4 pe-4 pt-9 pb-9 box-shadow-extra-large box-shadow-extra-large-hover overflow-hidden">
                                                <div class="feature-box-icon ms-40px me-40px lg-ms-15px lg-me-15px">
                                                    <h2 class="text-dark-gray fw-700 ls-minus-1px mb-0">2010</h2>
                                                </div>
                                                <div
                                                    class="feature-box-content border-start border-color-extra-medium-gray ps-40px pe-40px lg-ps-15px lg-pe-15px last-paragraph-no-margin">
                                                    <span class="text-dark-gray fw-600 fs-20 xs-fs-18">Business
                                                        founded</span>
                                                    <p class="text-light-opacity">Lorem ipsum dolor amet</p>
                                                </div>
                                                <div class="feature-box-overlay bg-majorelle-blue"></div>
                                            </div>
                                        </div>
                                        <!-- end fancy text box item -->
                                        <!-- start fancy text box item -->
                                        <div class="col-lg-6 col-md-8 fancy-text-box-style-02 mb-30px">
                                            <div
                                                class="feature-box feature-box-left-icon-middle h-100 bg-white hover-box dark-hover border-radius-6px ps-4 pe-4 pt-9 pb-9 box-shadow-extra-large box-shadow-extra-large-hover overflow-hidden">
                                                <div class="feature-box-icon ms-40px me-40px lg-ms-15px lg-me-15px">
                                                    <h2 class="text-dark-gray fw-700 ls-minus-1px mb-0">2012</h2>
                                                </div>
                                                <div
                                                    class="feature-box-content border-start border-color-extra-medium-gray ps-40px pe-40px lg-ps-15px lg-pe-15px last-paragraph-no-margin">
                                                    <span class="text-dark-gray fw-600 fs-20 xs-fs-18">Build new
                                                        office</span>
                                                    <p class="text-light-opacity">Lorem ipsum dolor amet</p>
                                                </div>
                                                <div class="feature-box-overlay bg-majorelle-blue"></div>
                                            </div>
                                        </div>
                                        <!-- end fancy text box item -->
                                        <!-- start fancy text box item -->
                                        <div class="col-lg-6 col-md-8 fancy-text-box-style-02 md-mb-30px">
                                            <div
                                                class="feature-box feature-box-left-icon-middle h-100 bg-white hover-box dark-hover border-radius-6px ps-4 pe-4 pt-9 pb-9 box-shadow-extra-large box-shadow-extra-large-hover overflow-hidden">
                                                <div class="feature-box-icon ms-40px me-40px lg-ms-15px lg-me-15px">
                                                    <h2 class="text-dark-gray fw-700 ls-minus-1px mb-0">2014</h2>
                                                </div>
                                                <div
                                                    class="feature-box-content border-start border-color-extra-medium-gray ps-40px pe-40px lg-ps-15px lg-pe-15px last-paragraph-no-margin">
                                                    <span class="text-dark-gray fw-600 fs-20 xs-fs-18">Relocates
                                                        headquarter</span>
                                                    <p class="text-light-opacity">Lorem ipsum dolor amet</p>
                                                </div>
                                                <div class="feature-box-overlay bg-majorelle-blue"></div>
                                            </div>
                                        </div>
                                        <!-- end fancy text box item -->
                                        <!-- start fancy text box item -->
                                        <div class="col-lg-6 col-md-8 fancy-text-box-style-02">
                                            <div
                                                class="feature-box feature-box-left-icon-middle h-100 bg-white hover-box dark-hover border-radius-6px ps-4 pe-4 pt-9 pb-9 box-shadow-extra-large box-shadow-extra-large-hover overflow-hidden">
                                                <div class="feature-box-icon ms-40px me-40px lg-ms-15px lg-me-15px">
                                                    <h2 class="text-dark-gray fw-700 ls-minus-1px mb-0">2018</h2>
                                                </div>
                                                <div
                                                    class="feature-box-content border-start border-color-extra-medium-gray ps-40px pe-40px lg-ps-15px lg-pe-15px last-paragraph-no-margin">
                                                    <span class="text-dark-gray fw-600 fs-20 xs-fs-18">Revenue of
                                                        millions</span>
                                                    <p class="text-light-opacity">Lorem ipsum dolor amet</p>
                                                </div>
                                                <div class="feature-box-overlay bg-majorelle-blue"></div>
                                            </div>
                                        </div>
                                        <!-- end fancy text box item -->
                                    </div>



                                    <a href="#"
                                        class="btn btn-medium btn-switch-text btn-rounded btn-base-color btn-box-shadow mt-5">
                                        <span>
                                            <span class="btn-double-text" data-text="Selengkapnya">Selengkapnya</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Tab 2 -->


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section jadwal kebaktian -->

    <!-- start section berita dan kegiatan  -->
    <section class="position-relative overflow-hidden sm-pb-20px bg-solitude-blue" id="berita-kegiatan">
        <div class="separator-line-9px bg-base-color position-absolute top-0px right-0px" data-bottom-top="width: 15%"
            data-center-top="width: 100%;"></div>
        <div class="container">
            <div class="row justify-content-center mb-2">
                <div class="col-xl-7 col-lg-9 col-md-10 text-center">
                    <span
                        class="bg-solitude-blue text-uppercase fs-13 ps-25px pe-25px alt-font fw-600 text-base-color lh-40 sm-lh-55 border-radius-100px d-inline-block mb-25px"
                        data-anime='{ "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>Berita
                        dan Kegiatan</span>
                    <h3 class="alt-font text-dark-gray fw-600 ls-minus-1px"
                        data-anime='{ "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        Berita dan Kegiatan Terbaru</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-md-0">
                    <ul class="blog-classic blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large"
                        data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <li class="grid-sizer"></li>

                        @foreach ($blogPost as $item)
                            <!-- start blog item -->
                            <li class="grid-item">
                                <div class="card bg-transparent border-0 h-100">
                                    <div class="blog-image position-relative overflow-hidden border-radius-6px">
                                        <a href="{{ route('homepage.blogdetail', $item->slug) }}" <a href=""><img
                                                src="{{ Storage::url($item->image) }}" alt="" /></a>
                                    </div>
                                    <div class="card-body px-0 pb-30px pt-30px xs-pb-15px">
                                        <span class="fs-14 text-uppercase mb-5px d-block">
                                            <a
                                                class="text-dark-gray fw-600 categories-text">{{ $item->kategori->nama_kategori }}</a><a
                                                href="#"
                                                class="blog-date">{{ $item->created_at->format('d-M-Y') }}</a>
                                        </span>
                                        <a href="{{ route('homepage.blogdetail', $item->slug) }}"
                                            class="card-title mb-0 fw-500 fs-18 lh-30 text-dark-gray d-inline-block">{{ $item->judul }}</a>
                                    </div>
                                </div>
                            </li>
                            <!-- end blog item -->
                        @endforeach

                    </ul>

                </div>
                <div class="col-md-12 text-center">
                    <a href="{{ route('homepage.beritakegiatan') }}"
                        class="btn btn-base-color btn-small btn-rounded text-center">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section warta jemaat dan pengumuman -->
    <section class="bg-white" id="warta-informasi">
        <div class="container">
            <div class="row justify-content-center mb-2">
                <div class="col-xl-7 col-lg-9 col-md-10 text-center">
                    <span
                        class="bg-solitude-blue text-uppercase fs-13 ps-25px pe-25px alt-font fw-600 text-base-color lh-40 sm-lh-55 border-radius-100px d-inline-block mb-25px">
                        Informasi
                    </span>
                    <h3 class="alt-font text-dark-gray fw-600 ls-minus-1px">
                        Warta Jemaat & Pengumuman
                    </h3>
                </div>
            </div>

            <div class="row">
                <!-- Warta Jemaat -->
                <div class="col-lg-6 ">

                    @foreach ($wartaJemaat as $item)
                        <div class="mb-4">
                            <div
                                class="bg-solitude-blue border border-color-extra-medium-gray p-20px box-shadow-small border-radius-6px d-flex justify-content-between align-items-center flex-wrap">
                                <div class="me-3 mb-5 flex-grow-1">
                                    <span class="fw-600 text-dark-gray">{{ $item->judul }}</span>
                                </div>
                                <div class="text-nowrap">
                                    <a href="{{ asset('storage/' . $item->files) }}" target="_blank"
                                        class="btn btn-sm btn-warning btn-rounded">
                                        <i class="bi bi-file-earmark-pdf me-1"></i> Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="text-center mb-3">
                        <a href="#" class="btn btn-base-color btn-small btn-rounded">WARTA LENGKAP</a>
                    </div>
                </div>
                <!-- Pengumuman -->
                <div class="col-lg-6">
                    @foreach ($pengumuman as $item)
                        <div class="mb-4">
                            <div
                                class="bg-solitude-blue border border-color-extra-medium-gray p-30px sm-p-20px box-shadow-small border-radius-6px h-100">
                                <div class="mb-3">
                                    <span class="badge bg-base-color text-white me-2">Dari: {{ $item->asal }}</span>
                                    <span class="badge bg-success text-white">Kepada: {{ $item->tujuan }}</span>
                                </div>
                                <h5 class="text-dark-gray mb-15px">{{ $item->judul }}</h5>
                                <p class="mb-0">{!! $item->konten !!}</p>


                            </div>
                        </div>
                    @endforeach

                    <div class="text-center mb-3">
                        <a href="#" class="btn btn-base-color btn-small btn-rounded">PENGUMUMAN LENGKAP</a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- end section -->

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


    <!-- start section counter data jemaat -->
    <section class="big-section pt-0 mt-5">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-xl-6 col-lg-8 text-center">
                    <h3 class="fw-600 text-dark-gray ls-minus-1px">Profil Data Jemaat</h3>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 justify-content-center counter-style-01">
                <!-- start counter item -->
                <div class="col feature-box md-mb-50px xs-mb-5px">
                    <div class="feature-box-icon">
                        <i class="ti-user icon-large text-dark-gray mb-20px d-block"></i>
                    </div>
                    <div class="feature-box-content">
                        <h2 class="d-inline-block align-middle counter-number fw-700 text-dark-gray mb-0 counter"
                            data-speed="2000" data-to="{{ $totalJemaat }}"></h2>
                        <span class="d-block text-dark-gray fw-500">Jumlah Jiwa</span>
                    </div>
                </div>
                <!-- end counter item -->
                <!-- start counter item -->
                <div class="col feature-box md-mb-50px xs-mb-5px">
                    <div class="feature-box-icon">
                        <i class="ti-user icon-large text-dark-gray mb-20px d-block"></i>
                    </div>
                    <div class="feature-box-content">
                        <h2 class="d-inline-block align-middle counter-number fw-700 text-dark-gray mb-0 counter"
                            data-speed="2000" data-to="{{ $totalKK }}"></h2>
                        <span class="d-block text-dark-gray fw-500">Kepala Keluarga</span>
                    </div>
                </div>
                <!-- end counter item -->
                <!-- start counter item -->
                <div class="col feature-box xs-mb-5px">
                    <div class="feature-box-icon">
                        <i class="ti-user icon-large text-dark-gray mb-20px d-block"></i>
                    </div>
                    <div class="feature-box-content">
                        <h2 class="d-inline-block align-middle counter-number fw-700 text-dark-gray mb-0 counter"
                            data-speed="2000" data-to="{{ $totalPria }}"></h2>
                        <span class="d-block text-dark-gray fw-500">Laki-Laki</span>
                    </div>
                </div>
                <!-- end counter item -->
                <!-- start counter item -->
                <div class="col feature-box">
                    <div class="feature-box-icon">
                        <i class="ti-user icon-large text-dark-gray mb-5px d-block"></i>
                    </div>
                    <div class="feature-box-content last-paragraph-no-margin">
                        <h2 class="d-inline-block align-middle counter-number fw-700 text-dark-gray mb-0 counter"
                            data-speed="2000" data-to="{{ $totalWanita }}"></h2>
                        <span class="d-block text-dark-gray fw-500">Perempuan</span>
                    </div>
                </div>
                <!-- end counter item -->
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section kontak us -->
    <section id="down-section" class="overflow-hidden">
        <div class="container">
            <div class="row justify-content-center mb-2">
                <div class="col-xl-7 col-lg-9 col-md-10 text-center">
                    <span
                        class="bg-solitude-blue text-uppercase fs-13 ps-25px pe-25px alt-font fw-600 text-base-color lh-40 sm-lh-55 border-radius-100px d-inline-block mb-25px"
                        data-anime='{ "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>Kontak
                        dan Layanan
                    </span>

                </div>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-3 col-md-6"
                    data-anime='{ "translateX": [-15, 0], "opacity": [0,1], "duration": 600, "delay": 100, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="h-100 sm-h-500px xs-h-400px cover-background"
                        style="background-image: url('{{ asset('crafto/images/homepage/church-1.png') }}')"></div>
                </div>
                <div class="col-lg-4 col-md-6"
                    data-anime='{ "translateX": [15, 0], "opacity": [0,1], "duration": 600, "delay": 100, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="bg-base-color p-18 lg-p-15 h-100">
                        <span class="text-white text-decoration-line-bottom mb-10px d-inline-block">Ada yang ingin
                            ditanyakan?</span>
                        <p class="text-white opacity-5">Jl. Alamat Gereja</p>
                        <span class="text-white text-decoration-line-bottom mb-10px d-inline-block">Nomor telefon yang
                            dapat dihubungi?</span>
                        <p><a href="tel:1800222000" class="text-white opacity-5">0812-2505-2300 (KMJ)</a><br><a
                                href="tel:1800222002" class="text-white opacity-5">0812-2505-2300 (Sekretaris)</a></p>
                        <span class="text-white text-decoration-line-bottom mb-10px d-inline-block">Email yang dapat
                            dihubungi?</span>
                        <a href="mailto:info@yourdomain.com"
                            class="text-white opacity-5 d-block">sekretariat@namagereja.com</a>
                        <a href="mailto:help@yourdomain.com" class="text-white opacity-5 d-block">help@namagereja.com</a>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="pt-5 md-pt-45px contact-form-style-01"
                        data-anime='{ "translateX": [0, 0], "opacity": [0,1], "duration": 600, "delay": 300, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <h5 class="d-inline-block alt-font fw-600 text-dark-gray ls-minus-1px mb-30px">Jika ada
                            pertanyaan dan pengaduan pelayanan, silahkan hubungi kami.</h5>
                        <!-- start contact form -->
                        <form action="email-templates/contact-form.php" method="post">
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-emoji-smile"></i></span>
                                <input type="text" name="name" class="form-control required"
                                    placeholder="Your name*">
                            </div>
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control required"
                                    placeholder="Your email address*">
                            </div>
                            <div class="position-relative form-group form-textarea">
                                <span class="form-icon"><i class="bi bi-chat-square-dots"></i></span>
                                <textarea placeholder="Your message" name="comment" class="form-control" rows="3"></textarea>
                                <input type="hidden" name="redirect" value="">
                                <button
                                    class="btn btn-small btn-round-edge btn-dark-gray btn-box-shadow mt-20px m-auto submit"
                                    type="submit">Send message</button>
                                <div class="form-results mt-20px d-none"></div>
                            </div>
                        </form>
                        <!-- end contact form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
@endsection
