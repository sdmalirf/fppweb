<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDone</title>
    <script src="https://kit.fontawesome.com/75f1861d61.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css') <!-- Pastikan file CSS dimuat -->
    <script>
        // Fungsi untuk menangani perubahan input
        function handleSearchInput() {
            const searchValue = document.getElementById('search').value;
            const currentUrl = new URL(window.location.href);

            if (searchValue) {
                currentUrl.searchParams.set('search', searchValue);
            } else {
                currentUrl.searchParams.delete('search');
            }

            window.location.href = currentUrl.toString();
        }
    </script>
</head>

<body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="w-64"></div>
    <div class="fixed h-full w-64 bg-white text-gray-700 flex flex-col">
        <!-- Logo Section -->
        <div class="p-4 text-center">
            <h1 class="text-2xl font-bold">ToDone</h1>
        </div>
        <div class="p-4 flex items-center">
            <img src="/profile.png" class="w-14 inline">
            <div class="inline ml-2 py-auto">
                <p class="font-bold">{{ Auth::user()->name }}</p>
                <p class="">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <div class="flex px-4 py-3 rounded-md border border-gray-600 overflow-hidden w-10/12 mx-auto">
            <input type="text" placeholder="Search" id="search"
                class="w-full outline-none bg-transparent text-gray-600 text-sm" value="{{ isset($search) ? $search : null }}" />
            <a href="#" onclick="handleSearchInput()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px"
                    class="fill-gray-600">
                    <path
                        d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
                    </path>
                </svg>
            </a>
        </div>
        <!-- Navigation Links -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="/myday" class="block px-4 py-4 rounded hover:bg-blue-100 hover:text-blue-500 text-sm flex justify-between"><span><i
                    class="fa-regular fa-sun mr-3 text-lg"></i>My Day</span><span class="flex items-center justify-center w-6 h-6 bg-blue-200 text-white rounded-full">{{\App\Models\MyDay::where('is_done', false)->where('user_id', Auth::id())->count()}}</span></a>
            <a href="/important" class="block px-4 py-4 rounded hover:bg-blue-100 hover:text-blue-500 text-sm flex justify-between"><span><i
                    class="fa-regular fa-star mr-3 text-lg"></i>Important</span><span class="flex items-center justify-center w-6 h-6 bg-blue-200 text-white rounded-full">{{\App\Models\Important::where('is_done', false)->where('user_id', Auth::id())->count()}}</span></a>
            <a href="/task" class="block px-4 py-4 rounded hover:bg-blue-100 hover:text-blue-500 text-sm flex justify-between"><span><i
                    class="fa-solid fa-house mr-3 text-lg"></i>Task</span><span class="flex items-center justify-center w-6 h-6 bg-blue-200 text-white rounded-full">{{\App\Models\Task::where('is_done', false)->where('user_id', Auth::id())->count()}}</span></a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        @yield('content') <!-- Tempat konten utama -->
    </div>
</body>

</html>
