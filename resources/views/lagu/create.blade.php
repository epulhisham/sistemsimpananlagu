@extends('mainpage.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hantar Lagu</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/lagu" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="artis" class="form-label">Artis</label>
                <input type="text" class="form-control @error('artis') is-invalid @enderror" id="artis" name="artis" required autofocus value="{{ old('artis') }}">
                @error('artis')
                    <div class="invalid-feedback">
                        {{ "$message" }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="tajuk" class="form-label">Tajuk</label>
                <input type="text" class="form-control @error('tajuk') is-invalid @enderror" id="tajuk" name="tajuk" required autofocus value="{{ old('tajuk') }}">
                @error('tajuk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="album" class="form-label">Album</label>
                <input type="text" class="form-control @error('album') is-invalid @enderror" id="album" name="album" required autofocus value="{{ old('album') }}">
                @error('album')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="ref_number" class="form-label">No. Rujukan/ No. Album</label>
                <input type="text" class="form-control @error('ref_number') is-invalid @enderror" id="ref_number" name="ref_number" required autofocus value="{{ old('ref_number') }}">
                @error('ref_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="pencipta_lagu" class="form-label">Pencipta Lagu</label>
                <input type="text" class="form-control @error('pencipta_lagu') is-invalid @enderror" id="pencipta_lagu" name="pencipta_lagu" required autofocus value="{{ old('pencipta_lagu') }}">
                @error('pencipta_lagu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="penulis_lirik" class="form-label">Penulis Lirik</label>
                <input type="text" class="form-control @error('penulis_lirik') is-invalid @enderror" id="penulis_lirik" name="penulis_lirik" required autofocus value="{{ old('penulis_lirik') }}">
                @error('penulis_lirik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="syarikat_rakaman" class="form-label">Syarikat Rakaman</label>
                <input type="text" class="form-control @error('syarikat_rakaman') is-invalid @enderror" id="syarikat_rakaman" name="syarikat_rakaman" required autofocus value="{{ old('syarikat_rakaman') }}">
                @error('syarikat_rakaman')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="song_category" class="form-label">Kategori Lagu</label>
                <select class="form-select @error('song_category_id') is-invalid @enderror" name="song_category_id">
                    <option value="0">- Pilih -</option>
                    @foreach ($song_categories as $song_category )
                        @if (old('song_category_id') == $song_category->id)
                            <option value="{{ $song_category->id }}" selected>{{ $song_category->kategori }}</option>
                        @else
                            <option value="{{ $song_category->id }}">{{ $song_category->kategori }}</option>
                        @endif
                    @endforeach
                </select>
                @error('song_category_id')
                    <div class="invalid-feedback" role="alert">
                        {{ "Sila Pilih Kategori Lagu" }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Negara</label>
                <select class="form-select @error('country_id') is-invalid @enderror"" name="country_id">
                    <option value="0">- Pilih -</option>
                    @foreach ($countries as $country )
                        @if (old('country_id') == $country->id)
                            <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                        @else
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('country_id')
                    <div class="invalid-feedback" role="alert">
                        {{ "Sila Pilih Negara" }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" rows="3"  name="catatan" autofocus value="{{ old('catatan') }}"></textarea>
                @error('catatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>      
            @enderror
            </div>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="lagu" class="form-label">Audio Lagu</label>
                    <input class="form-control @error('lagu') is-invalid @enderror" type="file" id="lagu" name="lagu" multiple>
                    @error('lagu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="fail_lagu" class="form-label">Lirik Lagu</label>
                    <input class="form-control @error('fail_lagu') is-invalid @enderror" type="file" id="fail_lagu" name="fail_lagu" multiple>
                    @error('fail_lagu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="tarikh_diterima" class="form-label">Tarikh Lagu Dihantar</label>
                <input type="date" class="form-control @error('tarikh_diterima') is-invalid @enderror" id="tarikh_diterima" name="tarikh_diterima" required autofocus value="{{ old('tarikh_diterima') }}">
                @error('tarikh_diterima')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>

            <a href="/lagu" class="btn btn-danger border-0" data-bs-toggle="modal" data-bs-target="#cancelModal">
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
                            <p>Adakah anda pasti untuk batal untuk mengisi?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <a href="/lagu" class="btn btn-danger">Ya</a>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-dark">Hantar Lagu</button>
        </form>
    </div>


@endsection