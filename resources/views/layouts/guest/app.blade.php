<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Binsa Desa')</title>

    {{-- CSS --}}
    @include('layouts.guest.css')
</head>

<body>

    {{-- HEADER --}}
    @include('layouts.guest.header')

    <div class="container-fluid">
        <div class="row">
            {{-- SIDEBAR (optional, bisa disembunyikan kalau mau full page) --}}
            <div class="col-md-3 col-lg-2 bg-light d-none d-md-block p-0">
                @include('layouts.guest.sidebar')
            </div>

            {{-- MAIN CONTENT --}}
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- FOOTER --}}
    @include('layouts.guest.footer')

    {{-- JS --}}
    @include('layouts.guest.js')

</body>

</html>
