@extends('layout.signInUp')
@section('signInUp')
<form action="/login" method="POST">
    @csrf
<div class="text-center">
<h1>INFOVILLA</h1>    
<h1 class="h3 mb-3 fw-normal">SIGN IN</h1>
</div>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="form-floating mb-2">
<input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="name@example.com" 
autofocus required value=" {{ old('username') }}">
<label for="floatingInput">Username</label>
@error('username')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
</div>
<div class="form-floating">
<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
<label for="floatingPassword">Password</label>
</div>
<!-- Tambah checkbox show password -->
<div class="form-floating">
    <input type="checkbox" class="form-checkbox" id onclick="showPass()"> Show password 
</div>
<div>
<p class="text-muted">
    Didn't have an account? <a href="/signup" class="text-reset">Sign Up</a>.
    </p>
</div>
<button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
</form>

<!-- Javascript untuk checkbox show password -->
<script type="text/javascript">
	function showPass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
@endsection