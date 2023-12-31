@extends('mainpage.layouts.main')

@section('container')

<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Senarai lagu yang diterbit</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row">
    <div class="col-md-6">
        <form action="/lagu-diterbit">
            <form action="/lagu-diterbit" method="GET">
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
                        <option value="user"{{ request('search_field') === 'user' ? ' selected' : '' }}>Daripada</option>
                    </select>
                    <input type="text" class="form-control" placeholder="Search" name="search_query" value="{{ request('search_query') }}">
                    <button class="btn btn-dark" type="submit">Cari</button>
                </div>
            </form>
        </form>
    </div>
</div>

<div class="table-responsive col-md-10">
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
                    <th scope="col">Daripada</th>
                    <th scope="col">Tarikh Diterbitkan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($songs as $song )
                    <tr>
                    <td>{{ $loop->iteration }}</td>
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
                        <audio controls controlsList="nodownload" src="{{ $song->lagu }}"></audio>
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
                        <div class="d-flex align-item-center">
                            <a href="/lagu-diterbit/{{ $song->id }}" class="badge bg-success link-light mx-1">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                            </a>
                            <a href="{{ $song->lagu }}" target="_blank" download="{{ $song->lagu }}" onClick="downloadSong({{ $song->id }})" class="badge bg-dark link-light mx-1">
                                <span data-feather="download" class="align-text-bottom"></span>
                            </a>
                        </div>
                    
                    </td>
                    <td>{{ $song->user->name }}</td>
                    <td>{{ $song->updated_at }}</td>
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
                    <th scope="col">Daripada</th>
                    <th scope="col">Tarikh Diterbitkan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="16" class="text-center">
                        Tiada Maklumat.
                    </td>
                </tr>
            </tbody>
        </table>
    @endif
</div>

<script>
    function downloadSong(id) {
        $.ajax({
            type:'GET',
            url:"{{ route('downloadCount') }}",
            data:{id:id},
            success:function(data){
            }
        })
    }
</script>

@endsection