<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CINV-CORSA</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">
</head>
<body>
    <section>
        @include('home.layout.nav_bar')
        <div class="w-full h-auto mt-0 mb-0">
            @include('home.sections.hero')
            @include('home.sections.stats')
            @include('home.sections.services')
            @include('home.sections.about')
            @include('home.sections.industrial_process')
            @include('home.sections.cta')
        </div>
        @include('home.layout.footer')
    </section>
</body>

<script src="{{ asset('js/home/script.js') }}"></script>
</html>
