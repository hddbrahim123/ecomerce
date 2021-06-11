<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/admin/admin.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin/navbar.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin/sidebar.css')}}" />
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}" />
    @yield('AdminStyles')
    @trixassets
    <title>Document</title>
</head>
<body>
    <div class="main">
            @include('shared.sidebar')
            @include('shared.navbar')
        <div class="content container bg-light">
            @yield('AdminContent')
        </div>
    </div>

    @include('sweetalert::alert')
    @yield('AdminScripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>