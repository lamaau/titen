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

    @routes
    
    @vite('resources/js/app.js')
</head>

<body class="font-sans leading-none text-gray-700 antialiased overflow-x-hidden m-0">
    @inertia
</body>

</html>
