<?php

namespace App\Http\Controllers;

use App\Model\OrderLine;
use Illuminate\Http\Request;
use App\Http\Requests\OrderLineRequest;
use App\Http\Resources\OrderLine\OrderLineResource;

class OrderLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  OrderLineResource::collection(OrderLine::all());
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
    public function store(OrderLineRequest $request)
    {
        $var = OrderLine::create([
            $request->all()
        ]);
        return response([
            'data' => new OrderLineResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderLine  $var
     * @return \Illuminate\Http\Response
     */
    public function show(OrderLine $var)
    {
        return new OrderLineResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderLine  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderLine $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderLine  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderLine $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new OrderLineResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderLine  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderLine $var)
    {
        $var->delete();
    }
}
