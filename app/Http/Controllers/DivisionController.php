<?php

namespace App\Http\Controllers;

use App\Model\Division;
use Illuminate\Http\Request;
use App\Http\Requests\DivisionRequest;
use App\Http\Resources\Division\DivisionResource;
use DataTables;
use Illuminate\Support\Facades\URL;
class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Division::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/divisions/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
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
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'divisions','title'=>'Division List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="divisions";
        $name="Division";
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
    public function store(DivisionRequest $request)
    {
        Division::create(
            $request->all()
        );
        return redirect('/divisions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Division  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Division $var)
    {
        return new DivisionResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Division  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        $action="divisions/$division->id";
        $name="Division";
        $fields=[
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true,
                "value"=>$division->name
            ],

            ];

        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Division  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        $division->update($request->all());
        return redirect('/divisions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Division  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        $division->delete();
        return redirect('/divisions');
    }
}
