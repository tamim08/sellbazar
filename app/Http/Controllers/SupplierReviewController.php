<?php

namespace App\Http\Controllers;

use App\Model\SupplierReview;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierReviewRequest;
use App\Http\Resources\SupplierReview\SupplierReviewResource;

class SupplierReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  SupplierReviewResource::collection(SupplierReview::all());
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
    public function store(SupplierReviewRequest $request)
    {
        $var = SupplierReview::create([
            $request->all()
        ]);
        return response([
            'data' => new SupplierReviewResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupplierReview  $var
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierReview $var)
    {
        return new SupplierReviewResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupplierReview  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierReview $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupplierReview  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplierReview $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new SupplierReviewResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupplierReview  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierReview $var)
    {
        $var->delete();
    }
}
