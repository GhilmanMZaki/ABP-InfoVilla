@extends('layout.signInUp')
@section('signInUp')
<form action="/signup/store" method="post">
    @csrf
    <div class="text-center">
    <h1>INFOVILLA</h1> 
    <h1 class="h3 mb-3 fw-normal">SIGN UP</h1>
    </div>
    <div class="form-floating mb-2">
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap" required>
        <label for="floatingInput">Name</label>
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-floating mb-2">
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required>
        <label for="floatingInput">Username</label>
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-floating mb-2">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" required>
        <label for="floatingInput">Email</label>
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        
    </div>
    <div class="form-floating">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div>
    <p class="text-muted">
        Already have an account? <a href="/login" class="text-reset">Sign In</a>.
        </p>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
</form>
@endsection