@extends('layouts.navbar')
@section('title', 'Website Gereja ' . ($header->judul ?? 'Nama Gereja') . ' - Perangkat Majelis Jemaat')


@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Perangkat Majelis Jemaat</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Perangkat Majelis Jemaat</li>
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
                                    <h5>Tabel Perangkat Majelis Jemaat</h5>

                                </div>
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                    data-bs-target="#createModal">
                                    <i class="fa-solid fa-plus-circle"></i> Add
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="fotogalleryTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Lengkap</th>
                                                <th>Foto</th>
                                                <th>Jabatan</th>
                                                <th>Nama Jabatan</th>
                                                <th>No Hp</th>
                                                <th>Facebook</th>
                                                <th>Instagram</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($perangkat as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->nama_lengkap }}</td>
                                                    <td><img src="{{ asset('storage/' . $item->foto_upload) }}"
                                                            alt="Foto" style="width: 100px;">

                                                    </td>
                                                    <td>{{ $item->jabatan->id }}</td>
                                                    <td>{{ $item->nama_jabatan }}</td>
                                                    <td>{{ $item->no_hp }}</td>
                                                    <td>{{ $item->url_facebook }}</td>
                                                    <td>{{ $item->url_instagram }}</td>
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
                                                            action="{{ route('administrator.perangkat.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5>Edit Perangkat Majelis Jemaat</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3"><label>Nama Lengkap</label>
                                                                        <input type="text" name="nama_lengkap"
                                                                            value="{{ $item->nama_lengkap }}"
                                                                            class="form-control">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="foto_upload" class="form-label">Ganti
                                                                            Gambar</label>
                                                                        <input type="file" name="foto_upload"
                                                                            id="foto_upload" class="form-control">

                                                                        @if ($item->foto_upload)
                                                                            <div class="mt-2">
                                                                                <label class="form-label d-block">Gambar
                                                                                    saat ini:</label>
                                                                                <img src="{{ asset('storage/' . $item->foto_upload) }}"
                                                                                    alt="Foto"
                                                                                    style="width: 100px; border-radius: 8px; border: 1px solid #ddd;">
                                                                            </div>
                                                                        @endif
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="jabatan_id">Jabatan</label>
                                                                        <select name="jabatan_id" class="form-control"
                                                                            required>
                                                                            <option value="">-- Pilih Jabatan --
                                                                            </option>
                                                                            @foreach ($namaJabatan as $jabatan)
                                                                                <option value="{{ $jabatan->id }}"
                                                                                    {{ $jabatan->id == $item->jabatan_id ? 'selected' : '' }}>
                                                                                    {{ $jabatan->nama_jabatan }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3"><label>Nama Jabatan</label>
                                                                        <input type="text" name="nama_jabatan"
                                                                            value="{{ $item->nama_jabatan }}"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="mb-3"><label>No Handphone</label>
                                                                        <input type="text" name="no_hp"
                                                                            value="{{ $item->no_hp }}"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="mb-3"><label>Alamat Facebook</label>
                                                                        <input type="text" name="url_facebook"
                                                                            value="{{ $item->url_facebook }}"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="mb-3"><label>Alamat Instagram</label>
                                                                        <input type="text" name="url_instagram"
                                                                            value="{{ $item->url_instagram }}"
                                                                            class="form-control">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary">Update</button>
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
                                                            action="{{ route('administrator.perangkat.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5>Hapus Data</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus
                                                                    <strong>{{ $item->nama_lengkap }}</strong>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-danger">Ya, Hapus</button>
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
                    <form action="{{ route('administrator.perangkat.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data Majelis Jemaat</h5>
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
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Foto</label>
                                    <input type="file" name="foto_upload" class="form-control" accept="image/*"
                                        onchange="previewImage(event)">
                                    <div class="mt-2">
                                        <img id="imagePreview" src="#" alt="Preview Foto"
                                            style="max-width: 150px; display: none;">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="jabatan_id">Pilih Jabatan</label>
                                    <select name="jabatan_id" class="form-control" required>
                                        <option value="">-- Pilih Jabatan --</option>
                                        @foreach ($namaJabatan as $jabatan)
                                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Nama Jabatan</label>
                                    <input type="text" name="nama_jabatan" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>No Handphone</label>
                                    <input type="text" name="no_hp" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Alamat Facebook</label>
                                    <input type="text" name="url_facebook" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Alamat Instagram</label>
                                    <input type="text" name="url_instagram" class="form-control" required>
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
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#fotogalleryTable')) {
                $('#fotogalleryTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true
                });
            }
        });
    </script>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
