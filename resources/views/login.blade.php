<!doctype html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    @include('head')
</head>

<body>
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 border-2 sm:rounded-lg sm:px-10">
                <form class="space-y-6" action="#" method="POST">
                    <div class="sm:mx-auto sm:w-full sm:max-w-md">
                        <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">Login</h2>
                    </div>
                    @csrf
                    <div>
                        <label for="NIP" class="block text-sm font-medium text-gray-700"> NIP </label>
                        <div class="mt-1">
                            <input id="text" name="NIP" type="NIP" autocomplete="NIP" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex items-end justify-end">
                        <div class="text-sm">
                            <p>Tidak punya akun? <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500"> Register </a></p>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>