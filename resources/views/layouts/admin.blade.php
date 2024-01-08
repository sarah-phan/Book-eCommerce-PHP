<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NNN.vn</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/admin-sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-search.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-options.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-edit-form.css') }}" rel="stylesheet">

</head>

<body class="font-sans antialiased">
    <div class="row">
        <div class="col-2">
            @include('admin.admin-sidebar')
        </div>
        <div class="col-10">
            @include('admin.admin-header')
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>