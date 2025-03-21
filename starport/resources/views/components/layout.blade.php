<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>StarPort - {{$title}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
            const theme = localStorage.getItem("theme") || (prefersDark ? "dark" : "light");

            document.cookie = "theme=" + theme + "; path=/"; // Store theme in cookie

            if (theme === "dark") {
                document.documentElement.classList.add("dark");
            }
        });
    </script>

</head>

<body>
    <div class="drawer">
        <input id="nav-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <x-navbar />
            {{ $slot }}
        </div>
        <div class="drawer-side">
            <label for="nav-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
                <li><a href="/skills">Skills</a></li>
            </ul>
        </div>
    </div>

</body>

</html>