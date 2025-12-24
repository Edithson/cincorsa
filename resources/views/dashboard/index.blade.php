<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CINV-CORSA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/dashboard.css', 'resources/js/app.js'])
</head>
<body>
    <section>
        @include('dashboard.layout.nav_bar')
        <div class="w-full h-auto mt-0 mb-0">
            @yield('content')
        </div>
        @include('dashboard.layout.footer')
    </section>
</body>

<script src="{{ asset('js/dashboard/script.js') }}"></script>
</html>
