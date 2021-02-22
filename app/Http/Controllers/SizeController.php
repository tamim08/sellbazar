<?php

namespace App\Http\Controllers;

use App\Model\Size;
use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;
use App\Http\Resources\Size\SizeResource;
use DataTables;
use Illuminate\Support\Facades\URL;
class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Size::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/sizes/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                    }
                    $thead='<th>ID</th>
                    <th>Name</th>
                    ';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'}, ";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'sizes','title'=>'Size List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="sizes";
        $name="Size";
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
    public function store(SizeRequest $request)
    {
        Size::create(
            $request->all()
        );
        return redirect('/sizes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Size  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Size $var)
    {
        return new SizeResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Size  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        $action="sizes/$size->id";
        $name="Size";
        $fields=[
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true,
                "value"=>$size->name
            ],
            ];

        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Size  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $size->update($request->all());
        return redirect('/sizes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Size  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return redirect('/sizes');
    }
}
