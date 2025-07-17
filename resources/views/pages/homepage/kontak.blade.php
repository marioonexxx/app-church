@extends('pages.homepage.layout.navbar')

@section('meta_title', 'Kontak Kami - Jemaat GPM Halong Anugerah')
@section('meta_description', 'Hubungi Jemaat GPM Halong Anugerah untuk informasi kebaktian, pelayanan jemaat, atau
    kebutuhan administrasi gereja. Kami siap melayani Anda.')
@section('meta_keywords', 'Kontak Jemaat GPM, GPM Halong, Gereja Protestan Maluku, Alamat GPM Halong, Pelayanan GPM,
    Hubungi Gereja, Nomor telepon GPM Halong')



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
                        Kontak - {{ $header->judul ?? 'Nama Gereja' }}</h1>
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
                                <input type="text" name="name" class="form-control required" placeholder="Your name*">
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
