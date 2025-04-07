<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <!-- Link to TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Poppins, Roboto, Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto:wght@700&family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <!-- Link to Bootstrap CSS (Optional for some components) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-700">
    <div class="flex h-screen">
        <!-- Sidebar hanya muncul jika bukan di halaman login atau register -->
        @if(!Request::is('login') && !Request::is('register')) 
        <aside class="w-64 bg-gray-800 p-6 flex flex-col justify-between">
            <div>
                <h2 class="text-xl font-bold text-white mb-6">📚 Student Grade Dashboard</h2>
                <nav class="space-y-4">
                    <!-- Dashboard link -->
                    <a href="{{ url('/dashboard') }}" class="block py-2 px-4 rounded text-white hover:bg-blue-600">Dashboard</a>
                    <!-- Students link -->
                    <a href="{{ url('/students') }}" class="block py-2 px-4 rounded text-white hover:bg-blue-600">Students</a>
                    <!-- Attendances link -->
                    <a href="{{ url('/attendances') }}" class="block py-2 px-4 rounded text-white hover:bg-blue-600">Attendances</a>
                    <!-- Subjects link -->
                    <a href="{{ url('/subjects') }}" class="block py-2 px-4 rounded text-white hover:bg-blue-600">Subjects</a>
                    <!-- Exams link -->
                    <a href="{{ url('/exams') }}" class="block py-2 px-4 rounded text-white hover:bg-blue-600">Exams</a>
                    <!-- Marks link -->
                    <a href="{{ url('/marks') }}" class="block py-2 px-4 rounded text-white hover:bg-blue-600">Marks</a>
                </nav>
            </div>
            <!-- Logout form -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full py-2 px-4 rounded bg-gray-700 hover:bg-gray-600 text-white">
                    🚪 Logout
                </button>
            </form>
        </aside>
        @endif

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Link to Bootstrap JS (Optional for some interactions) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
