<!doctype html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    @include('head')
</head>

<body>
    <div>
        <!-- Static sidebar for desktop -->
        @include('user.sidebar')
        <div class="md:pl-64 flex flex-col flex-1">
            <main class="flex-1">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <div class="flex justify-between items-end">
                            <h1 class="text-2xl font-semibold text-gray-900">Laporan</h1>
                            <!-- User info  -->
                            @include('user.header')
                        </div>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <div class="flex justify-end pt-4">
                            <div class="relative">
                                <input type="text" class="rounded border-none bg-gray-100 w-full px-3 py-3" placeholder="Search...">
                                <div class="absolute top-0 -right-1 flex items-center h-full pr-1">
                                    <a href="">
                                        <div class="bg-blue-500 rounded-r-lg w-14 flex justify-center">
                                            <svg class="h-12 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>  
                        </div>
                        <!-- Replace with your content -->
                        <div class="py-5">
                            <!-- table -->
                            <table id="table_id" class="divide-y divide-gray-200 w-full table-auto border-collapse border border-slate-500">
                                <thead class="bg-gray-300">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider border border-slate-600">No Surat</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider border border-slate-600">Judul Surat</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider border border-slate-600">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider border border-slate-600">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i < 3; $i++) <tr class="bg-white border-collapse border border-slate-500">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border border-slate-600">{{ $i }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border border-slate-600">Surat {{ $i }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border border-slate-600">
                                            <div class="flex justify-center">
                                                <span class="px-5 py-2 bg-green-500 rounded-md text-white">
                                                    Diterima
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3 w-10">
                                            <a href="" class="px-5 py-2 bg-blue-500 rounded-md text-white">Edit</a>
                                            <button class="px-5 py-2 bg-red-500 rounded-md text-white" data-id="">Delete</button>
                                        </td>
                                        </tr>
                                        <tr class="bg-white border-collapse border border-slate-500">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border border-slate-600">{{ $i }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border border-slate-600">Surat {{ $i }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border border-slate-600">
                                                <div class="flex justify-center">
                                                    <span class="px-3 py-2 bg-yellow-500 rounded-md text-white">
                                                        Menunggu
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3 w-10">
                                                <a href="" class="px-5 py-2 bg-blue-500 rounded-md text-white">Edit</a>
                                                <button class="px-5 py-2 bg-red-500 rounded-md text-white" data-id="">Delete</button>
                                            </td>
                                        </tr>
                                        @endfor
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