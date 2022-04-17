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
  <div class="container">
    <h1>{{ $row->namaVilla }}</h1>
    <img src="{{url('/storage/images/'.$row->image)}}" alt="" sizes="" srcset="">
    <p><i class="bi bi-star-fill"></i> 0.0</p>
    <h4>Deskripsi</h4>
    <p style="white-space:pre">{{ $row->deskripsi }}</p>
    
    <div class="container border-bottom-3">

    </div>

    @auth
    <div class="container">
      <h5>Submit Review</h5>
      <form action="" method="post">
        <div class="mb-3">
          <p>Beri Rating</p>
          <div class="starRate">
          <label for="exampleFormControlTextarea1" class="form-label">Isi Review</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          <div class="mb-3">
            <label for="formFile" class="form-label">Upload Gambar</label>
            <input class="form-control" type="file" id="formFile">
          </div>
          <button type="submit" class="btn btn-success">Submit Review</button>
        </div>
      </form>
    </div>
  </div>     
    @endauth
  @endforeach
</body>
</html>