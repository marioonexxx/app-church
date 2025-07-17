    <!-- start header -->
    <header>
        <!-- start navigation -->
        <nav class="navbar navbar-expand-lg header-transparent bg-transparent header-reverse" data-header-hover="light">
            <div class="container-fluid">
                <!-- Kolom Logo dan Judul -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-auto">
                    <div class="d-flex align-items-center gap-2">
                        <a class="navbar-brand me-2" href="{{ route('homepage') }}">
                            <img src="{{ $header && $header->logo ? asset('storage/logo/' . $header->logo) : asset('crafto/images/logo/logo-gpm.png') }}"
                                alt="Logo" style="max-height: 48px">
                        </a>
                        <span class="fw-bold text-nowrap" style="font-size: clamp(1rem, 1.4vw, 1.4rem); color: #000;">
                            {{ $header->judul ?? 'Nama Gereja' }}
                        </span>

                    </div>
                </div>

                <div class="col-xl-6 col-lg-7 col-md-6 col-auto">
                    <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav alt-font">
                            <li class="nav-item">
                                <a href="{{ route('homepage') }}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item dropdown dropdown-with-icon-style02">
                                <a href="#" class="nav-link">Tentang</a>
                                <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a href="{{ route('homepage.sejarah') }}"><i
                                                class="bi-journal-text"></i>Sejarah</a></li>
                                    <li><a href="{{ route('homepage.visimisi') }}"><i class="bi bi-bullseye"></i>Visi
                                            Misi</a></li>
                                    <li><a href="{{ route('homepage.struktur') }}"><i class="bi bi-people"></i>Susunan
                                            KMJ</a></li>


                                </ul>
                            </li>
                            <li class="nav-item dropdown dropdown-with-icon-style02">
                                <a href="#" class="nav-link">Jadwal</a>
                                <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a href="{{ route('homepage.jadwalminggu') }}"><i
                                                class="bi bi-calendar-event"></i>Kebaktian Minggu</a></li>
                                    <li><a href="{{ route('homepage.jadwalkategorial') }}"><i
                                                class="bi bi-calendar-event"></i>Kebaktian Kategorial</a>
                                    </li>
                                    <li><a href="{{ route('homepage.jadwalkategorial') }}"><i
                                                class="bi bi-calendar-event"></i>Agenda</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item dropdown dropdown-with-icon-style02">
                                <a href="#" class="nav-link">Informasi</a>
                                <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a href="{{ route('homepage.wartajemaat') }}"><i
                                                class="bi bi-megaphone"></i>Warta Jemaat</a></li>
                                    <li><a href="{{ route('homepage.info') }}"><i
                                                class="bi bi-megaphone"></i>Informasi</a></li>
                                    <li><a href="{{ route('homepage.shk') }}"><i
                                                class="bi bi-megaphone"></i>Santapan Harian</a></li>
                                    <li><a href="{{ route('homepage.binaumat') }}"><i
                                                class="bi bi-megaphone"></i>Bina Umat</a></li>
                                                <li><a href="{{ route('homepage.info-ultah') }}"><i
                                                class="bi bi-megaphone"></i>Informasi Ultah</a></li>


                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('homepage.beritakegiatan') }}" class="nav-link">Berita</a>
                            </li>
                            <li class="nav-item dropdown dropdown-with-icon-style02">
                                <a href="demo-business-services.html" class="nav-link">Gallery</a>
                                <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a href="{{ route('homepage.galleryFoto') }}"><i
                                                class="bi bi-camera"></i>Foto</a></li>
                                    <li><a href="{{ route('homepage.galleryVideo') }}"><i
                                                class="bi bi-camera-video"></i>Video</a></li>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('homepage.arsip') }}" class="nav-link">Arsip</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('homepage.kontak') }}" class="nav-link">Kontak</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Kolom Login Button -->

                <div class="col-auto col-xxl-3 col-lg-2 text-end d-none d-sm-flex me-auto">
                    <div class="header-icon">
                        <div class="header-button">
                            @auth
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            @endauth

                            @guest
                                <a href="{{ route('login') }}">Login</a>
                            @endguest

                        </div>
                    </div>
                </div>

            </div>
        </nav>
        <!-- end navigation -->
    </header>
    <!-- end header -->
