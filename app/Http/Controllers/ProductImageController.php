<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductImageController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'path' => 'required',
        ]);
        $path=$request->path->store('public/sub_images');
        ProductImage::create([
            'product_id'=>$request->product_id,
            'path'=>$path
        ]);
        return back();
    }

    public function destroy($id)
    {
       $image= ProductImage::find($id);
       $image->delete();
        return back();

    }
}
