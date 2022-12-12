@extends('mainpage.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Profile</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/edit-profile/{{ auth()->user()->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            @auth      
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name',auth()->user()->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username',auth()->user()->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email',auth()->user()->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="choose_user" class="form-label">Pilih Pengguna</label>
                <select class="form-select" name="choose_user_id">
                    <option value="0">- Pilih -</option>
                    @foreach ($choose_users as $choose_user )
                    @if (old('choose_user_id',auth()->user()->choose_user_id) == $choose_user->id)
                        <option value="{{ $choose_user->id }}" selected>{{ $choose_user->pilih_pengguna }}</option>
                    @else
                        <option value="{{ $choose_user->id }}">{{ $choose_user->pilih_pengguna }}</option>
                    @endif
                @endforeach
                </select>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-dark link-light">
                <span data-feather="arrow-left"></span>
                Kembali
            </a>
            <button type="submit" class="btn btn-success">Simpan</button>
            @endauth
        </form>
    </div>


@endsection