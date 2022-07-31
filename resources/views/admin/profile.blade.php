<!doctype html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    @include('head')
</head>

<body style="background-image: url({{ asset('storage/asset/logo.png') }})" class="bg-no-repeat bg-center bg-[length:600px_600px] h-screen backdrop-blur-sm">
    <div>
        <!-- Static sidebar for desktop -->
        @include('admin.sidebar')
        <div class="md:pl-64 flex flex-col flex-1">

            <main class="flex-1">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <div class="flex justify-between items-end">
                            <h1 class="text-2xl font-semibold text-gray-900">Profile</h1>
                            <!-- User info  -->
                            @include('admin.header')
                        </div>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div class="py-5">
                            <form action="/admin/profile" id="form-data" method="post" enctype="multipart/form-data">
                                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    @csrf
                                    <input id="hidden" name="id" type="hidden" value="{{$user->id}}">
                                    <div class="sm:col-span-4">
                                        <label for="NIP" class="block text-sm font-medium text-gray-700"> NIP </label>
                                        <div class="mt-1">
                                            <input id="text" readonly name="nip" type="nip" value="{{$user->nip}}" autocomplete="NIP" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="nama" class="block text-sm font-medium text-gray-700"> Nama </label>
                                        <div class="mt-1">
                                            <input id="text" name="name" type="nama" value="{{$user->name}}" autocomplete="nama" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                                        <div class="mt-1">
                                            <input id="text" name="email" type="email" value="{{$user->email}}" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                                        <div class="mt-1">
                                            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="confirm_password" class="block text-sm font-medium text-gray-700"> Confirmation Password </label>
                                        <div class="mt-1">
                                            <input id="confirm_password" name="confirm_password" type="password" autocomplete="current-confirm_password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /End replace -->
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>