<!doctype html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    @include('head')
</head>

<body style="background-image: url({{ asset('storage/asset/logo.png') }})" class="bg-no-repeat bg-center bg-[length:600px_600px] h-screen backdrop-blur-sm">
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 border-2 sm:rounded-lg sm:px-10">
                <form class="space-y-6" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="sm:mx-auto sm:w-full sm:max-w-md">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h2 class="mt-6 text-3xl font-bold text-gray-900">Register</h2>
                            </div>
                            <div class="grid justify-items-end">
                                <img src="{{ asset('storage/asset/logo.png') }}" alt="" width="" class="bg-auto w-16 referrerpolicy=" no-referrer">
                            </div>
                        </div>
                    </div>
                    @csrf
                    <div>
                        <label for="nip" class="block text-sm font-medium text-gray-700"> NIP </label>
                        <div class="mt-1">
                            <input id="text" name="nip" type="text" autocomplete="nip" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                        <div class="mt-1">
                            <input id="text" name="name" type="text" autocomplete="name" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                        <div class="mt-1">
                            <input id="text" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700"> Confirmation Password </label>
                        <div class="mt-1">
                            <input id="password-confirm" name="password_confirmation" type="password" autocomplete="current-password-confirm" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex items-end justify-end">
                        <div class="text-sm">
                            <p>Sudah punya akun? <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500"> Login </a></p>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>