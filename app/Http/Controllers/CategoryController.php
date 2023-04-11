<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('Admin.Category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Category.create');
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
            'logo'=>'sometimes|image|mimes:png,jpg,jpge,svg,gif'
        ]);
        $path=$request->logo->store('public/logos');
        Category::create([
            'title_en'=>$request->title_en,
            'title_ar'=>$request->title_ar,
            'logo'=>$path
        ]);
        return redirect()->route('admin.category')->with('success','Category added successfully');
    }


    public function show()
    {

    }


    public function edit($id)
    {
        return view('Admin.Category.edit')->with('category',Category::find($id));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title_en' => 'required',
            'title_ar' => 'required',
            'logo'=>'mimes:png,jpg,jpeg,svg,gif'
        ]);
        $category=Category::find($id);
        if($request->has('logo')){
            $path=$request->logo->store('public/pics');
        }else{
            $path=$category->logo;
        }
        $category->title_en=$request->title_en;
        $category->title_ar=$request->title_ar;
        $category->logo=$path;
        $category->save();
        return redirect()->route('admin.category')->with('success','Category updated successfully');
    }


    public function destroy($id)
    {
        Category::query()->find($id)->delete();
        return redirect()->route('admin.category')->with('success','admin deleted successfully');
    }
}
