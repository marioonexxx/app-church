@extends('layouts.navbar')
@section('title', 'Pengaturan Sejarah Gereja')

@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Pengaturan Sejarah Gereja</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Sejarah</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row starter-main">
                <div class="col-xl-6">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>Silahkan lengkapi data :</h5>
                        </div>

                        <form class="form theme-form" method="POST" action="{{ route('administrator.sejarah.submit') }}">
                            @csrf
                            <div class="card-body custom-input">
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
                                    <label class="form-label">Sejarah</label>
                                    <textarea name="konten" class="editor form-control" style="min-height: 300px;">{!! old('konten', $sejarah->konten ?? '') !!}</textarea>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary me-3" type="submit"><i
                                        class="fa fa-save me-1"></i>Save</button>

                            </div>
                        </form>
                    </div>
                </div>

                {{-- Tampilan Visi --}}
                <div class="col-xl-6">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>Sejarah Tersimpan:</h5>
                        </div>
                        <div class="card-body">
                            {!! $sejarah->konten ?? '<em>Belum ada sejarah.</em>' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
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

    <!-- CKEditor 5 (Classic) -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.editor').forEach((el) => {
                ClassicEditor.create(el)
                    .then(editor => {
                        editor.editing.view.change(writer => {
                            writer.setStyle('min-height', '300px', editor.editing.view.document
                                .getRoot());
                        });
                    })
                    .catch(error => {
                        console.error('CKEditor error:', error);
                    });
            });
        });
    </script>



@endsection
