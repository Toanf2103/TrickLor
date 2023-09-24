<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="root-url" data-index="{{ URL::to('/'); }}">
    <title>@yield('title') - Trick loR Admin</title>
    <link rel="icon" href="{{ url('public/site/img/logo-icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/admin/css/admin.css') }}">
    <link rel="stylesheet" href="{{ url('public/admin/css/header.css') }}">
    <link rel="stylesheet" href="{{ url('public/admin/css/sidebar.css') }}">
    @yield('css')
</head>

<body>

    <div class="warpper">
        @include('layouts/admin/layoutItems/header')

        @include('layouts/admin/layoutItems/sidebar')

        <div class="content">
            <h1 class="title">@yield('title-content')</h1>
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://localhost/trick_lor/public/site/js/prism.js"></script>
    <script>
        Prism.highlightAll();
    </script>

    <script src="http://localhost/trick_lor/public/site/js/preCode.js"></script>
    @yield('js')
</body>


</html>