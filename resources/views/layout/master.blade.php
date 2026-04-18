<!doctype html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/css/colors.css', 'resources/css/table.css'])
</head>
<body class="bg-background">


    <main class=" w-full max-w-7xl m-auto relative">
        @include('layout.header')
        @include('layout.sidebar')
        @yield('konten')
    </main>

</body>
</html>
