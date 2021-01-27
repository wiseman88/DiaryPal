<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My-Application')</title>
    {{-- css --}}
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body class="flex bg-gray-100">
    @include('layouts.sidebar')
    <div class="w-full">
        @include('layouts.header')
        <main class="lg:ml-72 mt-12">
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
</body>
</html>