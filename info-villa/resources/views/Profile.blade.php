<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Profile</title>
  </head>
  <body style="background-color: rgb(233, 231, 231)">
    @include('partial.navbar')
    <div class="container">
        <div class="card text-center">
            <div class="card-body">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" style="height: 5cm; width: 5cm; position: center; ">
                <h5>{{ auth()->user()->username }}</h5>
                <p class="card-text">Cirebon</p>
                <p></p>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">{{ auth()->user()->name }}</div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ auth()->user()->email }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                08112401715
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                Cirebon, Indonesia
              </div>
            </div>
            <hr>
          </div>
        </div>
    </div>
    @include('partial.footer')
  </body>
</html>

