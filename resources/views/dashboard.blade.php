<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto:wght@700&family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-700">
    <div class="flex h-screen">
        <!-- Bahagian Sidebar -->
        <aside class="w-64 bg-gray-200 p-6 flex flex-col justify-between">
            <div>
                <h2 class="text-xl font-bold text-gray-800 mb-6">📚 Student Grade Dashboard</h2>
                <nav class="space-y-4">
                    <!-- Pautan untuk Pengurusan Pelajar -->
                    <a href="{{ url('/students') }}" class="block py-2 px-4 rounded bg-blue-400 hover:bg-blue-500 text-white">👨‍🎓 Students</a>
                    <!-- Pautan untuk Pengurusan Kehadiran -->
                    <a href="{{ url('/attendances') }}" class="block py-2 px-4 rounded bg-teal-400 hover:bg-teal-500 text-white">📅 Attendances</a>
                    <!-- Pautan untuk Pengurusan Subjek -->
                    <a href="{{ url('/subjects') }}" class="block py-2 px-4 rounded bg-yellow-400 hover:bg-yellow-500 text-white">📚 Subjects</a>
                    <!-- Pautan untuk Pengurusan Peperiksaan -->
                    <a href="{{ url('/exams') }}" class="block py-2 px-4 rounded bg-indigo-400 hover:bg-indigo-500 text-white">📝 Exams</a>
                    <!-- Pautan untuk Pengurusan Markah -->
                    <a href="{{ url('/marks') }}" class="block py-2 px-4 rounded bg-green-400 hover:bg-green-500 text-white">📊 Marks</a>
                </nav>
            </div>
            
            <!-- Butang Logout -->
            <form action="{{ route('logout') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="w-full py-2 px-4 rounded bg-gray-600 hover:bg-gray-500 text-white">
                    🚪 Logout
                </button>
            </form>
        </aside>

        <!-- Main Content / Kandungan Utama -->
        <main class="flex-1 p-6">
            <h1 class="text-6xl font-bold mb-4 text-center text-blue-800 font-montserrat">
                STUDENT GRADE <br> MANAGEMENT SYSTEM
            </h1>

            <div class="flex justify-center items-center h-full mt-4">
                <div class="grid grid-cols-3 gap-6">
                    <div class="bg-blue-400 p-8 rounded-lg text-center text-white">
                        <h2 class="text-3xl font-bold">Total Students</h2>
                        <p class="text-5xl font-bold">{{ $totalStudents }}</p>
                    </div>
                    <div class="bg-teal-400 p-8 rounded-lg text-center text-white">
                        <h2 class="text-3xl font-bold">Total Exams</h2>
                        <p class="text-5xl font-bold">{{ $totalExams }}</p>
                    </div>
                    <div class="bg-yellow-400 p-8 rounded-lg text-center text-white">
                        <h2 class="text-3xl font-bold">Total Subjects</h2>
                        <p class="text-5xl font-bold">{{ $totalSubjects }}</p> <!-- Menukar kepada Total Subjects -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
