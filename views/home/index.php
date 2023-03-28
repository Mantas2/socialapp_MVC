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
                    <?php if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])):
                        ?>
                        <li><a href="/register"
                                class="px-4 py-2 font-semibold text-gray-200 hover:bg-gray-500 rounded">Register</a></li>
                        <li><a href="/login" class="px-4 py-2 font-semibold text-gray-200 hover:bg-gray-500 rounded">Log
                                In</a></li>
                    <?php else: ?>
                        <li class="px-4 py-2 font-semibold text-gray-200 rounded">Hello,
                            <?php if (empty($_SESSION['username'])):
                                ?>
                                Guest
                            <?php else: ?>
                                <?= $_SESSION['username'] ?>
                            </li>
                        <?php endif; ?>
                        <li>
                            <form action="/logout" method="post">
                                <button
                                    class="bg-red-500 hover:bg-red-700 px-4 py-2 font-semibold text-gray-200 rounded mb-1">Log
                                    Out</button>
                            </form>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </header>

    <!--- POSTS --->

    <?php if (isset($_SESSION['user_id'])): ?>
    <div class="bg-white rounded-lg shadow-md p-5 w-1/2 mx-auto mt-4">
        <form action="/posts" method="post">
            <textarea name="content" class="bg-transparent w-full text-lg placeholder-gray-600 py-2 border"
                placeholder="What's on your mind?" rows="2"></textarea>
            <div class="flex justify-between items-center mt-2">
                <button class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg">
                    Post
                </button>
            </div>
        </form>
        <div class="bg-white shadow-md rounded-md p-4 mt-4">
            <h1 class="text-lg font-semibold mb-2">
            </h1>
            <p class="text-gray-600">
                <?php foreach ($userposts as $userpost): ?>
            <div class="bg-white shadow-md rounded-md p-4 mt-4">
                <h1 class="text-lg font-semibold mb-2">
                    <?php if ($userpost['username'] == NULL): ?>
                    Website Guest
                    <?php else: ?>
                    <?= $userpost['username'] ?>
                    <?php endif; ?>
                </h1>
                <p class="text-gray-600">
                    <?= $userpost['content'] ?>
                </p>
            </div>
            <form action="/like" method="post">
                <input type="hidden" name="post_id" value="<?= $userpost['post_id'] ?>">
                <button class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium m-1 px-1 rounded-lg"
                    type="submit">Like <?= $userpost['likes'] ?></button>
            </form>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

</body>

</html>