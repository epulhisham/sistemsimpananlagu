@extends('mainpage.layouts.main')

@section('container')

<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tetapan</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif

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
                <tr>
                    <td>1</td>
                    <td>Kategori Lagu</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="/tetapan/kategori-lagu" class="badge bg-success link-light mx-1">
                                <span data-feather="eye" class="align-text-bottom"></span>
                            </a>
                        </div>
                    </td> 
                </tr>
            </tbody>
        </table>
    </div>
</div>








@endsection