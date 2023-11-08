@extends('mainpage.layouts.main')

@section('container')

<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Senarai Lagu</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif


<a href="/lagu/create" class="btn btn-dark mb-3">Hantar Lagu</a>

<div class="row">
    <div class="col-md-6">
        <form action="/lagu">
            <form action="/lagu" method="GET">
                <div class="input-group mb-3">
                    <select class="form-select" name="search_field">
                        <option value="artis"{{ request('search_field') === 'artis' ? ' selected' : '' }}>Artis</option>
                        <option value="tajuk"{{ request('search_field') === 'tajuk' ? ' selected' : '' }}>Tajuk</option>
                        <option value="album"{{ request('search_field') === 'album' ? ' selected' : '' }}>Album</option>
                        <option value="ref_number"{{ request('search_field') === 'ref_number' ? ' selected' : '' }}>No.Rujukan/ No. Album</option>
                        <option value="pencipta_lagu"{{ request('search_field') === 'pencipta_lagu' ? ' selected' : '' }}>Pencipta Lagu</option>
                        <option value="penulis_lirik"{{ request('search_field') === 'penulis_lirik' ? ' selected' : '' }}>Penulis Lirik</option>
                        <option value="syarikat_rakaman"{{ request('search_field') === 'syarikat_rakaman' ? ' selected' : '' }}>Syarikat Rakaman</option>
                        <option value="song_category"{{ request('search_field') === 'song_category' ? ' selected' : '' }}>Kategori Lagu</option>
                        <option value="country"{{ request('search_field') === 'country' ? ' selected' : '' }}>Negara</option>
                        <option value="catatan"{{ request('search_field') === 'catatan' ? ' selected' : '' }}>Catatan</option>
                        <option value="tarikh_dinilai"{{ request('search_field') === 'tarikh_dinilai' ? ' selected' : '' }}>Penilaian</option>
                        <option value="keputusan"{{ request('search_field') === 'keputusan' ? ' selected' : '' }}>Keputusan</option>
                    </select>
                    <input type="text" class="form-control" placeholder="Search" name="search_query" value="{{ request('search_query') }}">
                    <button class="btn btn-dark" type="submit">Cari</button>
                </div>
            </form>
        </form>
    </div>
</div>

<div class="table-responsive-lg col-md-11">
    <div style="overflow-x:auto;">
    @if (count($songs) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Bil.</th>
                <th scope="col">Artis</th>
                <th scope="col">Tajuk</th>
                <th scope="col">Album</th>
                <th scope="col">No. Rujukan/ No. Album</th>
                <th scope="col">Pencipta Lagu</th>
                <th scope="col">Penulis Lirik</th>
                <th scope="col">Syarikat Rakaman</th>
                <th scope="col">Kategori Lagu</th>
                <th scope="col">Negara</th>
                <th scope="col">Catatan</th>
                <th scope="col">Lagu</th>
                <th scope="col">Fail Lagu</th>
                <th scope="col">Tindakan</th>
                <th scope="col">Penilaian</th>
                <th scope="col">Keputusan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($songs as $song )
                    <tr>
                    <td>{{ $songs->firstItem() + $loop->index }}</td>
                    <td>{{ $song->artis }}</td>
                    <td>{{ $song->tajuk }}</td>
                    <td>{{ $song->album }}</td>
                    <td>{{ $song->ref_number }}</td>
                    <td>{{ $song->pencipta_lagu }}</td>
                    <td>{{ $song->penulis_lirik }}</td>
                    <td>{{ $song->syarikat_rakaman }}</td>
                    <td>{{ $song->song_category->kategori }}</td>
                    <td>{{ $song->country->name }}</td>
                    <td>{{ $song->catatan }}</td>
                    <td>
                        <audio controls src="{{ $song->lagu }}"></audio>
                    </td>
                    <td>
                        <?php
                        $url = $song->fail_lagu;
                        $filename = pathinfo($url, PATHINFO_FILENAME);
                        $fileExtension = pathinfo($url, PATHINFO_EXTENSION);
                        ?>
                        <a href="{{ asset($song->fail_lagu) }}" download target="_blank">{{ $filename }} ({{ strtoupper($fileExtension) }})</a>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="/lagu/{{ $song->id }}" class="badge bg-success link-light mx-1">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                            </a>
                            @can('syarikat_stesen')
                                <a href="/lagu/{{ $song->id }}/edit" class="badge bg-warning link-light mx-1">
                                    <span data-feather="edit-3" class=""></span>
                                </a>
                            @endcan
                        </div>
                    </td>                                       
                    <td>
                        @if ($song->tarikh_dinilai == null)
                            Belum dinilai
                        @else
                            Telah dinilai
                        @endif
                    </td>
                    <td>
                        @if ($song->keputusan_id > 0)
                            {{ $song->keputusan->pilih_keputusan }}
                        @else
                            Belum membuat keputusan
                        @endif
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $songs->links() }}
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Bil.</th>
                    <th scope="col">Artis</th>
                    <th scope="col">Tajuk</th>
                    <th scope="col">Album</th>
                    <th scope="col">No. Rujukan/ No. Album</th>
                    <th scope="col">Pencipta Lagu</th>
                    <th scope="col">Penulis Lirik</th>
                    <th scope="col">Syarikat Rakaman</th>
                    <th scope="col">Kategori Lagu</th>
                    <th scope="col">Negara</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Lagu</th>
                    <th scope="col">Fail Lagu</th>
                    <th scope="col">Tindakan</th>
                    <th scope="col">Penilaian</th>
                    <th scope="col">Keputusan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="16" class="text-center">Tiada Maklumat.</td>
                </tr>
            </tbody>
        </table>
    @endif
    </div>
</div>








@endsection