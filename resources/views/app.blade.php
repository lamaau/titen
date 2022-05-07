<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8" />
    <meta
        name="robots"
        content="noindex"
    >
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <link
        rel="icon"
        type="image/svg+xml"
        href="/favicon.ico"
    >
    <link
        href="{{ asset('css/app.css') }}"
        rel="stylesheet"
    >

    {{-- <script
        src="https://polyfill.io/v3/polyfill.min.js?features=smoothscroll,NodeList.prototype.forEach,Promise,Object.values,Object.assign"
        defer
    ></script>
    <script
        src="https://polyfill.io/v3/polyfill.min.js?features=String.prototype.startsWith"
        defer
    ></script> --}}

    <script
        defer
        src="{{ mix('/js/app.js') }}"
    ></script>
</head>

<body class="font-sans leading-none text-gray-700 antialiased overflow-x-hidden m-0">
    @inertia
</body>

</html>
