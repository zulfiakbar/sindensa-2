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
                            <h1 class="text-2xl font-semibold text-gray-900">User</h1>
                            <!-- User info  -->
                            @include('admin.header')
                        </div>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div class="py-5">
                            <!-- table -->
                            <table id="table_id" class="divide-y divide-gray-200 w-full table-auto border-collapse border border-slate-500">
                                <thead class="bg-gray-300">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider border border-slate-600">
                                            NIP</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider border border-slate-600">
                                            Nama</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider border border-slate-600">
                                            Jabatan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider border border-slate-600">
                                            Bidang</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider border border-slate-600">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user) 
                                    <tr class="bg-white border-collapse border border-slate-500">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user->nip}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user->name}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user->jab}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$user->bid}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3 w-10">
                                            <a href="/admin/user/{{$user->id}}/edit" class="px-14 py-2 bg-blue-500 rounded-md text-white">Edit</a>
                                            <form action="/admin/user/{{$user->id}}/delete" method="POST" class="pt-3 flex">
                                                @csrf
                                                @method('delete')
                                            <button type="submit" class="px-5 py-2 bg-red-500 rounded-md text-white flex-auto" data-id="">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- end of table -->
                        </div>
                        <!-- /End replace -->
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>