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


<a href="/mainpage/songs/create" class="btn btn-dark mb-3">Hantar Lagu</a>

<div class="row">
    <div class="col-md-6">
        <form action="/dihantar/songs">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive-lg col-md-11">
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Bil.</th>
            <th scope="col">Artis</th>
            <th scope="col">Tajuk</th>
            <th scope="col">Fail Lagu</th>
            <th scope="col">Tindakan</th>
            <th scope="col">Penilaian</th>
            <th scope="col">Keputusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($songs as $song )
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $song->artis }}</td>
                <td>{{ $song->tajuk }}</td>
                <td>
                    <audio controls src="{{ $song->fail_lagu }}"></audio>
                </td>
                <td>
                    <a href="/mainpage/songs/{{ $song->id }}" class="badge bg-success link-light">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                    </a>
                    <a href="/mainpage/songs/{{ $song->id }}/edit" class="badge bg-info link-light">
                        <span data-feather="edit" class="align-text-bottom"></span>
                    </a>
                    <form action="/mainpage/songs/{{ $song->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                            <span data-feather="trash" class="align-text-bottom"></span>
                        </button>
                    </form>
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
</div>








@endsection