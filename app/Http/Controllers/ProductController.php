<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Productprop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('Admin.Product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Product.create')->with('categories',Category::all())->with('tags',Tag::all());
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'main_image'=>'sometimes|image|mimes:png,jpg,jpge,svg,gif'
        ]);
        $data=$request->except('_token','main_image','tags');
        if($request->hasFile('main_image'))
            $data['main_image']=Storage::disk('public')->put('main_images',$request->file('main_image'));
        $product=Product::query()->create($data);
        if($request->has('tags'))
        $product->tags()->sync($request->get('tags'));

        return redirect()->route('admin.Product')->with('success','Product added successfully');
    }


    public function show()
    {

    }


    public function edit($id)
    {
        return view('Admin.Product.edit')->with('product',product::find($id))->with('categories',Category::all())->with('tags',Tag::all());
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'main_image'=>'sometimes|image|mimes:png,jpg,jpge,svg,gif'
        ]);
        $data=$request->except('_token','main_image','tags','key_ar','key_en','value_en','value_ar');
        if($request->hasFile('main_image'))
            $data['main_image']=Storage::disk('public')->put('main_images',$request->file('main_image'));
        $product=Product::query()->find($id);
        $product->update($data);
        if($request->has('tags'))
        $product->tags()->sync($request->get('tags'));
        if($request->get('key_ar') and $request->get('key_en') and $request->get('value_en') and $request->get('value_ar'))
        $product->props()->create($request->only('key_ar','key_en','value_en','value_ar'));
        return redirect()->route('admin.Product')->with('success','product updated successfully');
    }


    public function destroy($id)
    {
        Product::query()->find($id)->delete();
        return redirect()->route('admin.Product')->with('success','product deleted successfully');
    }
}
