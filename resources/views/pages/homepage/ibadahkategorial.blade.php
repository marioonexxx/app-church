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
                        Jadwal - Ibadah Kategorial</h1>
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
                        class="bg-solitude-blue text-uppercase fs-13 ps-25px pe-25px alt-font fw-600 text-base-color lh-40 sm-lh-55 border-radius-100px d-inline-block mb-25px">Jadwal
                        Ibadah</span>
                    <h3 class="fw-600 text-dark-gray ls-minus-2px alt-font sm-w-80 xs-w-100 mx-auto sm-mb-20px">Jadwal
                        Kebaktian Kategorial Terbaru {{ $header->judul ?? 'Nama Gereja' }}</h3>
                    {{-- BUAT FILTER DATA --}}
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="filterKategori" class="form-label">Filter Kategori</label>
                            <select id="filterKategori" class="form-select">
                                <option value="">Semua Kategori</option>
                                @foreach ($ibadahKategorial->pluck('kategori')->unique() as $kategori)
                                    <option value="{{ $kategori }}">{{ $kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="filterSektor" class="form-label">Filter Sektor</label>
                            <select id="filterSektor" class="form-select">
                                <option value="">Semua Sektor</option>
                                @foreach ($ibadahKategorial->pluck('sektor')->unique() as $sektor)
                                    <option value="{{ $sektor }}">{{ $sektor }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Ibadah</th>
                                    <th>Tgl</th>
                                    <th>Jam Mulai</th>
                                    <th>Tempat</th>
                                    <th>Pemimpin</th>
                                    <th>Sektor</th>
                                    <th>Unit</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ibadahKategorial as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->waktu)->translatedFormat('l, d F Y') }}
                                        </td>
                                        <td>{{ $item->jam }}</td>
                                        <td>{{ $item->tempat }}</td>
                                        <td>{{ $item->pemimpin }}</td>
                                        <td>{{ $item->sektor }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->kategori }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- end section -->
@endsection


@push('script')
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true
            });

            // Filter berdasarkan Kategori
            $('#filterKategori').on('change', function() {
                let val = $.fn.dataTable.util.escapeRegex($(this).val());
                table.column(8).search(val ? '^' + val + '$' : '', true, false).draw();
            });

            // Filter berdasarkan Sektor
            $('#filterSektor').on('change', function() {
                let val = $.fn.dataTable.util.escapeRegex($(this).val());
                table.column(6).search(val ? '^' + val + '$' : '', true, false).draw();
            });
        });
    </script>

    <style>
        #down-section .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            /* smooth scroll di iOS */
        }

        #down-section table.table {
            font-size: 13px;
            min-width: 900px;
            /* penting agar scroll muncul jika layar sempit */
        }

        #down-section table.table td,
        #down-section table.table th {
            padding: 6px 10px !important;
            white-space: nowrap;
            /* mencegah isi turun ke bawah */
        }
    </style>
@endpush
