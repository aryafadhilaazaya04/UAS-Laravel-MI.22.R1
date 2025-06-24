@extends('layouts.main')
@section('content')

<div class="row justify-content-center align-items-center">
    <div class="col-lg-5">
        <main class="form-register w-100 mt-2">
            <h1 class="h3 mb-3 fw-normal text-center mb-4">Register</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" />
                    <label for="name">Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" />
                    <label for="username">Username</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" />
                    <label for="email">Email address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
                    <label for="password">Password</label>
                </div>

                <button class="btn btn-outline-danger w-100" type="submit" style="border-radius: 1rem;">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already have an account? <a href="/login" class="text-decoration-none">Login Here!</a></small>
        </main>
    </div>
</div>

@endsection