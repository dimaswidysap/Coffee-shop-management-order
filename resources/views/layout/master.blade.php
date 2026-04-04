<!doctype html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/css/colors.css', 'resources/css/table.css'])
</head>
<body class="background-primary">

    @include('layout.header')
    @include('layout.sidebar')

    <main>
        @yield('konten')
    </main>

</body>
</html>
