@extends('layouts.navbar')
@section('title', 'Website Gereja ' . ($header->judul ?? 'Nama Gereja') . ' - Data Unit')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Data Unit</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Data Unit</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-start flex-wrap gap-2">
                                <div>
                                    <h5>Tabel Unit</h5>

                                </div>
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                    data-bs-target="#createModal">
                                    <i class="fa-solid fa-plus-circle"></i> Add
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Sektor</th>
                                                <th>Nama Unit</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $sektorNama => $units)
                                                <tr class="group-header-row">
                                                    <td colspan="4" class="fw-bold bg-light">{{ $sektorNama }}</td>
                                                </tr>

                                                @foreach ($units as $index => $item)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $item->sektor->nama ?? '-' }}</td>
                                                        <td>{{ $item->nama }}</td>
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
                                                                action="{{ route('administrator.unit.update', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Edit Nama Unit</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label>Nama Unit</label>
                                                                            <input type="text" name="nama"
                                                                                class="form-control"
                                                                                value="{{ $item->nama }}" required>
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
                                                                action="{{ route('administrator.unit.destroy', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Hapus Data Unit</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Yakin ingin menghapus unit:</p>
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

            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('administrator.unit.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Nama Sektor</h5>
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
                                    <label>Nama Sektor</label>
                                    <select name="sektor_id" class="form-control" required>
                                        <option value="">-- Pilih Sektor --</option>
                                        @foreach ($dataSektor as $sektor)
                                            <option value="{{ $sektor->id }}">{{ $sektor->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label>Nama Unit</label>
                                    <input type="text" name="nama" class="form-control" required>
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
        $('#dataTable').DataTable({
            rowCallback: function(row, data, index) {
                if ($(row).hasClass('group-header-row')) {
                    $(row).remove(); // atau: return false; untuk abaikan
                }
            }
        });
    </script>
@endsection
