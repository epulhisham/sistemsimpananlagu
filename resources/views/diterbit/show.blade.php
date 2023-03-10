@extends('mainpage.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kandungan : {{ $song->tajuk }} by {{ $song->artis }}</h1>
    </div>

    <div class="col-lg-8 mb-5">
        <div class="mb-3">
            <label for="artis" class="form-label">Artis</label>
            <input type="text" class="form-control" id="artis" name="artis" disabled required autofocus value="{{ old('artis',$song->artis) }}">
        </div>
        <div class="mb-3">
            <label for="tajuk" class="form-label">Tajuk</label>
            <input type="text" class="form-control" id="tajuk" name="tajuk" disabled required autofocus value="{{ old('tajuk',$song->tajuk) }}">
        </div>
        <div class="mb-3">
            <label for="album" class="form-label">Album</label>
            <input type="text" class="form-control" id="album" name="album" disabled required autofocus value="{{ old('album',$song->album) }}">
        </div>
        <div class="mb-3">
            <label for="pencipta_lagu" class="form-label">Pencipta Lagu</label>
            <input type="text" class="form-control" id="pencipta_lagu" name="pencipta_lagu" disabled required autofocus value="{{ old('pencipta_lagu',$song->pencipta_lagu) }}">
        </div>
        <div class="mb-3">
            <label for="penulis_lirik" class="form-label">Penulis Lirik</label>
            <input type="text" class="form-control" id="penulis_lirik" name="penulis_lirik" disabled required autofocus value="{{ old('penulis_lirik',$song->penulis_lirik) }}">
        </div>
        <div class="mb-3">
            <label for="syarikat_rakaman" class="form-label">Syarikat Rakaman</label>
            <input type="text" class="form-control" id="syarikat_rakaman" name="syarikat_rakaman" disabled required autofocus value="{{ old('syarikat_rakaman',$song->syarikat_rakaman) }}">
        </div>
        <div class="mb-3">
            <label for="song_category" class="form-label">Kategori Lagu</label>
            <select class="form-select" name="song_category_id" disabled>
                <option value="0">- Pilih -</option>
                @foreach ($song_categories as $song_category )
                    @if (old('song_category_id',$song->song_category->id) == $song_category->id)
                        <option value="{{ $song_category->id }}" selected>{{ $song_category->kategori }}</option>
                    @else
                        <option value="{{ $song_category->id }}">{{ $song_category->kategori }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Negara</label>
            <select class="form-select" name="country_id" disabled>
                <option value="0">- Pilih -</option>
                @foreach ($countries as $country )
                    @if (old('country_id',$song->country->id) == $country->id)
                        <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                    @else
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" id="catatan" rows="3"  name="catatan" disabled required autofocus >{{ old('catatan',$song->catatan) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="lagu" class="form-label">Lagu</label>
            <div class="row">
                <audio controls src="{{ $song->lagu }}"></audio>
            </div>
        </div>
        <div class="mb-3">
            <label for="fail_lagu" class="form-label">Fail Lagu</label>
            <div class="row">
                <a href="{{ $song->fail_lagu }}" class="badge bg-dark" target="_blank"><span data-feather="download" class="align-text-bottom"></span></a>
            </div>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status Lagu</label>
            <select class="form-select" name="status_id" disabled>
                <option value="0">- Pilih -</option>
                @foreach ($statuses as $status )
                    @if (old('status_id',$song->status->id) == $status->id)
                        <option value="{{ $status->id }}" selected>{{ $status->status_lagu }}</option>
                    @else
                        <option value="{{ $status->id }}">{{ $status->status_lagu }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tarikh_diterima" class="form-label">Tarikh Lagu Diterima</label>
            <input type="date" class="form-control @error('tarikh_diterima') is-invalid @enderror" id="tarikh_diterima" name="tarikh_diterima" disabled required autofocus value="{{ old('tarikh_diterima',$song->tarikh_diterima) }}">
            @error('tarikh_diterima')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>      
            @enderror
        </div>
        <div class="mb-3 mt-5 border-bottom">
            <label for="penilai" class="fs-5 fw-bold">Bahagian Penilai</label>
        </div>
        <div class="mb-3">
            <label for="lirik" class="form-label">Lirik</label>
            <input type="text" class="form-control" id="lirik" name="lirik" disabled required autofocus value="{{ old('lirik',$song->lirik) }}">
        </div>
        <div class="mb-3">
            <label for="sebutan" class="form-label">Sebutan</label>
            <input type="text" class="form-control" id="sebutan" name="sebutan" disabled required autofocus value="{{ old('sebutan',$song->sebutan) }}">
        </div>
        <div class="mb-3">
            <label for="nyanyian" class="form-label">Nyanyian</label>
            <input type="text" class="form-control" id="nyanyian" name="nyanyian" disabled required autofocus value="{{ old('nyanyian',$song->nyanyian) }}">
        </div>
        <div class="mb-3">
            <label for="muzik" class="form-label">Muzik</label>
            <input type="text" class="form-control" id="muzik" name="muzik" disabled required autofocus value="{{ old('muzik',$song->muzik) }}">
        </div>
        <div class="mb-3">
            <label for="penerbitan_teknikal" class="form-label">Penerbitan Teknikal</label>
            <input type="text" class="form-control" id="penerbitan_teknikal" name="penerbitan_teknikal" disabled required autofocus value="{{ old('penerbitan_teknikal',$song->penerbitan_teknikal) }}">
        </div>
        <div class="mb-3">
            <label for="tarikh_dinilai" class="form-label">Tarikh Lagu Dinilai</label>
            <input type="date" class="form-control @error('tarikh_dinilai') is-invalid @enderror" id="tarikh_dinilai" name="tarikh_dinilai" disabled value="{{ old('tarikh_dinilai',$song->tarikh_dinilai) }}">
            @error('tarikh_dinilai')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>      
            @enderror
        </div>
        <a href="javascript:history.back()" class="btn btn-dark link-light">
            <span data-feather="arrow-left"></span>
            Kembali
        </a>
    </div>

@endsection