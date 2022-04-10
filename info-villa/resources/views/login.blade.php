<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    html,
    body {
    height: 100%;
    }

    body {
    display: flex;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #10a11c;
    }

    .form-signin {
    width: 100%;
    max-width: 330px;
    padding: 30px;
    margin: auto;
    background-color: aliceblue;
    border-radius: 10px;
    }


    .form-signin .form-floating:focus-within {
    z-index: 2;
    }

    .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    }
  </style>

</head>
    <body class="text-center">
        <main class="form-signin">
        <form action="/" method="POST">
        <div class="text-center">
            <h1>INFOVILLA</h1>
            <h1 class="h3 mb-3 fw-normal">SIGN IN</h1>
        </div>
    
        <div class="form-floating mb-2">
            <input type="email" class="form-control" id="username" name="user" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="pass" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div>
            <p class="text-muted">
                Didn't have an account? <a href="#" class="text-reset">Sign Up</a>.
              </p>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
        </main>
    </body>
</html>