<!DOCTYPE html>
<html lang="id">

<head>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Fasilitas Umum Desa</title>

    @include('layouts.guest.css')

    <!-- NAVBAR -->
    @include('layouts.guest.header')

    @yield('content')

    <!-- FOOTER -->
    @include('layouts.guest.footer')

    <!-- FIREBASE -->
    @include('layouts.guest.js')

    </body>

</html>
