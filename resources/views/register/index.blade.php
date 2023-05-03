@extends('login.main')

@section('loginContainer')

    <div class="row justify-content-center">
        <div class="col-lg-3">   
            <img class="mb-2" src="/img/rtm.png" alt="" width="230" height="170">         
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ 'Username sudah wujud di dalam sistem' }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ 'Email sudah wujud di dalam sistem' }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="tel" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Enter phone number" required value="{{ old('phone_number') }}">
                        <label for="phone_number">Phone number</label>
                        @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>                    
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ 'Password mestilah sekurang-kurangya 5 aksara' }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select id="choose_user_id" class="form-select rounded-bottom @error('choose_user_id') is-invalid @enderror" name="choose_user_id">
                            <option value="0">- Pilih Pengguna -</option>
                            @foreach ($choose_users as $choose_user )
                                @if ($choose_user->id != 5)
                                    @if (old('choose_user_id') == $choose_user->id)
                                        <option value="{{ $choose_user->id }}" selected>{{ $choose_user->pilih_pengguna }}</option>
                                    @else
                                        <option value="{{ $choose_user->id }}">{{ $choose_user->pilih_pengguna }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                        @error('choose_user_id')
                            <div class="invalid-feedback">
                                {{ 'Sila Pilih pengguna' }}
                            </div>
                        @enderror                        
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-1" type="submit">Daftar</button>
                </form>
                <small class="d-block text-center mt-3">Sudah Berdaftar? <a href="/login">Log Masuk</a></small>
            </main>
        </div>
    </div>


@endsection