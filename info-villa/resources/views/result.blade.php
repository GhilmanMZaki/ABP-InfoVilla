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
<body>
    @include('partial.navbar')
    @include('partial.search')
    
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="row p-2 bg-white border rounded">
                    @foreach ($villa as $row)
                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{url('/storage/images/'.$row->image)}}"></div>
                    <div class="col-md-6 mt-1">
                        <h5>{{ $row->namaVilla }}</h5>
                        <div class="d-flex flex-row">
                            <div class="ratings mr-2"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div><span>0.0</span>
                        </div>
                        <p class="text-justify text-truncate para mb-0">{{ substr($row->deskripsi,0,200) }}<br><br></p>
                    </div>
                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                        <div class="d-flex flex-row align-items-center">
                            <h4 class="mr-1">{{ $row->harga }}</h4>
                        </div>
                        <div class="d-flex flex-column mt-4">
                            <form action="/{{ $row->id }}">
                                @csrf
                                <input class="form-control me-1" type="hidden"
                                name="id"aria-label="id" value="{{ $row->id }}" >
                                <button class="btn btn-success btn-sm" type="submit">Details</button>
                                <button class="btn btn-outline-success btn-sm mt-2" type="button">Favoritku</button>
                            </form>
                        </div>
                    </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>



</body>
</html>