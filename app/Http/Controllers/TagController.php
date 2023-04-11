<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags=Tag::all();
        return view('Admin.Tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Tag.create');
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
            'title_en' => 'required',
            'title_ar' => 'required',

        ]);

        Tag::create([
            'title_en'=>$request->title_en,
            'title_ar'=>$request->title_ar,

        ]);
        return redirect()->route('admin.Tag')->with('success','tag added successfully');
    }


    public function show()
    {

    }


    public function edit($id)
    {
        return view('Admin.Tag.edit')->with('tag',Tag::find($id));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title_en' => 'required',
            'title_ar' => 'required',
        ]);
        $tag=Tag::find($id);

        $tag->title_en=$request->title_en;
        $tag->title_ar=$request->title_ar;

        $category->save();
        return redirect()->route('admin.Tag')->with('success','tag updated successfully');
    }


    public function destroy($id)
    {
        Tag::query()->find($id)->delete();
        return redirect()->route('admin.Tag')->with('success','tag deleted successfully');
    }
}
