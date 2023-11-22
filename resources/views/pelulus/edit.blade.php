@extends('mainpage.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" id="songForm">
        <h1 class="h2">{{ $song->tajuk }} by {{ $song->artis }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/pelulus-lagu/{{ $song->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            @auth  
            <div class="mb-3">
                <label for="keputusan" class="form-label">Keputusan</label>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        // Function to toggle disabled attribute for specific form fields
        function toggleFormFields() {
            const isTarikhDinilaiChecked = document.getElementById('tarikh_dinilai').checked;

            // Specify the IDs of the form fields you want to toggle
            const fieldIdsToToggle = ['lirik', 'sebutan', 'nyanyian', 'muzik', 'penerbitan_teknikal', 'keputusan_id'];

            fieldIdsToToggle.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field) {
                    field.disabled = !isTarikhDinilaiChecked;
                }
            });

            // Enable/disable the tarikh_dinilai field separately
            const tarikhDinilaiField = document.getElementById('tarikh_dinilai');
            if (tarikhDinilaiField) {
                tarikhDinilaiField.disabled = false; // Always enable this field
            }
        }

            // Initial toggle on page load
            toggleFormFields();

            // Add event listener for checkbox change
            document.getElementById('tarikh_dinilai').addEventListener('change', toggleFormFields);
        });

    </script>


@endsection