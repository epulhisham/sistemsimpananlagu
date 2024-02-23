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
        <form action="/lagu-dinilai">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive col-lg-10">
    @if (count($songs) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Bil.</th>
                <th scope="col">Artis</th>
                <th scope="col">Tajuk</th>
                <th scope="col">Lagu</th>
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
                <td>
                    <audio controls src="{{ $song->lagu }}"></audio>
                </td>
                <td>
                    <div class="d-flex align-item-center">
                        <a href="/penilai-lagu/{{ $song->id }}" class="badge bg-success link-light mx-1">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                        </a>
                        <a href="/penilai-lagu/{{ $song->id }}/edit" class="badge bg-info link-light mx-1">
                            <span data-feather="edit" class="align-text-bottom"></span>
                        </a>
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
                <th scope="col">Lagu</th>
                <th scope="col">Tindakan</th>
                <th scope="col">Penilaian</th>
                <th scope="col">Keputusan</th>
                </tr>
            </thead>
            <tr>
                <td class="text-center" colspan="7">Tiada Maklumat.</td>
            </tr>
        </table>
    @endif
</div>
@endcan



@endsection