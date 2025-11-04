<!DOCTYPE html>
<html lang="id">

<head>
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
