@extends('mainpage.layouts.main')

@section('container')

<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tetapan: {{ $song_category->kategori }}</h1>
</div>

    <div class="col-lg-8">
        <form method="post" action="/tetapan/kategori-lagu/{{ $song_category->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Lagu</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required autofocus value="{{ old('kategori',$song_category->kategori) }}">
                @error('kategori')
                    <div class="invalid-feedback">
                        {{ "$message" }}
                    </div>      
                @enderror
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-dark link-light">
                <span data-feather="arrow-left"></span>
                Kembali
            </a>
            <a href="/tetapan/kategori-lagu" class="btn btn-danger border-0" data-bs-toggle="modal" data-bs-target="#cancelModal">
                Batal
            </a>
            <!-- Cancel Modal -->
            <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cancelModalLabel">Sahkan Pembatalan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Adakah anda pasti untuk batal untuk menambah?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <a href="/tetapan/kategori-lagu" class="btn btn-danger">Ya</a>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Kemaskini</button>
        </form>
    </div>


@endsection