<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.createAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'code'=>'required|unique:admins,code',
            'password'=>'required',
        ]);
        $data=$request->only('name','code');
        $data['password']=Hash::make($request->get('password'));
        Admin::query()->create($data);
        return redirect()->route('admin.allAdmin')->with('success','admin added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $admins=Admin::all();
        return view('Admin.allAdmin',compact('admins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.editAdmin')->with('admin',Admin::find($id));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'code'=>'required|unique:admins,code,'.$id,
        ],[
            'name.required'=>'name is required',
            'code.unique'=>'code should be unique'
        ]);
        $data=$request->only('name','code');
        if($request->has('password') and $request->get('password'))
             $data['password']=Hash::make($request->get('password'));
        Admin::query()->find($id)->update($data);
        return redirect()->route('admin.allAdmin')->with('success','admin updated successfully');
    }


    public function destroy($id)
    {
        Admin::query()->find($id)->delete();
        return redirect()->route('admin.allAdmin')->with('success','admin deleted successfully');
    }
}
