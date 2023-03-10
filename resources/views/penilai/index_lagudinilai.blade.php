@extends('mainpage.layouts.main')

@section('container')

@can('penilai')
<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Senarai lagu yang telah dinilai</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif


<div class="row">
    <div class="col-md-6">
        <form action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive col-lg-10">
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Bil.</th>
            <th scope="col">Artis</th>
            <th scope="col">Tajuk</th>
            <th scope="col">Lagu</th>
            <th scope="col">Tindakan</th>
            <th scope="col">Nama Penilai</th>
            <th scope="col">Nota</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($songs as $song )
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $song->artis }}</td>
                <td>{{ $song->tajuk }}</td>
                <td>
                    <audio controls src="{{ $song->lagu }}"></audio>
                </td>
                <td>
                    <a href="/penilai-lagu/{{ $song->id }}" class="badge bg-success link-light">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                    </a>
                    <a href="/penilai-lagu/{{ $song->id }}/edit" class="badge bg-info link-light">
                        <span data-feather="edit" class="align-text-bottom"></span>
                    </a>
                </td>
                <td>
                    @if ( $song->penilai_id == null)
                        Belum dipilih
                    @else
                        {{ $song->penilai->pilih_penilai}}
                    @endif
                </td>
                <td>
                    @if ($song->tarikh_dinilai == null)
                        Belum dinilai
                    @else
                        Telah dinilai
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
@endcan



@endsection