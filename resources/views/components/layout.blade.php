<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('src/images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('src/libraries/star-rating/css/star-rating-svg.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <link rel="stylesheet" href="{{ asset('src/scss/index.css') }}">
    <link rel="stylesheet" href="{{ asset('src/libraries/owl/owl.carousel.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <x-spinner-large />
    <x-toast />
    @yield('nav')
    <main id="content">
        {{ $slot }}
    </main>
    @yield('footer')

    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="{{ asset('src/libraries/star-rating/jquery.star-rating-svg.js') }}"></script>
    <script src="{{ asset('src/js/addReview.js') }}"></script>
    <script src="{{ asset('src/js/index.js') }}" type="module"></script>
</body>

</html>
