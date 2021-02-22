<?php

namespace App\Http\Controllers;

use App\Model\ProductPaymentMethod;
use Illuminate\Http\Request;
use App\Http\Requests\ProductPaymentMethodRequest;
use App\Http\Resources\ProductPaymentMethod\ProductPaymentMethodResource;

class ProductPaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  ProductPaymentMethodResource::collection(ProductPaymentMethod::all());
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
    public function store(ProductPaymentMethodRequest $request)
    {
        $var = ProductPaymentMethod::create([
            $request->all()
        ]);
        return response([
            'data' => new ProductPaymentMethodResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductPaymentMethod  $var
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPaymentMethod $var)
    {
        return new ProductPaymentMethodResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductPaymentMethod  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPaymentMethod $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductPaymentMethod  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPaymentMethod $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new ProductPaymentMethodResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductPaymentMethod  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPaymentMethod $var)
    {
        $var->delete();
    }
}
