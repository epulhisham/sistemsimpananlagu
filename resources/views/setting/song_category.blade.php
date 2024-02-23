@extends('mainpage.layouts.main')

@section('container')

<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tetapan: Kategori Lagu</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif

<a href="/tetapan/kategori-lagu/tambah-kategori-lagu" class="btn btn-dark mb-3">Tambah</a>

<div class="table-responsive-lg col-md-11">
    <div style="overflow-x:auto;">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Bil.</th>
                <th scope="col">Nama</th>
                <th scope="col">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($song_categories as $song_category )
                    <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $song_category->kategori }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="/tetapan/kategori-lagu/{{ $song_category->id }}/edit-kategori-lagu" class="badge bg-warning link-light mx-1">
                                <span data-feather="edit-3" class="align-text-bottom"></span>
                            </a>

                            <button class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#deleteSongCategoryModal{{ $song_category->id }}">
                                <span data-feather="trash" class="align-text-bottom"></span>
                            </button>
                            
                            <!-- Delete Song Modal -->
                            <div class="modal fade" id="deleteSongCategoryModal{{ $song_category->id }}" tabindex="-1" aria-labelledby="deleteSongCategoryModalLabel{{ $song_category->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteSongCategoryModalLabel{{ $song_category->id }}">Mengesahkan Padam</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Adakah anda pasti untuk memadam kategori lagu ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form id="deleteSongCategoryForm{{ $song_category->id }}" method="POST" action="/tetapan/kategori-lagu/{{ $song_category->id }}" class="d-inline">
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
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $song_categories->links() }}
        </div>
    </div>
</div>








@endsection