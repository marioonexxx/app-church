<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                    src="{{ asset('cuba/assets/images/logo/logo.png') }}" alt=""><img class="img-fluid for-dark"
                    src="{{ asset('cuba/assets/images/logo/logo_dark.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa-solid fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                    src="{{ asset('cuba/assets/images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                {{-- ROLE ADMINISTRATOR --}}
                @if (Auth::check() && Auth::user()->role == '1')
                    <div id="sidebar-menu">

                        <ul class="sidebar-links" id="simple-bar">
                            <li class="back-btn">
                                <div class="mobile-back text-end"><span>Back</span><i
                                        class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i></div>
                            </li>
                            <li class="pin-title sidebar-main-title">
                                <div>
                                    <h6>Pinned</h6>
                                </div>
                            </li>
                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}">
                                        </use>
                                    </svg><span>Dashboard</span>
                                </a>
                            </li>

                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                    class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-sitemap') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-sitemap') }}">
                                        </use>
                                    </svg><span>Header Website </span></a>
                                    <ul class="sidebar-submenu">
                                    <li>
                                        <a href="{{ route('administrator.header.index') }}">Logo dan Nama
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administrator.slideshow.index') }}">Slide Show
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                    class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-charts') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-charts') }}">
                                        </use>
                                    </svg><span>Tentang Gereja</span></a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="{{ route('administrator.visi.index') }}">Visi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administrator.misi.index') }}">Misi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administrator.sejarah.index') }}">Sejarah
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administrator.perangkat.index') }}">Struktur Organisasi

                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                    class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-gallery') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-gallery') }}">
                                        </use>
                                    </svg><span>Gallery</span></a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="{{ route('administrator.fotogallery.index') }}">Foto
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administrator.videogallery.index') }}">Video
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                    class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-to-do') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-tp-do') }}">
                                        </use>
                                    </svg><span>Berita dan Kegiatan</span></a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="{{ route('administrator.blogpost.index') }}">Post
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administrator.kategori.index') }}">Kategori
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                    class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-calendar') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-calendar') }}">
                                        </use>
                                    </svg><span>Jadwal Ibadah</span></a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="{{ route('administrator.jadwal.index') }}">Kebaktian Minggu
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administrator.jadwalkategorial.index') }}">Kebaktian Kategorial
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                    class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-knowledgebase') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-knowledgebase') }}">
                                        </use>
                                    </svg><span>Informasi dan Warta</span></a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="{{ route('administrator.wartajemaat.index') }}">Warta Jemaat
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administrator.informasijemaat.index') }}">Informasi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administrator.shk.index') }}">Santapan Harian
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administrator.binaumat.index') }}">Bina Umat
                                        </a>
                                    </li>
                                    


                                </ul>
                            </li>
                            {{-- ARSIP/DOKUMEN --}}
                             <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('administrator.arsip.index') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-knowledgebase') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-knowledgebase') }}">
                                        </use>
                                    </svg><span>Dokumen/Arsip</span>
                                </a>
                            </li>
                            {{-- PROFIL JEMAAT --}}
                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                    class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-user') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-user') }}">
                                        </use>
                                    </svg><span>Data Jemaat</span></a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="{{ route('administrator.upload.files') }}">Upload excel
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                    class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-sitemap') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-sitemap') }}">
                                        </use>
                                    </svg><span>Footer Website</span></a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="#">Tentang Kami
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Site Map
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Lokasi Kami
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                    class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-api') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-api') }}">
                                        </use>
                                    </svg><span>Pengaturan Umum</span></a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="{{ route('administrator.jabatan.index') }}">Jabatan MJ
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">List Kategorial
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administrator.sektor.index') }}">List Sektor
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('administrator.unit.index') }}">List Unit
                                        </a>
                                    </li>


                                </ul>
                            </li>


                        </ul>

                    </div>
                @endif
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->
