@extends('layout.signInUp')
@section('signInUp')
<form action="/" method="POST">
<div class="text-center">
<h1>INFOVILLA</h1> 
<h1 class="h3 mb-3 fw-normal">SIGN UP</h1>
</div>

<div class="form-floating mb-2">
    <input type="email" class="form-control" id="username" name="user" placeholder="name@example.com">
    <label for="floatingInput">Email</label>
</div>
<div class="form-floating mb-2">
    <input type="email" class="form-control" id="username" name="user" placeholder="name@example.com">
    <label for="floatingInput">Username</label>
</div>
<div class="form-floating">
    <input type="password" class="form-control" id="password" name="pass" placeholder="Password">
    <label for="floatingPassword">Password</label>
</div>
<div class="form-floating">
    <input type="password" class="form-control" id="confirmPassword" name="confirmPass" placeholder="Confirm Password">
    <label for="floatingPassword">Confirm Password</label>
</div>
<div>
<p class="text-muted">
    Already have an account? <a href="#" class="text-reset">Sign In</a>.
    </p>
</div>
<button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
</form>
</main>
@endsection