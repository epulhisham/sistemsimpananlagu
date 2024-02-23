@extends('mainpage.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kemaskini Pengguna : {{  $user->name }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/admin/{{ $user->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            @auth      
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username',$user->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>      
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email',$user->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone_number">Phone number</label>
                <input type="tel" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Enter phone number" required value="{{ old('phone_number',$user->phone_number) }}">
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                @enderror
            </div>  

            <div class="mb-3">
                <label for="isApproved" class="form-label">Sahkan Pengguna</label>
                <div class="form-check form-switch">
                    <input type="checkbox" id="isApproved" name="isApproved" class="form-check-input" value="1" {{ old('isApproved',$user->isApproved) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="isApproved">Sah Pengguna</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="choose_user" class="form-label">Peranan</label>
                <select class="form-select" name="choose_user_id">
                    <option value="0">- Pilih -</option>
                    @foreach ($choose_users as $choose_user)
                        @if ($choose_user->id == 5)
                            @continue
                        @endif
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
            <input type="hidden" name="page" value="{{ request()->get('page')}}">
            <button type="submit" class="btn btn-success">Simpan</button>
            @endauth
        </form>
    </div>


@endsection