<?php

namespace App\Http\Controllers;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\Order\OrderResource;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  OrderResource::collection(Order::all());
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
    public function store(OrderRequest $request)
    {
        $var = Order::create([
            $request->all()
        ]);
        return response([
            'data' => new OrderResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Order $var)
    {
        return new OrderResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new OrderResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $var)
    {
        $var->delete();
    }
}
