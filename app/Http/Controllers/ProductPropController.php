<?php

namespace App\Http\Controllers;

use App\Models\ProductProp;
use Illuminate\Http\Request;

class ProductPropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\ProductProp  $productProp
     * @return \Illuminate\Http\Response
     */
    public function show(ProductProp $productProp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductProp  $productProp
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductProp $productProp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductProp  $productProp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        ProductProp::find($id)->update($request->except('_token', '_method'));
        return back();
    }

    public function destroy($id)
    {
       $prop= ProductProp::find($id);
       $prop->delete();
        return back();

    }
}
