@extends('mainpage.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $song->tajuk }} by {{ $song->artis }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/lagu/{{ $song->id }}" class="mb-5" enctype="multipart/form-data">
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
                <label for="song_category" class="form-label">Kategori Lagu</label>
                <select class="form-select" name="song_category_id">
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
                <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" rows="3"  name="catatan" autofocus>{{ old('catatan',$song->catatan) }}</textarea>
                @error('catatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>      
            @enderror
            </div>
            <div class="mb-3">
                <label for="lagu" class="form-label">Audio Lagu</label>
                <div class="d-flex align-items-center mb-2">
                    <audio controls src="{{ $song->lagu }}" class="mr-2"></audio>
                </div>
                <input class="form-control @error('lagu') is-invalid @enderror" type="file" id="lagu" name="lagu" multiple>
                @error('lagu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="lagu" class="form-label">Audio Lagu</label>
                <div class="d-flex align-items-center mb-2">
                    @if(!empty($song->lagu))
                            @if(json_decode($song->lagu) !== null)
                                @foreach(json_decode($song->lagu) as $lagu)  
                                    <audio controls src="{{ $lagu }}"></audio>
                                @endforeach
                            @else
                                <span class="text-danger">Lagu tidak dapat disediakan</span>
                            @endif                        
                    @endif
                </div>
                <input class="form-control @error('lagu') is-invalid @enderror" type="file" id="lagu" name="lagu[]" multiple>
                @error('lagu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> --}}
            <div class="mb-3">
                <div class="mb-3">
                    <label for="fail_lagu" class="form-label">Fail Lagu</label>
                    <div class="d-flex align-items-center mb-2">
                        <?php
                        $url = $song->fail_lagu;
                        $filename = pathinfo($url, PATHINFO_FILENAME);
                        $fileExtension = pathinfo($url, PATHINFO_EXTENSION);
                        ?>
                        <a href="{{ asset($song->fail_lagu) }}" download target="_blank">{{ $filename }} ({{ strtoupper($fileExtension) }})</a>
                    </div>
                    <input class="form-control @error('fail_lagu') is-invalid @enderror" type="file" id="fail_lagu" name="fail_lagu" multiple>
                    @error('fail_lagu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                    @enderror
                </div>
            </div>
            {{-- <div class="mb-3">
                <div class="mb-3">
                    <label for="fail_lagu" class="form-label">Lirik Lagu</label>
                    <div class="d-flex align-items-center mb-2">
                        @if(!empty($song->fail_lagu))
                            @if(json_decode($song->fail_lagu) !== null)
                                @foreach(json_decode($song->fail_lagu) as $file_lagu)  
                                    @php
                                        $url = $file_lagu;
                                        $filename = pathinfo($url, PATHINFO_FILENAME);
                                        $fileExtension = pathinfo($url, PATHINFO_EXTENSION);
                                    @endphp
                                    <ul>
                                        <li><a href="{{ $file_lagu }}" download target="_blank">{{ $filename }} ({{ strtoupper($fileExtension) }})</a></li>
                                    </ul>
                                        
                                @endforeach
                            @else
                                <span class="text-danger">Dokumen tidak dapat disediakan</span>
                            @endif                        
                        @endif  
                    </div>
                    <input class="form-control @error('fail_lagu') is-invalid @enderror" type="file" id="fail_lagu" name="fail_lagu[]" multiple>
                    @error('fail_lagu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                    @enderror
                </div>
            </div> --}}
            <div class="mb-3">
                <label for="tarikh_diterima" class="form-label">Tarikh Lagu Dihantar</label>
                <input type="date" class="form-control @error('tarikh_diterima') is-invalid @enderror" id="tarikh_diterima" name="tarikh_diterima" required autofocus value="{{ old('tarikh_diterima',$song->tarikh_diterima) }}">
                @error('tarikh_diterima')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-dark link-light">
                <span data-feather="arrow-left"></span>
                Kembali
            </a>
            <input type="hidden" name="page" value="{{ request()->get('page')}}">
            <button type="submit" class="btn btn-success">Simpan</button>
            @endauth
        </form>
    </div>


@endsection