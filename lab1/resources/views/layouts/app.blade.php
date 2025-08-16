<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     @vite('resources/css/app.css')
    <title>@yield('title', 'My App')</title>
</head>
<body>
    <header>
        @include('partials.nav')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        2025 My PLog
    </footer>
    
</body>
</html>