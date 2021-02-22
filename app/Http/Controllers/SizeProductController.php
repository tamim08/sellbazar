<?php

namespace App\Http\Controllers;

use App\Model\SizeProduct;
use Illuminate\Http\Request;
use App\Http\Requests\SizeProductRequest;
use App\Http\Resources\SizeProduct\SizeProductResource;

class SizeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  SizeProductResource::collection(SizeProduct::all());
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
    public function store(SizeProductRequest $request)
    {
        $var = SizeProduct::create([
            $request->all()
        ]);
        return response([
            'data' => new SizeProductResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SizeProduct  $var
     * @return \Illuminate\Http\Response
     */
    public function show(SizeProduct $var)
    {
        return new SizeProductResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SizeProduct  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(SizeProduct $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SizeProduct  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SizeProduct $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new SizeProductResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SizeProduct  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(SizeProduct $var)
    {
        $var->delete();
    }
}
