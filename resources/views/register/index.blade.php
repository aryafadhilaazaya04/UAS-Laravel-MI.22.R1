@extends('layouts.main')
@section('content')

<div class="row justify-content-center align-items-center">
    <div class="col-lg-5">
        <main class="form-register w-100 mt-2 mb-4">
            <h1 class="h3 mb-3 fw-normal text-center mb-4">Register</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="form-floating mb-2">
                    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}"/>
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-2">
                    <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}"/>
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-2">
                    <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="Email" required value="{{ old('email') }}"/>
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-2">
                    <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password" required/>
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-outline-danger w-100" type="submit" style="border-radius: 1rem;">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already have an account? <a href="/login" class="text-decoration-none">Login Here!</a></small>
        </main>
    </div>
</div>

@endsection