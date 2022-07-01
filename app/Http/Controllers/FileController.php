<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['filesUploaded'] = File::where('status_berkas','=',Auth::user()->jabatan_id-1);
        if (Auth::user()->jabatan_id <= 2) {
            $this->data['files'] = $this->data['filesUploaded']
                                ->select('files.*')
                                ->join('users','users.id','=','files.user_id')
                                ->where('users.bidang_id','=',Auth::user()->bidang_id)
                                ->paginate(10);
        }else{
            $this->data['files'] = $this->data['filesUploaded']->paginate(10);
        }
        // $this->data['user'] = Auth::user();
        // return $this->data;
                return view('user.acc-laporan',$this->data);
    }

    public function laporanUser(){
        $this->data['files'] = File::where('user_id', Auth::user()->id)->get();
        return view('user.laporan',$this->data);
    }

    public function retrieveLaporan(String $path){
        return Storage::download($path);
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

    public function accLaporan($id)
    {
        $this->data['file'] = File::find($id); 
        return view('user.acc-laporan-edit',$this->data);
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

    public function validasiLaporan(Request $request)
    {
        $this->data['laporan'] = File::find($request->file_id);
        // $this->data['example'] = 'uploads/_'.substr($this->data['laporan']->berkas, 9);
        // return $this->data;
        if ($request->has('file')) {
            $file = $request->file('file');
            $name = "_" . time();
            $fileName = $name . "." . $file->getClientOriginalExtension();
            $folder = '/uploads';
            $filePath = $file->storeAs($folder, $fileName, 'public');
            unlink(public_path( 'storage\uploads\\'.substr($this->data['laporan']->berkas, 8) ));
            // Storage::delete('uploads//'.substr($this->data['laporan']->berkas, 8));
            $params = [
                'berkas' => $filePath,
                'status_berkas'=> Auth::user()->jabatan_id,
            ];
            $this->data['laporan']->update($params);
        }
        return redirect('/user/acclaporan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */

    public function tolakLaporan(Request $request)
    {
        $laporan = File::find($request->file_id);
        $laporan->status_berkas--;
        $laporan->save();
        return redirect()->back();
    }

    public function destroy(File $file)
    {
        $file=File::find($id);
        $file->delete();
        return redirect()->back();
    }
}