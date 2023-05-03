@extends('mainpage.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kandungan : {{  $user->name }}</h1>
    </div>

    <div class="col-lg-8">    
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" disabled value="{{ old('name', $user->name) }}">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" disabled value="{{ old('username',$user->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" disabled value="{{ old('email',$user->email) }}">
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="name@example.com" disabled value="{{ old('password',$user->password) }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="choose_user" class="form-label">Peranan</label>
                <select class="form-select" name="choose_user_id" disabled>
                    <option value="0">- Pilih -</option>
                    @foreach ($choose_users as $choose_user )
                        @if (old('choose_user_id',$user->choose_user_id) == $choose_user->id)
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
            <a href="/admin/{{ $user->id }}/edit" class="btn btn-info link-light">
                <span data-feather="edit"></span>
                Kemaskini
            </a>
            <form action="/admin/{{ $user->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">
                    <span data-feather="trash"></span>
                    Padam
                </button>
            </form>
        
    </div>


@endsection