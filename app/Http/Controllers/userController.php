<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Jabatan;
use App\Bidang;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->data['users']= User::orderBy('name','asc')->paginate(10);
        $this->data['users']=User::join('jabatans', 'jabatans.id', '=', 'users.jabatan_id')->join('bidangs', 'bidangs.id', '=', 'users.bidang_id')->select('users.*', 'jabatans.name as jab', 'bidangs.name as bid')->orderBy('name','asc')->paginate(10);
        // $this->data['usersBid']=User::join('bidangs')->orderBy('name','asc')->paginate(10);
        // echo "<pre>{{$this->data['usersJab']}}</pre>";die;
        return view('admin.user',$this->data);  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_user)
    {
       $jabatan = Jabatan::all(); 
       $bidang = Bidang::all(); 
       $user = User::find($id_user);
       return view("admin.user-edit", ["user" => $user, 'jabatan' => $jabatan, 'bidang' => $bidang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->jabatan_id = $request->input("jabatan");
        $user->bidang_id = $request->input("bidang");

        // $user ->update($request->all());
        $user->save();
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
