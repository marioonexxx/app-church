@extends('layouts.navbar')
@section('title', 'Sistem Informasi Manajemen Gereja - Pengaturan Video Gallery')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Pengaturan Video Gallery</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Pengaturan Video Gallery</li>
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
                                    <h5>Tabel Video Gallery</h5>

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
                                                <th>Caption</th>
                                                <th>Link Video</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($videoGallery as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->caption }}</td>
                                                    <td>
                                                        @php
                                                            $videoId = '';
                                                            if (Str::contains($item->link_video, 'youtube.com')) {
                                                                $videoId = \Illuminate\Support\Str::after(
                                                                    $item->link_video,
                                                                    'v=',
                                                                );
                                                                $videoId = explode('&', $videoId)[0];
                                                            } elseif (Str::contains($item->link_video, 'youtu.be')) {
                                                                $videoId = \Illuminate\Support\Str::afterLast(
                                                                    $item->link_video,
                                                                    '/',
                                                                );
                                                            }
                                                        @endphp

                                                        @if ($videoId)
                                                            <div class="ratio ratio-16x9">
                                                                <iframe
                                                                    src="https://www.youtube.com/embed/{{ $videoId }}"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                        @else
                                                            <span class="text-danger">Link tidak valid</span>
                                                        @endif
                                                    </td>


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
                                                            action="{{ route('administrator.videogallery.update', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5>Edit Video</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label>Caption</label>
                                                                        <input type="text" name="caption"
                                                                            value="{{ $item->caption }}"
                                                                            class="form-control">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label>Ganti Link Video</label>
                                                                        <input type="text" name="link_video"
                                                                            id="edit_link_video_{{ $item->id }}"
                                                                            value="{{ $item->link_video }}"
                                                                            class="form-control"
                                                                            placeholder="https://www.youtube.com/watch?v=xxxxxx">
                                                                        <small>Paste link YouTube, preview otomatis muncul
                                                                            di bawah.</small>
                                                                    </div>

                                                                    <div class="mb-3"
                                                                        id="edit_video_preview_{{ $item->id }}"
                                                                        style="display:block;">
                                                                        <label>Preview Video:</label>
                                                                        <div class="ratio ratio-16x9">
                                                                            <iframe
                                                                                id="edit_youtube_iframe_{{ $item->id }}"
                                                                                src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($item->link_video, 'v=') }}"
                                                                                allowfullscreen></iframe>
                                                                        </div>
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
                                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form
                                                            action="{{ route('administrator.videogallery.destroy', $item->id) }}"
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
                                                                    <strong>{{ $item->caption }}</strong>?
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

            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('administrator.videogallery.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Video Gallery</h5>
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
                                    <label>Caption</label>
                                    <input type="text" name="caption" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Link Youtube</label>
                                    <input type="text" name="link_video" id="link_video" class="form-control"
                                        placeholder="https://www.youtube.com/watch?v=xxxxxxx">
                                    <small class="text-muted">Tempel link YouTube, video akan tampil di bawah.</small>
                                </div>

                                <div class="mb-3" id="video_preview" style="display:none;">
                                    <label>Preview:</label>
                                    <div class="ratio ratio-16x9">
                                        <iframe id="youtube_iframe" src="" allowfullscreen></iframe>
                                    </div>
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
            const linkInput = document.getElementById('link_video');
            const previewContainer = document.getElementById('video_preview');
            const iframe = document.getElementById('youtube_iframe');

            linkInput.addEventListener('input', function() {
                const url = linkInput.value;
                const videoId = getYouTubeVideoId(url);

                if (videoId) {
                    iframe.src = `https://www.youtube.com/embed/${videoId}`;
                    previewContainer.style.display = 'block';
                } else {
                    iframe.src = '';
                    previewContainer.style.display = 'none';
                }
            });

            function getYouTubeVideoId(url) {
                const regex =
                    /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/;
                const match = url.match(regex);
                return match ? match[1] : null;
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($videoGallery as $item)
                const input{{ $item->id }} = document.getElementById('edit_link_video_{{ $item->id }}');
                const iframe{{ $item->id }} = document.getElementById(
                    'edit_youtube_iframe_{{ $item->id }}');

                const updateIframe{{ $item->id }} = function() {
                    const url = input{{ $item->id }}.value.trim();
                    let videoId = null;

                    // Extract video ID from full YouTube URL
                    if (url.includes('youtube.com/watch?v=')) {
                        videoId = url.split('v=')[1]?.split('&')[0];
                    } else if (url.includes('youtu.be/')) {
                        videoId = url.split('youtu.be/')[1]?.split('?')[0];
                    }

                    if (videoId) {
                        iframe{{ $item->id }}.src = `https://www.youtube.com/embed/${videoId}`;
                    }
                };

                input{{ $item->id }}.addEventListener('input', updateIframe{{ $item->id }});
                input{{ $item->id }}.addEventListener('paste', function() {
                    setTimeout(updateIframe{{ $item->id }},
                        100); // Delay to wait for paste to complete
                });
                input{{ $item->id }}.addEventListener('change', updateIframe{{ $item->id }});
            @endforeach
        });
    </script>



@endsection
