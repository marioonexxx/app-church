@extends('pages.homepage.layout.navbar')
@section('meta_title', $post->meta_title)
@section('meta_description', $post->meta_description)
@section('meta_keywords', $post->meta_keywords)
@section('meta_image', Storage::url($post->image ?? 'crafto/images/default-meta.jpg'))


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
                        {{ $post->judul }}</h1>
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
    <section class="top-space-margin right-side-bar" id="down-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 blog-standard md-mb-50px sm-mb-40px">
                    <!-- start blog details  -->
                    <div class="col-12 blog-details mb-12">
                        <div class="entry-meta mb-20px fs-15">
                            <span>
                                <i class="text-dark-gray feather icon-feather-calendar"></i>
                                {{ $post->created_at->format('d M Y') }}
                            </span>
                            <span>
                                <i class="text-dark-gray feather icon-feather-user"></i>
                                {{ $post->user->name ?? 'Administrator' }}
                            </span>
                            <span>
                                <i class="text-dark-gray feather icon-feather-folder"></i>
                                {{ $post->kategori->nama_kategori ?? '-' }}
                            </span>
                        </div>

                        <h5 class="text-dark-gray fw-600 w-80 sm-w-100 mb-6">
                            {{ $post->judul }}
                        </h5>

                        @if ($post->image)
                            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->judul }}"
                                class="w-100 border-radius-6px mb-7">
                        @endif

                        <div class="konten">
                            {!! $post->konten !!}
                            <div class="mt-4 d-flex gap-2">
                                <a href="https://wa.me/?text={{ urlencode($post->judul . ' - ' . url()->current()) }}"
                                    target="_blank" class="btn btn-success btn-sm">
                                    <i class="fa-brands fa-whatsapp me-1"></i> Bagikan ke WhatsApp
                                </a>

                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                    target="_blank" class="btn btn-primary btn-sm">
                                    <i class="fa-brands fa-facebook-f me-1"></i> Bagikan ke Facebook
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="row mb-50px sm-mb-30px">
                            <div class="tag-cloud col-12 col-md-9 text-center text-md-start sm-mb-15px">
                                <a href="blog-grid.html">Development</a>
                                <a href="blog-grid.html">Event</a>
                                <a href="blog-grid.html">Multimedia </a>
                                <a href="blog-grid.html">Fashion</a>
                            </div>
                            <div class="tag-cloud col-12 col-md-3 text-uppercase text-center text-md-end">
                                <a class="likes-count fw-500 mx-0" href="#"><i
                                        class="fa-regular fa-heart text-red me-10px"></i><span
                                        class="text-dark-gray text-dark-gray-hover">05 Likes</span></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-7">
                                <div
                                    class="d-block d-md-flex w-100 box-shadow-extra-large align-items-center border-radius-4px p-8">
                                    <div class="w-140px text-center me-60px sm-mx-auto">
                                        <img src="https://placehold.co/125x125" class="rounded-circle w-110px"
                                            alt="">
                                        <a href="blog-grid.html"
                                            class="text-dark-gray fw-500 mt-25px d-inline-block lh-20">Colene Landin</a>
                                        <span class="fs-15 lh-20 d-block sm-mb-15px">Co-founder</span>
                                    </div>
                                    <div class="w-75 sm-w-100 text-center text-md-start">
                                        <p class="mb-5px">Lorem ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem ipsum has been the industry's standard dummy text ever since the
                                            1500s when an unknown printer took a galley of type.</p>
                                        <a href="blog-grid.html"
                                            class="btn btn-link btn-large text-dark-gray mt-20px fw-600">All author
                                            posts</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 text-center elements-social social-icon-style-04">
                                <ul class="medium-icon dark">
                                    <li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i
                                                class="fa-brands fa-facebook-f"></i><span></span></a></li>
                                    <li><a class="twitter" href="http://www.twitter.com" target="_blank"><i
                                                class="fa-brands fa-twitter"></i><span></span></a></li>
                                    <li><a class="instagram" href="http://www.instagram.com" target="_blank"><i
                                                class="fa-brands fa-instagram"><span></span></i></a></li>
                                    <li><a class="linkedin" href="http://www.linkedin.com" target="_blank"><i
                                                class="fa-brands fa-linkedin-in"><span></span></i></a></li>
                                    <li><a class="behance" href="http://www.behance.com/" target="_blank"><i
                                                class="fa-brands fa-behance"></i><span></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <!-- end blog details -->
                </div>
                <!-- start sidebar -->
                {{-- <aside class="col-12 col-xl-4 col-lg-4 col-md-7 ps-55px xl-ps-50px lg-ps-15px sidebar">
                    <div class="mb-15 md-mb-50px xs-mb-35px">
                        <div
                            class="fw-600 fs-19 lh-22 ls-minus-05px text-dark-gray border-bottom border-color-dark-gray border-2 d-block mb-30px pb-15px position-relative">
                            Popular posts</div>
                        <ul class="popular-post-sidebar position-relative">
                            <li class="d-flex align-items-center">
                                <figure>
                                    <a href="demo-elearning-blog-single-simple.html"><img src="https://placehold.co/600x600"
                                            alt=""></a>
                                </figure>
                                <div class="col media-body">
                                    <a href="demo-elearning-blog-single-simple.html"
                                        class="fw-600 fs-17 text-dark-gray d-inline-block mb-10px">Trendy is the last stage
                                        before tacky.</a>
                                    <div><a href="blog-grid.html" class="d-inline-block fs-15">20 February 2023</a></div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <figure>
                                    <a href="demo-elearning-blog-single-simple.html"><img
                                            src="https://placehold.co/600x600" alt=""></a>
                                </figure>
                                <div class="col media-body">
                                    <a href="demo-elearning-blog-single-simple.html"
                                        class="fw-600 fs-17 text-dark-gray d-inline-block mb-10px">Believe you can and
                                        you're halfway there.</a>
                                    <div><a href="blog-grid.html" class="d-inline-block fs-15">18 February 2023</a></div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <figure>
                                    <a href="demo-elearning-blog-single-simple.html"><img
                                            src="https://placehold.co/600x600" alt=""></a>
                                </figure>
                                <div class="col media-body">
                                    <a href="demo-elearning-blog-single-simple.html"
                                        class="fw-600 fs-17 text-dark-gray d-inline-block mb-10px">In a gentle way, you can
                                        shake the world.</a>
                                    <div><a href="blog-grid.html" class="d-inline-block fs-15">16 February 2023</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-15 md-mb-50px xs-mb-35px">
                        <div
                            class="fw-600 fs-19 lh-22 ls-minus-05px text-dark-gray border-bottom border-color-dark-gray border-2 d-block mb-30px pb-15px position-relative">
                            Explore category</div>
                        <ul class="category-list-sidebar position-relative">
                            <li class="d-flex align-items-center h-80px cover-background ps-35px pe-35px"
                                style="background-image: url('https://placehold.co/600x144')">
                                <div class="opacity-medium bg-gradient-dark-transparent"></div>
                                <a href="blog-grid.html" class="d-flex align-items-center position-relative w-100 h-100">
                                    <span class="text-white mb-0 fs-20 fw-500 fancy-text-style-4">Fashion</span>
                                    <span class="btn text-white position-absolute"><i
                                            class="bi bi-arrow-right ms-0 fs-24"></i></span>
                                </a>
                            </li>
                            <li class="d-flex align-items-center h-80px cover-background ps-35px pe-35px"
                                style="background-image: url('https://placehold.co/600x144')">
                                <div class="opacity-medium bg-gradient-dark-transparent"></div>
                                <a href="blog-grid.html" class="d-flex align-items-center position-relative w-100 h-100">
                                    <span class="text-white mb-0 fs-20 fw-500 fancy-text-style-4">Creative</span>
                                    <span class="btn text-white position-absolute"><i
                                            class="bi bi-arrow-right ms-0 fs-24"></i></span>
                                </a>
                            </li>
                            <li class="d-flex align-items-center h-80px cover-background ps-35px pe-35px"
                                style="background-image: url('https://placehold.co/600x144')">
                                <div class="opacity-medium bg-gradient-dark-transparent"></div>
                                <a href="blog-grid.html" class="d-flex align-items-center position-relative w-100 h-100">
                                    <span class="text-white mb-0 fs-20 fw-500 fancy-text-style-4">Business</span>
                                    <span class="btn text-white position-absolute"><i
                                            class="bi bi-arrow-right ms-0 fs-24"></i></span>
                                </a>
                            </li>
                            <li class="d-flex align-items-center h-80px cover-background ps-35px pe-35px"
                                style="background-image: url('https://placehold.co/600x144')">
                                <div class="opacity-medium bg-gradient-dark-transparent"></div>
                                <a href="blog-grid.html" class="d-flex align-items-center position-relative w-100 h-100">
                                    <span class="text-white mb-0 fs-20 fw-500 fancy-text-style-4">Lifestyle</span>
                                    <span class="btn text-white position-absolute"><i
                                            class="bi bi-arrow-right ms-0 fs-24"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-17 md-mb-50px xs-mb-35px">
                        <div class="bg-white box-shadow-extra-large p-14 xl-p-10 newsletter-style-05">
                            <div
                                class="fw-600 fs-19 lh-22 ls-minus-05px text-dark-gray border-bottom border-color-dark-gray border-2 d-block mb-20px pb-15px position-relative">
                                Newsletter subscribe</div>
                            <p class="fs-15 lh-24">Signup for free and be the first to get notified on new updates.</p>
                            <form action="email-templates/subscribe-newsletter.php" method="post"
                                class="position-relative">
                                <input
                                    class="w-100 fs-15 input-small form-control box-shadow-medium-bottom border-radius-0px text-center required mb-10px"
                                    type="email" name="email" placeholder="Enter your email address" />
                                <input type="hidden" name="redirect" value="">
                                <button class="btn btn-small btn-dark-gray w-100 btn-box-shadow submit"
                                    aria-label="submit now">submit now</button>
                                <div class="d-flex fs-14 mt-10px">
                                    <div class="d-inline-block"><i
                                            class="line-icon-Handshake me-10px align-middle icon-very-medium"></i>Protecting
                                        your privacy</div>
                                </div>
                                <div
                                    class="form-results border-radius-4px mt-10px lh-normal pt-10px pb-10px ps-15px pe-15px fs-16 w-100 text-center position-absolute z-index-1 d-none">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mb-15 md-mb-50px xs-mb-35px elements-social social-icon-style-10">
                        <div
                            class="fw-600 fs-19 lh-22 ls-minus-05px text-dark-gray border-bottom border-color-dark-gray border-2 d-block mb-30px pb-15px position-relative">
                            Stay connected</div>
                        <div class="row row-cols-2 row-cols-lg-2 justify-content-center align-items-center g-0">
                            <div
                                class="col border-bottom border-end border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                                <a class="facebook text-dark-gray" href="https://www.facebook.com/" target="_blank">
                                    <i class="fa-brands fa-facebook-f fs-18 me-10px"></i>
                                    <span class="fw-500">Facebook</span>
                                </a>
                            </div>
                            <div
                                class="col border-bottom border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                                <a class="dribbble text-dark-gray" href="http://www.dribbble.com" target="_blank">
                                    <i class="fa-brands fa-dribbble fs-18 me-10px"></i>
                                    <span class="fw-500">Dribbble</span>
                                </a>
                            </div>
                            <div
                                class="col border-bottom border-end border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                                <a class="twitter text-dark-gray" href="http://www.twitter.com" target="_blank">
                                    <i class="fa-brands fa-twitter fs-18 me-10px"></i>
                                    <span class="fw-500">Twitter</span>
                                </a>
                            </div>
                            <div
                                class="col border-bottom border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                                <a class="youtube text-dark-gray" href="http://www.youtube.com" target="_blank">
                                    <i class="fa-brands fa-youtube fs-18 me-10px"></i>
                                    <span class="fw-500">Youtube</span>
                                </a>
                            </div>
                            <div
                                class="col border-bottom border-end border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                                <a class="instagram text-dark-gray" href="http://www.instagram.com" target="_blank">
                                    <i class="fa-brands fa-instagram fs-18 me-10px"></i>
                                    <span class="fw-500">Instagram</span>
                                </a>
                            </div>
                            <div
                                class="col border-bottom border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                                <a class="vimeo text-dark-gray" href="https://vimeo.com/" target="_blank">
                                    <i class="fa-brands fa-vimeo-v fs-18 me-10px"></i>
                                    <span class="fw-500">Vimeo</span>
                                </a>
                            </div>
                            <div
                                class="col border-end border-color-extra-medium-gray ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                                <a class="linkedin text-dark-gray" href="https://www.linkedin.com/" target="_blank">
                                    <i class="fa-brands fa-linkedin-in fs-18 me-10px"></i>
                                    <span class="fw-500">Linkedin</span>
                                </a>
                            </div>
                            <div class="col ps-25px pe-25px xl-ps-15px xl-pe-15px lg-ps-10px lg-pe-10px pt-10px pb-10px">
                                <a class="behance text-dark-gray" href="http://www.behance.com/" target="_blank">
                                    <i class="fa-brands fa-behance fs-18 me-10px"></i>
                                    <span class="fw-500 fs-16">Behance</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-15 md-mb-50px xs-mb-35px">
                        <div
                            class="fw-600 fs-19 lh-22 ls-minus-05px text-dark-gray border-bottom border-color-dark-gray border-2 d-block mb-30px pb-15px position-relative">
                            Tags cloud</div>
                        <div class="tag-cloud">
                            <a href="blog-grid.html">Development</a>
                            <a href="blog-grid.html">Mountains</a>
                            <a href="blog-grid.html">Lifestyle</a>
                            <a href="blog-grid.html">Hotel</a>
                            <a href="blog-grid.html">Event</a>
                            <a href="blog-grid.html">Multimedia </a>
                            <a href="blog-grid.html">Fashion</a>
                        </div>
                    </div>
                    <div class="mb-15 md-mb-50px xs-mb-35px">
                        <div
                            class="fw-600 fs-19 lh-22 ls-minus-05px text-dark-gray border-bottom border-color-dark-gray border-2 d-block mb-30px pb-15px position-relative">
                            Instagram</div> --}}
                        {{-- <ul class="instafeed-grid instafeed-wrapper grid grid-3col xl-grid-3col lg-grid-3col md-grid-3col sm-grid-3col xs-grid-3col gutter-medium"
                            data-total="6">
                            <li class="grid-item">
                                <figure><a href="#" data-href="{{ link }}" target="_blank"><img
                                            src="#" data-src="{{ image }}" class="insta-image"
                                            alt="" /><span class="insta-icon"><i
                                                class="fa-brands fa-instagram"></i>{{ likes }}</span></a></figure>
                            </li>
                        </ul> --}}
                    {{-- </div>
                </aside> --}}
                <!-- end sidebar -->
            </div>


        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    {{-- <section class="bg-very-light-gray">
        <div class="container">
            <div class="row justify-content-center mb-2">
                <div class="col-12 col-lg-7 text-center">
                    <span class="fs-15 fw-500 text-uppercase d-inline-block">You may also like</span>
                    <h4 class="text-dark-gray fw-600">Related posts</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul
                        class="blog-grid blog-wrapper grid-loading grid grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                        <li class="grid-sizer"></li>
                        <!-- start blog item -->
                        <li class="grid-item">
                            <div
                                class="card border-0 border-radius-4px box-shadow-extra-large box-shadow-extra-large-hover">
                                <div class="blog-image">
                                    <a href="demo-business-blog-single-modern.html" class="d-block"><img
                                            src="https://placehold.co/800x570" alt="" /></a>
                                    <div class="blog-categories">
                                        <a href="blog-classic.html"
                                            class="categories-btn bg-white text-dark-gray text-dark-gray-hover text-uppercase alt-font fw-700">Agency</a>
                                    </div>
                                </div>
                                <div class="card-body p-12">
                                    <a href="demo-business-blog-single-modern.html"
                                        class="card-title mb-15px fw-600 fs-17 lh-26 text-dark-gray text-dark-gray-hover d-inline-block">How
                                        to bring the season into your great marketing.</a>
                                    <p>Lorem ipsum has been industry standard dummy text ever...</p>
                                    <div
                                        class="author d-flex justify-content-center align-items-center position-relative overflow-hidden fs-14 text-uppercase">
                                        <div class="me-auto">
                                            <span class="blog-date fw-500 d-inline-block">30 August 2023</span>
                                            <div class="d-inline-block author-name">By <a href="blog-classic.html"
                                                    class="text-dark-gray text-dark-gray-hover text-decoration-line-bottom fw-600">Den
                                                    viliamson</a></div>
                                        </div>
                                        <div class="like-count">
                                            <a href="demo-business-blog-single-modern.html"><i
                                                    class="fa-regular fa-heart text-red d-inline-block"></i><span
                                                    class="text-dark-gray align-middle fw-600">65</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- end blog item -->
                        <!-- start blog item -->
                        <li class="grid-item">
                            <div
                                class="card border-0 border-radius-4px box-shadow-extra-large box-shadow-extra-large-hover">
                                <div class="blog-image">
                                    <a href="demo-business-blog-single-modern.html" class="d-block"><img
                                            src="https://placehold.co/800x570" alt="" /></a>
                                    <div class="blog-categories">
                                        <a href="blog-classic.html"
                                            class="categories-btn bg-white text-dark-gray text-dark-gray-hover text-uppercase alt-font fw-700">Luxurious</a>
                                    </div>
                                </div>
                                <div class="card-body p-12">
                                    <a href="demo-business-blog-single-modern.html"
                                        class="card-title mb-15px fw-600 fs-17 lh-26 text-dark-gray text-dark-gray-hover d-inline-block">Build
                                        up healthy habits and strong peaceful life.</a>
                                    <p>Lorem ipsum has been industry standard dummy text ever...</p>
                                    <div
                                        class="author d-flex justify-content-center align-items-center position-relative overflow-hidden fs-14 text-uppercase">
                                        <div class="me-auto">
                                            <span class="blog-date fw-500 d-inline-block">28 August 2023</span>
                                            <div class="d-inline-block author-name">By <a href="blog-classic.html"
                                                    class="text-dark-gray text-dark-gray-hover text-decoration-line-bottom fw-600">Hugh
                                                    macleod</a></div>
                                        </div>
                                        <div class="like-count">
                                            <a href="demo-business-blog-single-modern.html"><i
                                                    class="fa-regular fa-heart text-red d-inline-block"></i><span
                                                    class="text-dark-gray align-middle fw-600">25</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- end blog item -->
                        <!-- start blog item -->
                        <li class="grid-item">
                            <div
                                class="card border-0 border-radius-4px box-shadow-extra-large box-shadow-extra-large-hover">
                                <div class="blog-image">
                                    <a href="demo-business-blog-single-modern.html" class="d-block"><img
                                            src="https://placehold.co/800x570" alt="" /></a>
                                    <div class="blog-categories">
                                        <a href="blog-classic.html"
                                            class="categories-btn bg-white text-dark-gray text-dark-gray-hover text-uppercase alt-font fw-700">Business</a>
                                    </div>
                                </div>
                                <div class="card-body p-12">
                                    <a href="demo-business-blog-single-modern.html"
                                        class="card-title mb-15px fw-600 fs-17 lh-26 text-dark-gray text-dark-gray-hover d-inline-block">Make
                                        business easy with beautiful application.</a>
                                    <p>Lorem ipsum has been industry standard dummy text ever...</p>
                                    <div
                                        class="author d-flex justify-content-center align-items-center position-relative overflow-hidden fs-14 text-uppercase">
                                        <div class="me-auto">
                                            <span class="blog-date fw-500 d-inline-block">26 August 2023</span>
                                            <div class="d-inline-block author-name">By <a href="blog-classic.html"
                                                    class="text-dark-gray text-dark-gray-hover text-decoration-line-bottom fw-600">Walton
                                                    smith</a></div>
                                        </div>
                                        <div class="like-count">
                                            <a href="demo-business-blog-single-modern.html"><i
                                                    class="fa-regular fa-heart text-red d-inline-block"></i><span
                                                    class="text-dark-gray align-middle fw-600">30</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- end blog item -->
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- end section -->
    <!-- start section -->
    {{-- <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9 text-center mb-3">
                    <h4 class="text-dark-gray fw-600">4 Comments</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <ul class="blog-comment">
                        <li>
                            <div class="d-block d-md-flex w-100 align-items-center align-items-md-start ">
                                <div class="w-90px sm-w-50px sm-mb-10px">
                                    <img src="https://placehold.co/130x130" class="rounded-circle" alt="">
                                </div>
                                <div class="w-100 ps-35px last-paragraph-no-margin sm-ps-0">
                                    <a href="#" class="text-dark-gray fw-500">Herman Miller</a>
                                    <a href="#comments" class="btn-reply text-uppercase section-link">Reply</a>
                                    <div class="fs-14 lh-24 mb-15px">17 July 2023, 6:05 PM</div>
                                    <p class="w-85">Lorem ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem ipsum has been the industry's standard dummy text ever since the
                                        make book.</p>
                                </div>
                            </div>
                            <ul class="child-comment">
                                <li>
                                    <div class="d-block d-md-flex w-100 align-items-center align-items-md-start ">
                                        <div class="w-90px sm-w-50px sm-mb-10px">
                                            <img src="https://placehold.co/130x130" class="rounded-circle"
                                                alt="">
                                        </div>
                                        <div class="w-100 ps-35px last-paragraph-no-margin sm-ps-0">
                                            <a href="#" class="text-dark-gray fw-500">Wilbur Haddock</a>
                                            <a href="#comments" class="btn-reply text-uppercase section-link">Reply</a>
                                            <div class="fs-14 lh-24 mb-15px">18 July 2023, 10:19 PM</div>
                                            <p class="w-85">Lorem ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem ipsum has been the industry's standard dummy
                                                text ever since.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="d-block d-md-flex w-100 align-items-center align-items-md-start border-radius-5px p-50px md-p-30px sm-p-20px bg-very-light-gray">
                                        <div class="w-90px sm-w-50px sm-mb-10px">
                                            <img src="https://placehold.co/130x130" class="rounded-circle"
                                                alt="">
                                        </div>
                                        <div class="w-100 ps-35px last-paragraph-no-margin sm-ps-0">
                                            <a href="#" class="text-dark-gray fw-500">Colene Landin</a>
                                            <a href="#comments" class="btn-reply text-uppercase section-link">Reply</a>
                                            <div class="fs-14 lh-24 mb-15px">18 July 2023, 12:39 PM</div>
                                            <p class="w-85">Lorem ipsum is simply dummy text of the printing and
                                                typesetting industry. Ipsum has been the industry's standard dummy text.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="d-block d-md-flex w-100 align-items-center align-items-md-start ">
                                <div class="w-90px sm-w-50px sm-mb-10px">
                                    <img src="https://placehold.co/130x130" class="rounded-circle" alt="">
                                </div>
                                <div class="w-100 ps-35px last-paragraph-no-margin sm-ps-0">
                                    <a href="#" class="text-dark-gray fw-500">Jennifer Freeman</a>
                                    <a href="#comments" class="btn-reply text-uppercase section-link">Reply</a>
                                    <div class="fs-14 lh-24 mb-15px">19 July 2023, 8:25 PM</div>
                                    <p class="w-85">Lorem ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem ipsum has been the industry's standard dummy text ever since the
                                        make a type specimen book.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- end section -->
    <!-- start section -->
    {{-- <section id="comments" class="pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9 mb-4">
                    <h5 class="text-dark-gray fw-600 mb-5px">Write a comment</h5>
                    <div class="mb-5px">Your email address will not be published. Required fields are marked *</div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <form action="email-templates/contact-form.php" method="post" class="row contact-form-style-02">
                        <div class="col-md-6 mb-40px">
                            <input class="input-name border-radius-4px form-control required" type="text"
                                name="name" placeholder="Enter your name*">
                        </div>
                        <div class="col-md-6 mb-40px">
                            <input class="border-radius-4px form-control required" type="email" name="email"
                                placeholder="Enter your email address*">
                        </div>
                        <div class="col-md-12 mb-40px">
                            <textarea class="border-radius-4px form-control" cols="40" rows="4" name="comment"
                                placeholder="Your message"></textarea>
                        </div>
                        <div class="col-12">
                            <input type="hidden" name="redirect" value="">
                            <button class="btn btn-dark-gray btn-small btn-round-edge submit fw-600" type="submit">Post
                                Comment</button>
                            <div class="form-results mt-20px d-none"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- end section -->
@endsection
