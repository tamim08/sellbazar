<?php

namespace App\Http\Controllers;

use App\Model\ProductReturnPolicy;
use Illuminate\Http\Request;
use App\Http\Requests\ProductReturnPolicyRequest;
use App\Http\Resources\ProductReturnPolicy\ProductReturnPolicyResource;

class ProductReturnPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  ProductReturnPolicyResource::collection(ProductReturnPolicy::all());
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
    public function store(ProductReturnPolicyRequest $request)
    {
        $var = ProductReturnPolicy::create([
            $request->all()
        ]);
        return response([
            'data' => new ProductReturnPolicyResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductReturnPolicy  $var
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReturnPolicy $var)
    {
        return new ProductReturnPolicyResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductReturnPolicy  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReturnPolicy $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductReturnPolicy  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReturnPolicy $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new ProductReturnPolicyResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductReturnPolicy  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReturnPolicy $var)
    {
        $var->delete();
    }
}
