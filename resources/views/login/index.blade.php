@extends('login.main')

@section('loginContainer')

<main class="form-signin">
    <img class="mb-2" src="/img/rtm.png" alt="" width="230" height="170">
    <h1 class="h3 mb-3 fw-normal">Sistem Simpan Lagu</h1>

    <form action="/login" method="post">
      @csrf 
      <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
        <label for="email">Email address</label>
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        <label for="password">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Log Masuk</button>
    </form>
    <small class="d-block text-center mt-3">Belum daftar? <a href="/register">Daftar disini!</a></small>
</main>

<div class="row justify-content-center">
  <div class="col-md-4">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  
    @endif

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  
    @endif
  </div>
</div>


@endsection