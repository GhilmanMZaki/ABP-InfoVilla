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
</head>
<body>
  @include('partial.navbar')
  @foreach ($villa as $row)
  <div class="container mt-lg-3 pb-lg-3 shadow-lg border border-dark">
    <div class="row mb-3 py-3">
      <div class="col-3 ">
        <img src="{{url('/storage/images/'.$row->image)}}" alt="" width="300" height="300">
      </div>
      <div class="col-9 ms-auto">
        <h1>{{ $row->namaVilla }}</h1>
        <p style="font-size: 27px">Lokasi : {{ $row->lokasi }}</p>
        <p style="font-size: 27px">Harga : {{ $row->harga }}/Malam</p>
        <p style="font-size: 27px"><i class="bi bi-star-fill"></i> 0.0</p>
      </div>
    </div>
    <hr class="bg-dark border-3 border-top border-dark">
    <h4>Deskripsi</h4>
    <p style="white-space:pre-wrap">{{ $row->deskripsi }}</p>
    
    <div class="row bg-success">
      <div class="col-12">
        <h2 class="text-light">Review</h2>
      </div>
    </div>

    <div class="row">
      <hr class="bg-dark border-2 border-top border-dark">
      <div class="col-3 text-center">
        <i class="bi bi-person-square" style="font-size:3rem"></i>
        <p>Username</br>
          <span><i class="bi bi-star-fill"></i></span>
          <span><i class="bi bi-star-fill"></i></span>
          <span><i class="bi bi-star-fill"></i></span>
          <span><i class="bi bi-star-fill"></i></span>
          <span><i class="bi bi-star-fill"></i></span>
        </p>
          
      </div>
      <div class="col-8 ms-lg-3 bg">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Ullam libero quam voluptate reiciendis sequi atque similique? 
          Sequi maiores sapiente at eius quo! Maxime provident nemo vero assumenda, hic corporis voluptate?</p>
      </div>
      <hr class="bg-dark border-3 border-top border-dark">
    </div>

    <div class="row">
      <hr class="bg-dark border-3 border-top border-dark">
      <div class="col-3 text-center">
        <i class="bi bi-person-square" style="font-size:3rem"></i>
        <p>Username</br>
          <span><i class="bi bi-star-fill"></i></span>
          <span><i class="bi bi-star-fill"></i></span>
          <span><i class="bi bi-star-fill"></i></span>
          <span><i class="bi bi-star-fill"></i></span>
          <span><i class="bi bi-star-fill"></i></span>
        </p>
          
      </div>
      <div class="col-8 ms-lg-3 bg">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Ullam libero quam voluptate reiciendis sequi atque similique? 
          Sequi maiores sapiente at eius quo! Maxime provident nemo vero assumenda, hic corporis voluptate?</p>
      </div>
      <hr class="bg-dark border-3 border-top border-dark">
    </div>

    <div class="row">
      <hr class="bg-dark border-3 border-top border-dark">
      <div class="col-3 text-center">
        <i class="bi bi-person-square" style="font-size:3rem"></i>
        <p>Username</br>
          <span><i class="bi bi-star-fill"></i></span>
          <span><i class="bi bi-star-fill"></i></span>
          <span><i class="bi bi-star-fill"></i></span>
          <span><i class="bi bi-star-fill"></i></span>
          <span><i class="bi bi-star-fill"></i></span>
        </p>
          
      </div>
      <div class="col-8 ms-lg-3 bg">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Ullam libero quam voluptate reiciendis sequi atque similique? 
          Sequi maiores sapiente at eius quo! Maxime provident nemo vero assumenda, hic corporis voluptate?</p>
      </div>
      <hr class="bg-dark border-3 border-top border-dark">
    </div>

    <div class="row bg-success">
      <div class="col-12">
        <h2 class="text-light">Review</h2>
        @guest
        <a href="/login" class="btn btn-light mb-3">Bagikan pengalaman anda</a>
        @endguest
      </div>
    </div>
    @auth
    <form action="" method="post">
      <div class="row">
        <div class="col-12">
          <p class="p-0">Beri Rating</p>
          <ul class="nav justify-content-start me-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-star" style="font-size:2rem"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-star" style="font-size:2rem"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-star" style="font-size:2rem"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-star" style="font-size:2rem"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#"><i class="bi bi-star" style="font-size:2rem"></i></a>
            </li>
          </ul>

        </div>
      </div>
      <div class="row mb-3">
        <div class="starRate">
          <label for="exampleFormControlTextarea1" class="form-label">Isi Review</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          <div class="mb-3">
            <label for="formFile" class="form-label">Upload Gambar</label>
            <input class="form-control" type="file" id="formFile">
          </div>
          <button type="submit" class="btn btn-success">Submit Review</button>
        </div>
      </div>
    </form>
    @endauth
  </div>
  @endforeach
  @include('partial.footer')     
</body>
</html>