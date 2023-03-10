@extends('mainpage.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $song->tajuk }} by {{ $song->artis }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/penilai-lagu/{{ $song->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            @auth    
            @can('penilai')
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="lirik" class="form-label">Lirik</label>
                        <input type="text" class="form-control @error('lirik') is-invalid @enderror" id="lirik" name="lirik" required autofocus value="{{ old('lirik',$song->lirik) }}">
                        @error('lirik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>      
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sebutan" class="form-label">Sebutan</label>
                        <input type="text" class="form-control @error('sebutan') is-invalid @enderror" id="sebutan" name="sebutan" required autofocus value="{{ old('sebutan',$song->sebutan) }}">
                        @error('sebutan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>      
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nyanyian" class="form-label">Nyanyian</label>
                        <input type="text" class="form-control @error('nyanyian') is-invalid @enderror" id="nyanyian" name="nyanyian" required autofocus value="{{ old('nyanyian',$song->nyanyian) }}">
                        @error('nyanyian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>      
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="muzik" class="form-label">Muzik</label>
                        <input type="text" class="form-control @error('muzik') is-invalid @enderror" id="muzik" name="muzik" required autofocus value="{{ old('muzik',$song->muzik) }}">
                        @error('muzik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>      
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="penerbitan_teknikal" class="form-label">Penerbitan Teknikal</label>
                        <input type="text" class="form-control @error('penerbitan_teknikal') is-invalid @enderror" id="penerbitan_teknikal" name="penerbitan_teknikal" required autofocus value="{{ old('penerbitan_teknikal',$song->penerbitan_teknikal) }}">
                        @error('penerbitan_teknikal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>      
                        @enderror
                    </div>
                    <label for="tarikh_dinilai" class="form-label">Tarikh Lagu Dinilai</label>
                    <input type="date" class="form-control @error('tarikh_dinilai') is-invalid @enderror" id="tarikh_dinilai" name="tarikh_dinilai" required autofocus value="{{ old('tarikh_dinilai',$song->tarikh_dinilai) }}">
                    @error('tarikh_dinilai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>      
                    @enderror
                </div>
            @endcan

            <a href="{{ url()->previous() }}" class="btn btn-dark link-light">
                <span data-feather="arrow-left"></span>
                Kembali
            </a>
            <button type="submit" class="btn btn-success">Simpan</button>
            @endauth
        </form>
    </div>


@endsection