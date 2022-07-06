<!doctype html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-image:
            linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url('https://static.wixstatic.com/media/3dcfd0_4cdad2e975e644548df7def018e21f9d~mv2_d_3500_2333_s_2.png/v1/fit/w_2500,h_1330,al_c/3dcfd0_4cdad2e975e644548df7def018e21f9d~mv2_d_3500_2333_s_2.png');
    }

    .form-signin {
        width: 100%;
        max-width: 550px;
        padding: 50px;
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
        @yield('signInUp')
    </main>
</body>

</html>
