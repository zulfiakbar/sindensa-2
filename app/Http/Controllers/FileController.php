<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.laporan');
    }

    public function laporanUser(){
        $this->data['files'] = File::where('user_id', Auth::user()->id)->get();
        return view('user.laporan',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.file');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('file')) {
            $file = $request->file('file');
            $name = "_" . time();
            $fileName = $name . "." . $file->getClientOriginalExtension();
            $folder = '/uploads';
            $filePath = $file->storeAs($folder, $fileName, 'public');

            $params = [
                'berkas' => $filePath,
                'no_berkas'=>$request->no_berkas,
                'nama_berkas'=>$request->nama_berkas,
                'status_berkas'=>1,
                'user_id'=>Auth::user()->id,
            ];
            File::create($params);
        }
        return redirect('/user/laporan');
    }
    
    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        if ($request->has('file')) {
            $file = $request->file('file');
            $name = "_" . time();
            $fileName = $name . "." . $file->getClientOriginalExtension();
            $folder = '/public/storage/uploads';
            $filePath = $file->storeAs($folder, $fileName, 'public');
            $params = [
                'berkas' => $filePath,
                'status_berkas'=> Auth::user()->bidang->id,
            ];
            $file->update($params);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}