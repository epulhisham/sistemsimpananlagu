@extends('mainpage.layouts.main')

@section('container')

<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Senarai semua lagu</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif

<a href="/lagu/create" class="btn btn-dark mb-3">Hantar Lagu</a>

<div class="row">
    <div class="col-md-6">
        <form action="/pelulus-lagu">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive-lg col-md-11">
    <div style="overflow-x: auto;">
    @if (count($songs) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Bil.</th>
                <th scope="col">Artis</th>
                <th scope="col">Tajuk</th>
                <th scope="col">Album</th>
                <th scope="col">Lagu</th>
                <th scope="col">Tindakan</th>
                <th scope="col">Daripada</th>
                <th scope="col">Nama Penilai</th>
                <th scope="col">Penilaian</th>
                <th scope="col">Keputusan</th>
                <th scope="col">Terbit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($songs as $song )
                    <tr>
                        <td>{{ $songs->firstItem() + $loop->index }}</td>
                        <td>{{ $song->artis }}</td>
                        <td>{{ $song->tajuk }}</td>
                        <td>{{ $song->album }}</td>
                        <td>
                            <div class="audio-container">
                                <audio controls src="{{ $song->lagu }}"></audio>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-item-center">
                                <a href="/pelulus-lagu/{{ $song->id }}" class="badge bg-success link-light mx-1">
                                    <span data-feather="file-text" class=""></span>
                                </a>
                                <a href="/lagu/{{ $song->id }}/edit" class="badge bg-warning link-light mx-1">
                                    <span data-feather="edit-3" class=""></span>
                                </a>
                                <a href="/pelulus-lagu/{{ $song->id }}/edit" class="badge bg-info link-light mx-1">
                                    <span data-feather="edit" class=""></span>
                                </a>
                                <button class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#deleteSongModal{{ $song->id }}">
                                    <span data-feather="trash" class="align-text-bottom"></span>
                                </button>
                                
                                <!-- Delete Song Modal -->
                                <div class="modal fade" id="deleteSongModal{{ $song->id }}" tabindex="-1" aria-labelledby="deleteSongModalLabel{{ $song->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteSongModalLabel{{ $song->id }}">Mengesahkan Padam</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Adakah anda pasti untuk memadam lagu ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form id="deleteSongForm{{ $song->id }}" method="POST" action="/pelulus-lagu/{{ $song->id }}" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Padam</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $song->user->name }}</td>
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
                        <td>
                            @if ($song->keputusan_id > 0)
                                {{ $song->keputusan->pilih_keputusan }}
                            @else
                                Belum membuat keputusan
                            @endif
                        </td>
                        <td>
                            @if ($song->terbit > 0)
                                Telah diterbit
                            @else
                                Belum diterbit
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
                    <th scope="col">Lagu</th>
                    <th scope="col">Tindakan</th>
                    <th scope="col">Daripada</th>
                    <th scope="col">Nama Penilai</th>
                    <th scope="col">Penilaian</th>
                    <th scope="col">Keputusan</th>
                    <th scope="col">Terbit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="11" class="text-center">Tiada Maklumat</td>
                </tr>
            </tbody>
        </table>
        
    @endif
    </div>

</div>


@endsection