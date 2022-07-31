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
                            <h1 class="text-2xl font-semibold text-gray-900">Laporan</h1>
                            <!-- User info  -->
                            @include('admin.header')
                        </div>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <div class="flex justify-end pt-4">
                            <div class="relative">
                                <div class="flex justify-start content-center">
                                    <form action="/user/accLaporan/search" method="GET">
                                        <input type="text" name="search" class="rounded border border-teal-600 bg-white w-34 px-3 py-3" placeholder="Search...">
                                    <button class="rounded text-white bg-teal-500 mx-3 px-3 py-3">
                                        <svg class="h-6 w-auto text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    </form>
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
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider border border-slate-600">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $laporan) <tr class="bg-white border-collapse border border-slate-500">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border border-slate-600">{{ $laporan->no_berkas }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border border-slate-600">{{ $laporan->nama_berkas }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3 w-10">
                                            <div>
                                                <a href="/user/acclaporan/acc/{{$laporan->id}}" class="px-5 py-2 bg-blue-500 rounded-md text-white">Accept</a>
                                                <form action="/user/accLaporan/tolak" method="POST" class="pt-3 flex">
                                                    @csrf
                                                    <input type="hidden" value="{{$laporan->id}}" name="file_id">
                                                <button type="submit" class="px-5 py-2 bg-red-500 rounded-md text-white flex-auto" data-id="">Tolak</button>
                                                </form>
                                            </div>                                            
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