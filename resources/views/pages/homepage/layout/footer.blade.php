<!-- start footer -->
<footer class="pt-5 pb-5 sm-pt-40px sm-pb-45px footer-dark bg-extra-medium-slate-blue">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Kolom 1: Tentang + Kontak -->
            <div class="col-lg-4 col-sm-6 mb-4 text-center text-sm-start">
                <a href="{{ route('homepage') }}" class="footer-logo mb-15px d-block d-lg-inline-block">
                    <img src="{{ $header && $header->logo ? asset('storage/logo/' . $header->logo) : asset('crafto/images/logo/logo-gpm.png') }}"
                        alt="Logo" style="max-height: 48px">
                </a>
                <p class="w-90 sm-w-100 d-inline-block mb-15px">
                    Gereja {{ $header->judul ?? 'Nama Gereja' }} adalah komunitas yang berdedikasi untuk pelayanan,
                    kasih, dan pertumbuhan
                    iman.
                </p>
                <div class="mt-3">
                    <p class="mb-10px">Jl. PHB Halong Atas, Halong, Kec. Baguala, Kota Ambon, Maluku</p>
                    <div>
                        <i class="feather icon-feather-phone-call icon-very-small text-white me-10px"></i>
                        <a href="tel:+6281234567890" class="text-white">+62 812-3456-7890</a>
                    </div>
                    <div>
                        <i class="feather icon-feather-mail icon-very-small text-white me-10px"></i>
                        <a href="mailto:info@gereja.com"
                            class="text-white text-decoration-line-bottom">halonganugerah@gmail.com</a>
                    </div>
                    <div class="mt-3">
                        <a href="https://facebook.com" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <p class="mt-4">Rumah Software Maluku &copy; 2025 </p>
            </div>

            <!-- Kolom 2: Navigasi -->
            <div class="col-lg-3 col-sm-6 mb-4">
                <span class="alt-font d-block text-white mb-5px">Navigasi</span>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/jadwal-kategorial') }}">Jadwal Kebaktian Kategorial</a></li>
                    <li><a href="{{ url('/jadwal-minggu') }}">Jadwal Kebaktian Minggu</a></li>
                    <li><a href="{{ url('/berita-kegiatan') }}">Berita dan Kegiatan</a></li>
                    <li><a href="{{ url('/info-pengumuman') }}">Pengumuman & Informasi</a></li>
                    <li><a href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Google Maps -->
            <div class="col-lg-5 col-sm-12 mb-4">
                <span class="alt-font d-block text-white mb-10px">Lokasi Gereja</span>
                <div class="ratio ratio-16x9 border-radius-6px overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.9237362033678!2d128.2180859102588!3d-3.6621150962965228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce9453ccb2a81%3A0x13b9ac02a5635c7b!2sGereja%20Anugerah%2C%20Jemaat%20GPM%20Halong%20Anugerah!5e1!3m2!1sen!2sid!4v1752724878857!5m2!1sen!2sid"
                        width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
    </div>
</footer>
<!-- end footer -->
