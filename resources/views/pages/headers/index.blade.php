@extends('layouts.navbar')
@section('title', 'Kelola Header Website')

@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Pengelolaan Header Website (Logo dan Text)</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Page</li>
                            <li class="breadcrumb-item active">Headers</li>
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
                        <form class="form theme-form" method="POST" action="{{ route('administrator.header.submit') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body custom-input">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3">Logo</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="logo">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3">Nama Gereja</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="judul"
                                                    placeholder="Nama gereja" value="{{ $header->judul ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <div class="col-sm-9 offset-sm-3">
                                    <button class="btn btn-primary me-3" type="submit"><i class="fa fa-save me-1"></i>Save</button>
                                    
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>Display Logo :</h5>

                        </div>
                        <form class="form theme-form">
                            <div class="card-body custom-input">
                                <div class="row">
                                    <div class="col">

                                        @if ($header && $header->logo)
                                            <div class="text-center">
                                                <img src="{{ asset('storage/logo/' . $header->logo) }}" alt="Logo Gereja"
                                                    class="img-fluid" style="max-height: 150px;">
                                                <p class="mt-2">{{ $header->judul }}</p>
                                            </div>
                                        @else
                                            <p class="text-center">Belum ada logo yang diupload.</p>
                                        @endif

                                    </div>
                                </div>
                            </div>

                        </form>
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

    </script>
@endsection
