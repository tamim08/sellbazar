<?php

namespace App\Http\Controllers;

use App\Model\Color;
use Illuminate\Http\Request;
use App\Http\Requests\ColorRequest;
use App\Http\Resources\Color\ColorResource;
use DataTables;
use Illuminate\Support\Facades\URL;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Color::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/colors/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                    }
                    $thead='<th>ID</th>
                    <th>Name</th>';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'}, ";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'colors','title'=>'Colors List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="colors";
        $name="Color";
        $fields=[
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true
            ],
            ];

        return view('admin.form.create',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {
        Color::create(
            $request->all()
        );
        return redirect('/colors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Color  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Color $var)
    {
        return new ColorResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Color  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        $action="colors/$color->id";
        $name="Color";
        $fields=[
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true,
                "value"=>$color->name
            ],

            ];

        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Color  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $color->update($request->all());
        return redirect('/colors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Color  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect('/colors');
    }
}
