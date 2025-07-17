@extends('layouts.navbar')
@section('meta_title', 'Upload Data Jemaat')


@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Upload Data Jemaat</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Upload Data Jemaat</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                                <h5 class="mb-0">Tabel Jemaat</h5>

                                <div class="d-flex flex-wrap gap-2">
                                    <form action="{{ route('administrator.destroy.alljemaat') }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i> Hapus Semua
                                        </button>
                                    </form>


                                    {{-- Hapus Berdasarkan Sektor --}}
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteBySektorModal">
                                        <i class="fa-solid fa-trash"></i> Hapus/Unit
                                    </button>


                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#createModal">
                                        <i class="fa-solid fa-file-import"></i> Upload File
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Nama Kepala Keluarga</th>
                                                <th>Status Dalam Keluarga</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Sektor</th>
                                                <th>Unit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jemaat as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->nama_kepala_keluarga }}</td>
                                                    <td>{{ $item->status_dalam_keluarga }}</td>
                                                    <td>{{ $item->tempat_lahir }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->tgl_lahir)->translatedFormat('d F Y') }}
                                                    </td>

                                                    <td>{{ $item->kelamin }}</td>
                                                    <td>{{ $item->sektor }}</td>
                                                    <td>{{ $item->unit }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Hapus per Sektor / Unit -->
            <div class="modal fade" id="deleteBySektorModal" tabindex="-1" aria-labelledby="deleteBySektorModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('administrator.destroy.byunit') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteBySektorModalLabel">Hapus Jemaat Berdasarkan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                {{-- Dropdown unit --}}
                                <select name="unit_sektor" class="form-select mb-3" required >
                                    <option value="" disabled selected>-- Pilih Sektor - Unit --</option>
                                    @foreach ($listUnitGabungan as $item)
                                        <option value="{{ $item['sektor'] }}|{{ $item['unit'] }}">{{ $item['label'] }}
                                        </option>
                                    @endforeach
                                </select>


                                <div class="alert alert-danger">
                                    <i class="fa-solid fa-triangle-exclamation me-1"></i>
                                    Semua jemaat dalam pilihan di atas akan dihapus permanen. Lanjutkan?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>




            {{-- MODAL UPLOAD --}}

            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('administrator.upload.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Upload File Excel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label>Upload file excel data jemaat</label>
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

    <!-- FORM DELETE ALL -->
    <form id="deleteAllForm" action="{{ route('administrator.destroy.alljemaat') }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>
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
