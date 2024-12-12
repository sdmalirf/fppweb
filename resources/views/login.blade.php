<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full grid grid-cols-1">
        @if (session('success'))
            <div
                class="bg-white mx-auto mb-3 border-l-8 border-green-500 py-4 md:py-6 px-12 rounded-lg shadow-md w-11/12 md:w-8/12 grid grid-cols-1 border-left-2">
                <h2 class="text-3xl">You're logged in!</h2>
                <p class="mt-1 font-light text-sm">You'll be directed on a second.</p>
            </div>
            <script>
                window.addEventListener('load', function() {
                    setTimeout(function() {
                        window.location.href = '/myday';
                    }, 1000);
                });
            </script>
        @endif

        @if (session('failed'))
            <div
                class="bg-white mx-auto mb-3 border-l-8 border-red-500 py-4 md:py-6 px-12 rounded-lg shadow-md w-11/12 md:w-8/12 grid grid-cols-1 border-left-2">
                <h2 class="text-3xl">Can't log you in.</h2>
                <p class="mt-1 font-light text-sm">Your email or password is invorrect.</p>
            </div>
        @endif
        <div
            class="bg-white mx-auto py-12 md:py-24 px-12 rounded-lg shadow-md w-11/12 md:w-8/12 grid grid-cols-1 md:grid-cols-2">
            <div>
                <h2 class="text-3xl">Log in</h2>
                <p class="mt-1 mb-4">to continue</p>
            </div>
            <div>
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-4">
                        <input type="email" id="email" name="email" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring focus:ring-indigo-200"
                            placeholder="Enter your email">
                    </div>
                    <div class="mb-4">
                        <input type="password" id="password" name="password" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring focus:ring-indigo-200"
                            placeholder="Enter your password">
                    </div>
                    <button type="submit"
                        class="w-full bg-cyan-500 text-white px-4 py-2 rounded-full hover:bg-cyan-400 transition duration-300">
                        Log in
                    </button>
                </form>
                <p class="text-gray-600 text-sm mt-3 text-center">Don't have account yet? <a href="/register"
                        class="text-cyan-400">Sign up</a> first!</p>
            </div>
        </div>
    </div>

</body>

</html>
