<?php

namespace App\Http\Controllers;

use App\Model\ProductReview;
use Illuminate\Http\Request;
use App\Http\Requests\ProductReviewRequest;
use App\Http\Resources\ProductReview\ProductReviewResource;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  ProductReviewResource::collection(ProductReview::all());
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
    public function store(ProductReviewRequest $request)
    {
        $var = ProductReview::create([
            $request->all()
        ]);
        return response([
            'data' => new ProductReviewResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductReview  $var
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $var)
    {
        return new ProductReviewResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductReview  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReview $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductReview  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReview $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new ProductReviewResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductReview  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReview $var)
    {
        $var->delete();
    }
}
