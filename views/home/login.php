<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <header class="lg:flex lg:items-center lg:justify-between bg-indigo-500">
        <div class="mx-auto max-w-container px-4 sm:px-6 lg:px-8">
            <div class="relative flex items-center py-3"></div>
            <div class="flex items-center space-x-[40rem]">
                <h2 class="text-2xl font-bold leading-7 text-gray-200 sm:truncate sm:text-3xl sm:tracking-tight"><a
                        href="/">soundBloud</a></h2>
                <ul class="hidden space-x-2 md:inline-flex">
                    <li><a href="/register" class="px-4 py-2 font-semibold text-gray-200 rounded">Register</a></li>
                    <li><a href="/login" class="px-4 py-2 font-semibold text-gray-200 rounded">Log In</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="flex flex-col items-center justify-center h-screen">
        <div class="w-full max-w-md">
            <form class="bg-gray-200 shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/login" method="post">
                <h2 class="mb-4 text-xl font-bold">Log in</h2>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" type="email" name="email" placeholder="Enter your email">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password" name="password" placeholder="Enter your password">
                </div>
                <div class="flex flex-col items-center justify-center">
                    <button
                        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Log In
                    </button>
                    <?php if (isset($error)): ?>
                        <div class="text-red-700 alert alert-danger mb-2" role="alert">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>
                </div>
            </form>
            <div class="flex flex-col items-center justify-center">
                <p class="mb-2">Don't have an account?</p>

                <a href="/register">
                    <button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Create one
                    </button>
                </a>
            </div>
        </div>
    </div>

</body>

</html>