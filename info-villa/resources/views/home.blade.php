<!doctype html>
<html lang="en">
<head>
<title>InfoVilla</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- Bootstrap CSS v5.0.2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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
  background :linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(9,126,8,1) 100%);
}
.card:hover .card-body h4{
  color: aliceblue;
  transition: 0.5s
}
.card:hover .card-body p{
  color: aliceblue;
  transition: 0.5s
}

.pb-2{
  padding-top: 5px;
  font-size: 18px;
}
.pb-2 .p{
  font-size: 14px;
}
.lokasi {
  background-color: white
}
.lokasi:hover {
  background-color: black;
  transition: 0.5s;
}

.lokasi .text-dark h3:hover {
  color: white
}
</style>
</head>
<body>
  @include('partial.navbar')
    
  @include('partial.search')

    <div class="container pb-xl-4 shadow-lg">
      <!--Card Rekomendasi -->  
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 text-center py-5">
            <h1 class="text-success">Rekomendasi Villa Untuk Kamu</h1>
          </div>
        </div>
        <div class="row">
          @include('partial.cardRekomen')    
        </div>
      </div>

      <!-- Temukan Lokasi -->
      <div class="container py-lg-4 bg-success">
        <div class="row justify-content-center">
          <div class="col-12 my-xl-3 text-center">
            <h1 class="text-light">Temukan Lokasi Villa Pilihanmu</h1>
          </div>
          <div class="col-2 mx-5 my-lg-3 ">
            <div class="lokasi pb-1 d-flex justify-content-center align-content-center">
              <a href="#" class="text-dark text-center text-decoration-none"><h3>Bandung</h3></a>
            </div>
          </div>
          <div class="col-2 mx-5 my-lg-3 ">
            <div class="lokasi pb-1 d-flex justify-content-center align-content-center">
              <a href="#" class="text-dark text-center text-decoration-none"><h3>Bandung</h3></a>
            </div>
          </div>
          <div class="col-2 mx-5 my-lg-3 ">
            <div class="lokasi pb-1 d-flex justify-content-center align-content-center">
              <a href="#" class="text-dark text-center text-decoration-none"><h3>Bandung</h3></a>
            </div>
          </div>
          <div class="col-2 mx-5 my-lg-3 ">
            <div class="lokasi pb-1 d-flex justify-content-center align-content-center">
              <a href="#" class="text-dark text-center text-decoration-none"><h3>Bandung</h3></a>
            </div>
          </div>
          <div class="col-2 mx-5 my-lg-3 ">
            <div class="lokasi pb-1 d-flex justify-content-center align-content-center">
              <a href="#" class="text-dark text-center text-decoration-none"><h3>Bandung</h3></a>
            </div>
          </div> <div class="col-2 mx-5 my-lg-3 ">
            <div class="lokasi pb-1 d-flex justify-content-center align-content-center">
              <a href="#" class="text-dark text-center text-decoration-none"><h3>Bandung</h3></a>
            </div>
          </div>
          <div class="col-2 mx-5 my-lg-3 ">
            <div class="lokasi pb-1 d-flex justify-content-center align-content-center">
              <a href="#" class="text-dark text-center text-decoration-none"><h3>Bandung</h3></a>
            </div>
          </div>
          <div class="col-2 mx-5 my-lg-3 ">
            <div class="lokasi pb-1 d-flex justify-content-center align-content-center">
              <a href="#" class="text-dark text-center text-decoration-none"><h3>Bandung</h3></a>
            </div>
          </div>
        </div>

      </div>
    </div>



</body>
</html>