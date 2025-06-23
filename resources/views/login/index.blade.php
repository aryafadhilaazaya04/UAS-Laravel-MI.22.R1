@extends('layouts.main')
@section('content')

<div class="row justify-content-center align-items-center">
    <div class="col-lg-5">
        <main class="form-login w-100 mt-5">
            <h1 class="h3 mb-3 fw-normal text-center mb-4">Login</h1>
            <form>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" />
                    <label for="email">Email address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
                    <label for="password">Password</label>
                </div>

                <button class="btn btn-outline-danger w-100" type="submit" style="border-radius: 1rem;">Login</button>
            </form>
            <small class="d-block text-center mt-3">Don't have an account? <a href="/register" class="text-decoration-none">Register Now!</a></small>
        </main>
    </div>
</div>

@endsection