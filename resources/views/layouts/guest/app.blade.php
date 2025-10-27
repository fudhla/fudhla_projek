<!DOCTYPE html>
<html lang="en">



<head>
    {{--START CSS --}}
    {{-- wa --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

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

    <!-- Floating WhatsApp Button -->
<a href="https://wa.me/6281234567890?text=Halo%20DesaKu!"
   target="_blank"
   class="floating-whatsapp"
   title="Chat via WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

</body>

</html>
