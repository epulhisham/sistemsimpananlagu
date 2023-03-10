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
        <form action="/lagu/diterbit">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive col-md-10">
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Bil.</th>
            <th scope="col">Artis</th>
            <th scope="col">Tajuk</th>
            <th scope="col">Fail Lagu</th>
            <th scope="col">Tindakan</th>
            <th scope="col">Daripada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($songs as $song )
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $song->artis }}</td>
                <td>{{ $song->tajuk }}</td>
                <td>
                    <audio controls controlsList="nodownload" src="{{ $song->lagu }}"></audio>
                </td>
                <td>
                    <a href="/lagu-diterbit/{{ $song->id }}" class="badge bg-success link-light">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                    </a>
                    <a href="{{ $song->lagu }}" target="_blank" download="{{ $song->lagu }}" onclick="download({{ $song->id }})" class="badge bg-dark link-light">
                        <span data-feather="download" class="align-text-bottom"></span>
                    </a>
                </td>
                <td>{{ $song->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $songs->links() }}
    </div>
</div>

<script>
    function download(id) {
        $.ajax({
            type:'GET',
            url:"{{ route('downloadCount') }}",
            data:{id:id},
            success:function(data){
            }
        })
    }
    // $(document).ready(function(){

    //     $(".downloader").click(function(){
    //         alert('sasass')
    //     var songid = $(this).attr('data-id');
    //         console.log(songid)
    //     $.ajax({
    //         type:'GET',
    //         url:"{{ route('downloadCount') }}",
    //         data:{id:songid},
    //         success:function(data){
    //             console.log(data);
    //         }
    //     })
    //     })
    // })
</script>

@endsection