<?php

namespace App\Http\Controllers;

use App\Model\Medicine;
use Illuminate\Http\Request;
use App\Http\Requests\MedicineRequest;
use App\Http\Resources\Medicine\MedicineResource;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  MedicineResource::collection(Medicine::all());
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
    public function store(MedicineRequest $request)
    {
        $var = Medicine::create([
            $request->all()
        ]);
        return response([
            'data' => new MedicineResource($var)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $var)
    {
        return new MedicineResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $var)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $var)
    {
        //
        $var->update($request->all());
        return response([
            'data' => new MedicineResource($var)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $var)
    {
        $var->delete();
    }
}
