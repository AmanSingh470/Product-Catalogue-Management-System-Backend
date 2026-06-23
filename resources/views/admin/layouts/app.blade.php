<!DOCTYPE html>
<html
    lang="en"
    class="h-full antialiased"
>

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Product Catalogue Management System')
    </title>

    <meta
        name="description"
        content="A product catalogue management system built with Laravel and Tailwind CSS."
    >
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="min-h-full flex flex-col bg-gray-100">
    <div class="flex">
        @include('admin.layouts.partials.sidebar')
        <div class="flex-1 min-w-0 p-5">
            @include('admin.layouts.partials.header')
            @yield('content')
        </div>
    </div>
</body>

@stack('scripts')
</html>