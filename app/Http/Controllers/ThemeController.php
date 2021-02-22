<?php

namespace App\Http\Controllers;

use App\Model\Theme;
use Illuminate\Http\Request;
use App\Http\Requests\ThemeRequest;
use App\Http\Resources\Theme\ThemeResource;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  ThemeResource::collection(Theme::all());
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
    public function store(ThemeRequest $request)
    {
        $var = Theme::create([
            $request->all()
        ]);
        return response([
            'data' => new ThemeResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theme  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $var)
    {
        return new ThemeResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theme  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new ThemeResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theme  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $var)
    {
        $var->delete();
    }
}
