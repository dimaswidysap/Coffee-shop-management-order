<!doctype html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/css/colors.css', 'resources/css/table.css','resources/js/app.js','resources/js/cart.js' ])

</head>

<body class="bg-background">


    <main class="w-full max-w-7xl m-auto relative">
        @yield('transaksi')
    </main>

</body>
</html>
