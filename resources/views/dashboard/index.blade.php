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

    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="icon" href="{{ $siteLogo ? asset('storage/' . $siteLogo) : asset('media/img/logo.png') }}" type="image/png">

    @vite(['resources/css/dashboard.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        @include('dashboard.layout.sidebar')
        @include('dashboard.layout.header')
        <main class="flex-1 flex flex-col min-w-0 bg-gray-50 overflow-y-auto mt-15">
            @yield('content')
        </main>
        @include('dashboard.layout.footer')
    </div>
</body>

<script src="{{ asset('js/dashboard/script.js') }}"></script>
</html>
