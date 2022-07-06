<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <title>Profile</title>
</head>

<body style="background-color: rgb(233, 231, 231)">
    @include('partial.navbar')
    <div class="container">
        <div class="card text-center">
            <div class="card-body">
                @if (auth()->user()->image == null)
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                        style="height: 5cm; width: 5cm; position: center; border-radius:50% ">
                @else
                    <img src="{{ url('/storage/images/' . auth()->user()->image) }}"
                        style="height: 5cm; width: 5cm; position: center; border-radius:50%">
                @endif
                <h5>{{ auth()->user()->username }}</h5>
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
                        <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">{{ auth()->user()->username }}</div>
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
                        <h6 class="mb-0">Asal</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ auth()->user()->asal }}
                    </div>
                </div>
                <hr>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Edit Profile
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="/profile/edit/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Fullname</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="colFormLabel" name="name"
                                        value="{{ auth()->user()->name }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="colFormLabel" name="username"
                                        value="{{ auth()->user()->username }}" required>
                                </div>
                            </div>

                            <div class="row mb-xl-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="colFormLabel" name="email"
                                        value="{{ auth()->user()->email }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Asal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="colFormLabel" name="asal"
                                        value="{{ auth()->user()->asal }}" placeholder="" required>
                                </div>
                            </div>

                            <div class="row-sm-10">
                                <label for="formFile" class="form-label">Upload Foto Profil</label>
                                <input class="form-control" type="file" name="image" id="formFile" accept="image/*">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partial.footer')
</body>

</html>
