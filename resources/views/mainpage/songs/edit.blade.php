@extends('mainpage.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $song->tajuk }} by {{ $song->artis }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/mainpage/songs/{{ $song->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            @auth      
            <div class="mb-3">
                <label for="artis" class="form-label">Artis</label>
                <input type="text" class="form-control @error('artis') is-invalid @enderror" id="artis" name="artis" required autofocus value="{{ old('artis',$song->artis) }}">
                @error('artis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="tajuk" class="form-label">Tajuk</label>
                <input type="text" class="form-control @error('tajuk') is-invalid @enderror" id="tajuk" name="tajuk" required autofocus value="{{ old('tajuk',$song->tajuk) }}">
                @error('tajuk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="album" class="form-label">Album</label>
                <input type="text" class="form-control @error('album') is-invalid @enderror" id="album" name="album" required autofocus value="{{ old('album',$song->album) }}">
                @error('album')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="pencipta_lagu" class="form-label">Pencipta Lagu</label>
                <input type="text" class="form-control @error('pencipta_lagu') is-invalid @enderror" id="pencipta_lagu" name="pencipta_lagu" required autofocus value="{{ old('pencipta_lagu',$song->pencipta_lagu) }}">
                @error('pencipta_lagu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="penulis_lirik" class="form-label">Penulis Lirik</label>
                <input type="text" class="form-control @error('penulis_lirik') is-invalid @enderror" id="penulis_lirik" name="penulis_lirik" required autofocus value="{{ old('penulis_lirik',$song->penulis_lirik) }}">
                @error('penulis_lirik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="syarikat_rakaman" class="form-label">Syarikat Rakaman</label>
                <input type="text" class="form-control @error('syarikat_rakaman') is-invalid @enderror" id="syarikat_rakaman" name="syarikat_rakaman" required autofocus value="{{ old('syarikat_rakaman',$song->syarikat_rakaman) }}">
                @error('syarikat_rakaman')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategori_lagu" class="form-label">Kategori Lagu</label>
                <input type="text" class="form-control @error('kategori_lagu') is-invalid @enderror" id="kategori_lagu" name="kategori_lagu" required autofocus value="{{ old('kategori_lagu',$song->kategori_lagu) }}">
                @error('kategori_lagu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="saiz" class="form-label">Saiz (MB)</label>
                <input type="text" class="form-control @error('saiz') is-invalid @enderror" id="saiz" name="saiz" required autofocus value="{{ old('saiz',$song->saiz) }}">
                @error('saiz')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="row">
                <label for="masa" class="form-label">Masa (Duration)</label>
                <div class="col-lg-3 mb-3">
                    <label for="masa_minit" class="form-label">Minit</label>
                    <input type="number" class="form-control @error('masa_minit') is-invalid @enderror" id="masa_minit" name="masa_minit" required autofocus value="{{ old('masa_minit',$song->masa_minit) }}">
                    @error('masa_minit')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>      
                    @enderror
                </div>
                <div class="col-lg-3 mb-3">
                    <label for="masa_saat" class="form-label">Saat</label>
                    <input type="number" class="form-control @error('masa_saat') is-invalid @enderror" id="masa_saat" name="masa_saat" required autofocus value="{{ old('masa_saat',$song->masa_saat) }}">
                    @error('masa_saat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>      
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Negara</label>
                <select class="form-select" name="country_id">
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
                <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" rows="3"  name="catatan" required autofocus>{{ old('catatan',$song->catatan) }}</textarea>
                @error('catatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>      
            @enderror
            </div>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="fail_lagu" class="form-label">Fail Lagu</label>
                    <input type="hidden" name="old_fail_lagu" value="{{ $song->fail_lagu }}">
                    <input class="form-control @error('fail_lagu') is-invalid @enderror" type="file" id="fail_lagu" name="fail_lagu" multiple>
                    @error('fail_lagu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status Lagu</label>
                <select class="form-select" name="status_id">
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
                <label for="penilai" class="form-label">Pilih Penilai</label>
                <select class="form-select" name="penilai_id">
                    <option value="0">- Pilih -</option>
                    @foreach ($penilais as $penilai )
                        @if (old('penilai_id',$song->penilai->id) == $penilai->id)
                            <option value="{{ $penilai->id }}" selected>{{ $penilai->pilih_penilai }}</option>
                        @else
                            <option value="{{ $penilai->id }}">{{ $penilai->pilih_penilai }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tarikh_diterima" class="form-label">Tarikh Lagu Diterima</label>
                <input type="date" class="form-control @error('tarikh_diterima') is-invalid @enderror" id="tarikh_diterima" name="tarikh_diterima" required autofocus value="{{ old('tarikh_diterima',$song->tarikh_diterima) }}">
                @error('tarikh_diterima')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>

            @can('penilai')
            <div class="mb-3 mt-5 border-bottom">
                <label for="penilai" class="fs-5 fw-bold">Bahagian Penilai</label>
            </div>
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

            @can('pelulus')
            <div class="mb-3 mt-5 border-bottom">
                <label for="pelulus" class="fs-5 fw-bold">Bahagian Pelulus</label>
            </div>
            <div class="mb-3">
                <label for="keputusan" class="form-label">Keputusan</label>
                <select class="form-select" name="keputusan_id">
                    <option value="0">- Pilih -</option>
                    @foreach ($keputusans as $keputusan )
                    @if (old('keputusan_id',$song->keputusan_id) == $keputusan->id)
                        <option value="{{ $keputusan->id }}" selected>{{ $keputusan->pilih_keputusan }}</option>
                    @else
                        <option value="{{ $keputusan->id }}">{{ $keputusan->pilih_keputusan }}</option>
                    @endif
                @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="terbit" class="form-label">Penerbitan Lagu</label>
                <div class="form-check form-switch">
                    <input type="checkbox" id="terbit" name="terbit" class="form-check-input" value="1" {{ old('terbit',$song->terbit)}}>
                    <label class="form-check-label" for="terbit">Lagu Diterbitkan</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="tarikh_diluluskan" class="form-label">Tarikh Lagu Diluluskan</label>
                <input type="date" class="form-control @error('tarikh_diluluskan') is-invalid @enderror" id="tarikh_diluluskan" name="tarikh_diluluskan" required autofocus value="{{ old('tarikh_diluluskan',$song->tarikh_diluluskan) }}">
                @error('tarikh_diluluskan')
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