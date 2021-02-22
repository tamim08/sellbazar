<?php

namespace App\Http\Controllers;

use App\Model\OrderPaymentMehod;
use Illuminate\Http\Request;
use App\Http\Requests\OrderPaymentMehodRequest;
use App\Http\Resources\OrderPaymentMehod\OrderPaymentMehodResource;

class OrderPaymentMehodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  OrderPaymentMehodResource::collection(OrderPaymentMehod::all());
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
    public function store(OrderPaymentMehodRequest $request)
    {
        $var = OrderPaymentMehod::create([
            $request->all()
        ]);
        return response([
            'data' => new OrderPaymentMehodResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderPaymentMehod  $var
     * @return \Illuminate\Http\Response
     */
    public function show(OrderPaymentMehod $var)
    {
        return new OrderPaymentMehodResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderPaymentMehod  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderPaymentMehod $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderPaymentMehod  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderPaymentMehod $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new OrderPaymentMehodResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderPaymentMehod  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderPaymentMehod $var)
    {
        $var->delete();
    }
}
