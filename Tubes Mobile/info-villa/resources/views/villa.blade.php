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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/jquery.rateyo.min.css">
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css);

        .rating {
            border: none;
            float: left;
        }

        .rating>input {
            display: none;
        }

        .rating>label:before {
            content: '\f005';
            font-family: FontAwesome;
            margin: 5px;
            font-size: 1.5rem;
            display: inline-block;
            cursor: pointer;
        }

        .rating>.half:before {
            content: '\f089';
            position: absolute;
            cursor: pointer;
        }


        .rating>label {
            color: #ddd;
            float: right;
            cursor: pointer;
        }

        .rating>input:checked~label,
        .rating:not(:checked)>label:hover,
        .rating:not(:checked)>label:hover~label {
            color: #2ce679;
        }

        .rating>input:checked+label:hover,
        .rating>input:checked~label:hover,
        .rating>label:hover~input:checked~label,
        .rating>input:checked~label:hover~label {
            color: #2ddc76;
        }

    </style>
</head>

<body>
    @include('partial.navbar')
    @foreach ($villa as $row)
        <div class="container mt-lg-3 pb-lg-3 shadow-lg border border-dark">
            <div class="row mb-3 py-3">
                <div class="col-3 ">
                    <!-- Revisi dengan crop -->
                    <img src="{{ url('/storage/images/' . $row->image) }}" alt="" width="300" height="300"
                        style="object-fit: cover">
                </div>
                <div class="col-9 ms-auto">
                    <h1>{{ $row->namaVilla }}</h1>
                    <p style="font-size: 27px">Lokasi : {{ $row->lokasi }}</p>
                    <p style="font-size: 27px">Harga : {{ $row->harga }}/Malam</p>
                    <!-- Revisi mengeluarkan nilai rating dari database -->
                    <p style="font-size: 27px"><i c lass="bi bi-star-fill"></i>
                        {{ number_format($row->rating, 2, '.', '') }}</p>
                </div>
            </div>
            <hr class="bg-dark border-3 border-top border-dark">
            <h4>Deskripsi</h4>
            <p style="white-space:pre-wrap">{{ $row->deskripsi }}</p>
    @endforeach
    <div class="row bg-success mb-3">
        <div class="col-12">
            <h2 class="text-light">Pengalaman Mereka</h2>
        </div>
    </div>
    @if ($review->where('villa_id', $villa->first()->id)->count() == 0)
        <div class="row text-center">
            <div class="col-12">
                <p class="text-muted">Pengalaman mereka belum terkisah di villa ini :(</p>
            </div>
        </div>
    @endif
    @foreach ($review as $row)
        <div class="row">
            <hr class="bg-dark border-3 border-top border-dark">
            <div class="col-3 text-center">
                <i class="bi bi-person-square" style="font-size:3rem"></i>
                <p>{{ $row->user->username }}</br>
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $row->rating)
                            <span><i class="bi bi-star-fill" style="color: yellow"></i></span>
                        @else
                            <span><i class="bi bi-star-fill" style="color: rgb(161, 161, 161)"></i></span>
                        @endif
                    @endfor
                </p>

            </div>
            <div class="col-8 ms-lg-3 bg">
                <p>{{ $row->review }}</br> </p>
                <img src="{{ url('/storage/images/' . $row->image) }}" alt="" width="200" height="200"
                    style="object-fit: cover" class="rounded mb-2" @if ($row->image == null) hidden @endif>
            </div>
            <hr class="bg-dark border-3 border-top border-dark">
        </div>
    @endforeach
    <div class="row bg-success">
        <div class="col-12">
            <h2 class="text-light">Review</h2>
            @guest
                <a href="/login" class="btn btn-light mb-3">Bagikan pengalaman anda</a>
            @endguest
        </div>
    </div>
    @auth
        <form action="/villa/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <h3>Beri Rating : </h3>
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" class="full"
                            title="Awesome"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4"
                            class="full"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3"
                            class="full"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2"
                            class="full"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1"
                            class="full"></label>
                    </fieldset>
                </div>
            </div>
            @foreach ($villa as $row)
                <div class="row mb-3">
                    <div class="starRate">
                        <input type="hidden" value="{{ $row->id }}" name="villa_id">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                        <label for="exampleFormControlTextarea1" class="form-label">Isi Review</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="review" required></textarea>
            @endforeach
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Gambar</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div>
            <button type="submit" class="btn btn-success">Submit Review</button>
            </div>
            </div>
        </form>
        <script>
            let star = document.querySelectorAll('input');
            let showValue = document.querySelector('#rating-value');

            for (let i = 0; i < star.length; i++) {
                star[i].addEventListener('click', function() {
                    i = this.value;

                    showValue.innerHTML = i;
                });
            }
        </script>
    @endauth
    </div>
    @include('partial.footer')
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

</body>

</html>
