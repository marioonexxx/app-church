@extends('layouts.navbar')
@section('title', 'Sistem Informasi Manajemen Gereja - Postingan Berita dan Kegiatan')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Postingan Berita dan Informasi Kegiatan</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Berita dan Kegiatan</li>
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
                                    <h5>Tabel Data Post</h5>

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
                                                <th>Judul</th>
                                                <th>Gambar</th>
                                                <th hidden>Isi</th>
                                                <th>Kategori</th>
                                                <th>Penulis</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($blogPost as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->judul }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $item->image) }}" alt="Image"
                                                            style="width: 80px; height: auto;">
                                                    </td>

                                                    <td hidden>{!! $item->konten !!}</td>
                                                    <td>{{ $item->kategori_id }}</td>
                                                    <td>{{ $item->user_id }}</td>
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
                                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                        <form
                                                            action="{{ route('administrator.blogpost.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Berita dan Kegiatan</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="mb-3">
                                                                        <label>Judul</label>
                                                                        <input type="text" name="judul"
                                                                            value="{{ $item->judul }}"
                                                                            class="form-control" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label>Gambar (Biarkan kosong jika tidak ingin
                                                                            diganti)</label>
                                                                        <input type="file" name="image"
                                                                            class="form-control"
                                                                            accept=".jpg,.jpeg,.png,.gif,.webp">
                                                                        @if ($item->image)
                                                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                                                alt="Preview Gambar"
                                                                                style="margin-top: 10px; max-width: 200px;">
                                                                        @endif
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label>Isi Berita & Kegiatan</label>
                                                                        <textarea id="edit_konten_{{ $item->id }}" name="konten" class="form-control">{!! $item->konten !!}</textarea>
                                                                    </div>

                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ $item->user_id }}">

                                                                    <div class="mb-3">
                                                                        <label>Kategori</label>
                                                                        <select name="kategori_id" class="form-control"
                                                                            required>
                                                                            <option value="">-- Pilih Kategori --
                                                                            </option>
                                                                            @foreach ($kategoris as $kategori)
                                                                                <option value="{{ $kategori->id }}"
                                                                                    {{ $kategori->id == $item->kategori_id ? 'selected' : '' }}>
                                                                                    {{ $kategori->nama_kategori }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
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
                                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form
                                                            action="{{ route('administrator.blogpost.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5>Hapus Berita dan Kegiatan</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Yakin ingin menghapus berita dan kegiatan ini ini?
                                                                    </p>
                                                                    <strong>{{ $item->judul }}</strong>
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

            <!-- Modal Create -->
            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <form action="{{ route('administrator.blogpost.store') }}" method="POST"
                        enctype="multipart/form-data" id="formCreateBlogpost">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Berita dan Kegiatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="judul" required>
                                    @error('judul')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image">Gambar</label>
                                    <input type="file" name="image" class="form-control" id="imageInput" required
                                        accept=".jpg,.jpeg,.png,.gif,.webp">
                                    <img id="imagePreview" src="#" alt="Preview"
                                        style="margin-top: 10px; display: none; max-width: 200px;">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="konten">Isi Berita dan Kegiatan</label>
                                    <textarea id="create_konten" name="konten" class="form-control" rows="5"></textarea>
                                    @error('konten')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                <div class="mb-3">
                                    <label for="kategori_id">Kategori</label>
                                    <select name="kategori_id" id="kategori_id" class="form-control" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-1"></i> Simpan
                                </button>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let editorInstance;

            const createModal = document.getElementById('createModal');

            if (createModal) {
                createModal.addEventListener('shown.bs.modal', function() {
                    const textarea = document.getElementById('create_konten');
                    if (textarea && !editorInstance) {
                        ClassicEditor
                            .create(textarea)
                            .then(editor => {
                                editorInstance = editor;

                                // Tambahkan gaya CSS untuk memperbesar tinggi editor
                                const editableElement = editor.ui.view.editable.element;
                                editableElement.style.minHeight = '300px'; // ubah ke 400px jika perlu
                            })
                            .catch(error => {
                                console.error('CKEditor initialization error:', error);
                            });
                    }
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editModals = document.querySelectorAll('[id^="editModal"]');
            const editors = {};

            editModals.forEach(modal => {
                modal.addEventListener('shown.bs.modal', function() {
                    const id = modal.id.replace('editModal', '');
                    const textarea = document.getElementById(`edit_konten_${id}`);

                    if (textarea && !editors[id]) {
                        ClassicEditor
                            .create(textarea)
                            .then(editor => {
                                editors[id] = editor;
                                editor.ui.view.editable.element.style.minHeight = '300px';
                            })
                            .catch(error => {
                                console.error('CKEditor Edit Init Error:', error);
                            });
                    }
                });
            });
        });
    </script>







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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('imageInput');
            const imagePreview = document.getElementById('imagePreview');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    }

                    reader.readAsDataURL(file);
                } else {
                    imagePreview.src = "#";
                    imagePreview.style.display = 'none';
                }
            });
        });
    </script>




@endsection
