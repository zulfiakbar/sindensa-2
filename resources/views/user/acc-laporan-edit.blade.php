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
                            <h1 class="text-2xl font-semibold text-gray-900">Acc Laporan</h1>
                            <!-- User info  -->
                            @include('admin.header')
                        </div>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div class="py-5">
                            <form id="form-data" method="post" enctype="multipart/form-data" action="/user/accLaporan/validasi">
                                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    @csrf
                                    <input type="hidden" value="{{$file->id}}" name="file_id">
                                    <div class="sm:col-span-4">
                                        <label for="nama_surat" class="block text-sm font-medium text-gray-700"> Nama Surat
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">                                            
                                            <input type="text" readonly name="nama_berkas" value="{{$file->nama_berkas}}" id="nama_surat" autocomplete="nama_surat" class="flex-1 focus:ring-blue-500 focus:border-blue-500 block w-full min-w-0 rounded sm:text-sm border-gray-300">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="no" class="block text-sm font-medium text-gray-700"> No Surat</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" readonly name="no_surat" id="no" value="{{$file->no_berkas}}" autocomplete="no" class="flex-1 focus:ring-blue-500 focus:border-blue-500 block w-full min-w-0 rounded sm:text-sm border-gray-300">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        
                                        <a href="{{asset('storage/'.$file->berkas) }}" value="{{$file->berkas}}">
                                            <label for="file"  class="block text-sm font-medium text-gray-700"> File
                                            </label>
                                        <span class="px-4 py-2 bg-gray-700 rounded-md text-white">
                                            Download
                                        </span>
                                        </a>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="file" class="block text-sm font-medium text-gray-700"> Pilih File</label>
                                        <input type="file" onchange="" class="form-control relative cursor-pointer" name="file" id="file" multiple>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <div class="justify-items-center">
                                            <div class="flex justify-end">
                                                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save</button>
                                            </div>
                                        </div>
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