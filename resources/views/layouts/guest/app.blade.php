<!DOCTYPE html>
<html lang="en">

<head>
    {{--START CSS --}}
    @include('layouts.guest.css')
    {{-- END CSS --}}
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        {{-- SIDEBAR --}}
       @include('layouts.guest.sidebar')
        {{-- END SIDEBAR --}}

        {{-- CONTENT --}}
        <div class="content">

           {{-- HEADER --}}
           @include('layouts.guest.header')
            {{-- END HEADER --}}

            {{-- content --}}
            @yield('content')
          {{-- end content --}}

            {{-- FOOTER --}}
           @include('layouts.guest.footer')
            {{-- END FOOTER --}}
        </div>
        {{-- END CONTENT --}}
    </div>

    {{-- START JS --}}
    @include('layouts.guest.js')
    {{-- END JS --}}

</body>

</html>
