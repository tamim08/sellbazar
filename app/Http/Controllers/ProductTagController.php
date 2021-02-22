<?php

namespace App\Http\Controllers;

use App\Model\ProductTag;
use Illuminate\Http\Request;
use App\Http\Requests\ProductTagRequest;
use App\Http\Resources\ProductTag\ProductTagResource;

class ProductTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  ProductTagResource::collection(ProductTag::all());
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
    public function store(ProductTagRequest $request)
    {
        $var = ProductTag::create([
            $request->all()
        ]);
        return response([
            'data' => new ProductTagResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductTag  $var
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTag $var)
    {
        return new ProductTagResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductTag  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTag $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductTag  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductTag $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new ProductTagResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductTag  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductTag $var)
    {
        $var->delete();
    }
}
