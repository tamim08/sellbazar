<?php

namespace App\Http\Controllers;

use App\Model\ProductImage;
use Illuminate\Http\Request;
use App\Http\Requests\ProductImageRequest;
use App\Http\Resources\ProductImage\ProductImageResource;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  ProductImageResource::collection(ProductImage::all());
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
    public function store(ProductImageRequest $request)
    {
        $var = ProductImage::create([
            $request->all()
        ]);
        return response([
            'data' => new ProductImageResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductImage  $var
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $var)
    {
        return new ProductImageResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductImage  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductImage  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new ProductImageResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductImage  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $var)
    {
        $var->delete();
    }
}
