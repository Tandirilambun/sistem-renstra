@extends('main.guest')
@section('guest')
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-5">
            @if (session()->has('loginFailed'))
                <div class="alert alert-danger" role="alert">
                    {{ session('loginFailed') }}
                </div>
            @endif
            <main class="form-signin p-4 my-5" style="background: #0088005a;">
                <form action="/login" method="POST">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <img class="mb-4" src="{{ asset('img/logo/Logo_SN_Text.png') }}" alt="" width="100"
                            height="100">
                    </div>
                    <h1 class="h3 mb-5 fw-normal" style="text-align: center">Sign In</h1>
                    <div class="d-flex justify-content-center mb-3" style="width:100%">
                        <div class="form-floating">
                            <input type="text" name="username"
                                class="form-control border border-0 rounded rounded-4 @error('username') is-invalid @enderror" id="username"
                                placeholder="Username or Email" autofocus>
                            <label for="floatingInput">Username or Email</label>
                            @error('username')
                                <div class="invalid-feedback mb-2" style="font-size: 10px;"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-center" style="width:100%">
                        <div class="form-floating">
                            <input type="password" name="password"
                                class="form-control border border-0 rounded rounded-4 @error('password') is-invalid @enderror" id="password"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            @error('password')
                                <div class="invalid-feedback mb-2" style="font-size: 10px;"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn py-2 mt-5" type="submit" style="background:#008800; color:white; font-weight:bold;">Sign in</button>
                    </div>
                    <small class="d-block text-center mt-3">Not Registered? 
                        <a href="/register" style="text-decoration:none; color:white; font-weight:bold;">
                            Register Now!
                        </a>
                    </small>
                    <p class="mt-5 mb-3 text-body-secondary">&copy;2023</p>
                </form>
            </main>
        </div>
    </div>
@endsection
