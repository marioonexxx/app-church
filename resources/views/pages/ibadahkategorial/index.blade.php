@extends('layouts.navbar')
@section('title', 'Website Gereja ' . ($header->judul ?? 'Nama Gereja') . ' - Jadwal Kebaktian Kategorial')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Kebaktian Kategorial</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Kebaktian Kategorial</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row w-100">
                                    <div class="col-md-6 d-flex align-items-center">
                                        <h5 class="mb-0">Tabel Jadwal Kebaktian Kategorial</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex flex-wrap justify-content-end gap-2">
                                            {{-- Form Hapus per Sektor --}}
                                            <form action="{{ route('administrator.jadwalkategorial.deletesektor') }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus semua data dari sektor ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <div class="input-group">
                                                    <select name="sektor" class="form-select form-select-sm" required>
                                                        <option value="" disabled selected>-- Pilih Sektor --</option>
                                                        @foreach ($ibadahKategorial->pluck('sektor')->unique() as $sektor)
                                                            <option value="{{ $sektor }}">{{ $sektor }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa-solid fa-trash me-1"></i>Hapus Data Sektor
                                                    </button>
                                                </div>
                                            </form>

                                            {{-- Tombol Tambah --}}
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#createModal">
                                                <i class="fa-solid fa-plus-circle me-1"></i> Tambah
                                            </button>

                                            {{-- Tombol Upload --}}
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#createModalUpload">
                                                <i class="fa-solid fa-file-import me-1"></i> Upload
                                            </button>

                                            {{-- Tombol Hapus Semua --}}
                                            <form action="{{ route('administrator.jadwalkategorial.deleteall') }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus semua data?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash me-1"></i> Hapus Semua
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Ibadah</th>
                                                <th>Tanggal</th>
                                                <th>Tempat</th>
                                                <th>Jam Ibadah</th>
                                                <th>Pemimpin</th>
                                                <th>Kategori</th>
                                                <th>Sektor</th>
                                                <th>Unit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ibadahKategorial as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->waktu)->translatedFormat('l, d F Y') }}
                                                    </td>
                                                    <td>{{ $item->tempat }}</td>
                                                    <td>{{ $item->jam }}</td>
                                                    <td>{{ $item->pemimpin }}</td>
                                                    <td>{{ $item->kategori }}</td>
                                                    <td>{{ $item->sektor }}</td>
                                                    <td>{{ $item->unit }}</td>
                                                    <td>
                                                        <!-- Tombol Edit -->
                                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $item->id }}">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </button>

                                                        <!-- Tombol Delete -->
                                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal{{ $item->id }}">
                                                            <i class="fa fa-trash"></i> Hapus
                                                        </button>

                                                    </td>
                                                </tr>



                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form
                                                            action="{{ route('administrator.jadwalkategorial.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Jadwal Ibadah</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label>Nama Kebaktian</label>
                                                                        <input type="text" name="nama"
                                                                            class="form-control"
                                                                            value="{{ $item->nama }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Waktu</label>
                                                                        <input type="date" name="waktu"
                                                                            class="form-control"
                                                                            value="{{ $item->waktu }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Jam Mulai</label>
                                                                        <input type="text" name="jam"
                                                                            class="form-control"
                                                                            value="{{ $item->jam }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Tempat </label>
                                                                        <input type="text" name="tempat"
                                                                            class="form-control"
                                                                            value="{{ $item->tempat }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Pemimpin Kebaktian</label>
                                                                        <input type="text" name="pemimpin"
                                                                            class="form-control"
                                                                            value="{{ $item->pemimpin }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Kategori</label>
                                                                        <input type="text" name="kategori"
                                                                            class="form-control"
                                                                            value="{{ $item->kategori }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Sektor</label>
                                                                        <input type="text" name="sektor"
                                                                            class="form-control"
                                                                            value="{{ $item->sektor }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Unit</label>
                                                                        <input type="text" name="unit"
                                                                            class="form-control"
                                                                            value="{{ $item->unit }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary"><i
                                                                            class="fa fa-save me-1"></i> Update</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <!-- Modal Delete -->
                                                <div class="modal fade" id="deleteModal{{ $item->id }}"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form
                                                            action="{{ route('administrator.jadwalkategorial.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Hapus Jadwal</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Yakin ingin menghapus Jadwal Ibadah:</p>
                                                                    <strong>{{ $item->nama }}</strong>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-danger"><i
                                                                            class="fa fa-trash me-1"></i> Hapus</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MODAL CREATE --}}

            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('administrator.jadwalkategorial.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Jadwal Kebaktian</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label>Nama Kebaktian</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Waktu</label>
                                    <input type="date" name="waktu" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Tempat</label>
                                    <input type="text" name="tempat" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Jam</label>
                                    <input type="text" name="jam" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Pemimpin Kebaktian</label>
                                    <input type="text" name="pemimpin" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Kategori</label>
                                    <input type="text" name="kategori" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Sektor - Unit</label>
                                    <select name="unit_combined" class="form-select" required>
                                        <option value="">-- Pilih Unit --</option>
                                        @foreach ($dataUnit as $unit)
                                            <option value="{{ $unit->sektor->nama }}|{{ $unit->nama }}">
                                                {{ $unit->sektor->nama }} - {{ $unit->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i
                                        class="fa fa-save me-1"></i>Simpan</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- MODAL UPLOAD -->
            <div class="modal fade" id="createModalUpload" tabindex="-1" aria-labelledby="createModalUploadLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('administrator.jadwalkategorial.upload') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Upload File Excel Jadwal Kebaktian</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Upload file Excel jadwal kebaktian</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i
                                        class="fa fa-save me-1"></i>Upload</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>





        </div>
    </div>
@endsection

@section('script')
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true
                });
            }
        });
    </script>



@endsection
