<?php

namespace App\Http\Controllers;

use App\Model\SupplierFollow;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierFollowRequest;
use App\Http\Resources\SupplierFollow\SupplierFollowResource;

class SupplierFollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  SupplierFollowResource::collection(SupplierFollow::all());
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
    public function store(SupplierFollowRequest $request)
    {
        $var = SupplierFollow::create([
            $request->all()
        ]);
        return response([
            'data' => new SupplierFollowResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupplierFollow  $var
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierFollow $var)
    {
        return new SupplierFollowResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupplierFollow  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierFollow $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupplierFollow  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplierFollow $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new SupplierFollowResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupplierFollow  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierFollow $var)
    {
        $var->delete();
    }
}
