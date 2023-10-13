@extends('mainpage.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $song->tajuk }} by {{ $song->artis }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/pelulus-lagu/{{ $song->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            @auth  
            <div class="mb-3">
                <label for="keputusan class="form-label">Keputusan</label>
                <select class="form-select" name="keputusan_id" disabled>
                    <option value="0">- Pilih -</option>
                    @foreach ($keputusans as $keputusan)
                        @if (old('keputusanid',$song->keputusan->id) == $keputusan->id)
                            <option value="{{ $keputusan->id }}" selected>{{ $keputusan->pilih_keputusan }}</option>
                        @else
                            <option value="{{ $keputusan->id }}">{{ $keputusan->pilih_keputusan }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status Lagu</label>
                <select class="form-select" name="status_id">
                    <option value="0">- Pilih -</option>
                    @foreach ($statuses as $status )
                        @if (old('status_id',$song->status_id) == $status->id)
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
                        @if (old('penilai_id',$song->penilai_id) == $penilai->id)
                            <option value="{{ $penilai->id }}" selected>{{ $penilai->pilih_penilai }}</option>
                        @else
                            <option value="{{ $penilai->id }}">{{ $penilai->pilih_penilai }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
                <div class="mb-3">
                    <label for="terbit" class="form-label">Penerbitan Lagu</label>
                    <div class="form-check form-switch">
                        <input type="checkbox" id="terbit" name="terbit" class="form-check-input" value="1" {{ old('terbit',$song->terbit) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="terbit">Lagu Diterbitkan</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tarikh_dinilai" class="form-label">Lagu dinilai</label>
                    <div class="form-check form-switch">
                        <input type="checkbox" id="tarikh_dinilai" name="tarikh_dinilai" class="form-check-input" value="1" {{ old('tarikh_dinilai', $song->tarikh_dinilai) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tarikh_dinilai">Lagu telah dinilai</label>
                    </div>
                </div>                               
                <div class="mb-3">
                    <label for="tarikh_diluluskan" class="form-label">Tarikh</label>
                    <input type="date" class="form-control @error('tarikh_diluluskan') is-invalid @enderror" id="tarikh_diluluskan" name="tarikh_diluluskan" required autofocus value="{{ old('tarikh_diluluskan',$song->tarikh_diluluskan) }}">
                    @error('tarikh_diluluskan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>      
                    @enderror
                </div>

            <a href="{{ url()->previous() }}" class="btn btn-dark link-light">
                <span data-feather="arrow-left"></span>
                Kembali
            </a>
            <button type="submit" class="btn btn-success">Simpan</button>
            @endauth
        </form>
    </div>


@endsection