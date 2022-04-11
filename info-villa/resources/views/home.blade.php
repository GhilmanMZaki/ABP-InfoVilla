<!doctype html>
<html lang="en">
<head>
<title>InfoVilla</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- Bootstrap CSS v5.0.2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<style>
#search {
  background-image: url("https://villabugis.com/wp-content/uploads/Villa-Alam-Seminyak-Bali-9400-Custom-Large-1030x687.jpg");
  background-position: center;
}
.card:hover{
  background-color: green;
}
.card:hover .card-body h4{
  color: aliceblue;
  transition: 1s
}
.card:hover .card-body p{
  color: aliceblue;
  transition: 1s
}
.card-fasilitas{
  right: 0;
  left: 0;
  background-color: aliceblue;
}
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow p-3">
        <div class="container">
          <a class="navbar-brand h2" href="#"><i class="bi bi-house-fill"></i> INFOVILLA</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link mx-2" href="#"><i class="bi bi-hand-index-thumb"></i> Terserah!</i></a>
                <a class="nav-link ms-auto" href="/login">Login</a>
          </div>
        </div>
      </nav>
      <div class="container-fluid p-xl-5 shadow p-3" id="search">
        <div class="container">
          <div class="row">
            <div class="col-2 offset-1 text-center py-3 bg-dark">
              <h4 class="text-light align-self-center">Cari Lokasi Villa</h4>
            </div>
            <div class="col-7 md-auto py-3 bg-dark">
              <form class="d-flex" action="/" method="">
                <input class="form-control me-2" name="searchLokasi" type="search" placeholder="Lokasi Villa" aria-label="Search">
                <button class="btn btn-success w-25" type="submit">Search <i class="bi bi-search"></i></button>
              </form>
            </div>
          </div>
        </div>    
      </div>

      <div class="container shadow-lg">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 text-center py-5">
              <h1 class="text-success">Rekomendasi Villa Untuk Kamu</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="card p-2" style="width: 22rem">
                <img src="{{url('/storage/img/villa-hira-pangalengan.png')}}" alt="villa">
                <div class="card-body">
                  <h4>Villa Hira Pangalengan</h4>
                  <p>Jl. Situ Cileunca, Pulosari </br>0821-2837-6776</p>
                </div>
                <div class="card-fasilitas">
                  <span>
                    <i class="bi bi-door-closed-fill"></i> 2
                    <p>Kamar Tidur</p>
                  </span>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="card p-2" style="width: 22rem">
                <img src="{{url('/storage/img/villa-hira-pangalengan.png')}}" alt="villa">
                <div class="card-body">
                  <h4>Villa Hira Pangalengan</h4>
                  <p>Jl. Situ Cileunca, Pulosari </br>0821-2837-6776</p>
                </div>
                <div class="card-fasilitas">
                  <span>
                    <i class="bi bi-door-closed-fill"></i> 2
                    <p>Kamar Tidur</p>
                  </span>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="card p-2" style="width: 22rem">
                <img src="{{url('/storage/img/villa-hira-pangalengan.png')}}" alt="villa">
                <div class="card-body">
                  <h4>Villa Hira Pangalengan</h4>
                  <p>Jl. Situ Cileunca, Pulosari </br>0821-2837-6776</p>
                </div>
                <div class="card-fasilitas">
                  <span>
                    <i class="bi bi-door-closed-fill"></i> 2
                    <p>Kamar Tidur</p>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



</body>
</html>