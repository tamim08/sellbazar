<?php

namespace App\Http\Controllers;

use App\Model\District;
use Illuminate\Http\Request;
use App\Http\Requests\DistrictRequest;
use App\Http\Resources\District\DistrictResource;
use App\model\Division;
use DataTables;
use Illuminate\Support\Facades\URL;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = District::latest()->with('Division')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/districts/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                   }
                    $thead='<th>ID</th>
                    <th>District</th>
                    <th>Name</th>';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'division.name', name: 'division.name'},
                    {data: 'name', name: 'name'},";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'districts','title'=>'District List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="districts";
        $name="District";
        $fields=[
            [
                "name"=>"division_id",
                "label"=>"Division",
                "type"=>"select",
                "required"=>true,
                "options"=>Division::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"name",
                "label"=>"District Name",
                "type"=>"text",
                "required"=>true
            ]
            ];

        return view('admin.form.create',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictRequest $request)
    {
       District::create(
            $request->all()
        );
        return redirect('/districts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\District  $var
     * @return \Illuminate\Http\Response
     */
    public function show(District $var)
    {
        return new DistrictResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\District  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        $action="districts/$district->id";
        $name="District";
        $fields=[
            [
                "name"=>"division_id",
                "label"=>"Division",
                "type"=>"select",
                "required"=>true,
                "value"=>$district->division_id,
                "options"=>Division::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true,
                "value"=>$district->name
            ],
            ];

        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        $district->update($request->all());
        return redirect('/districts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\District  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        $district->delete();
        return redirect('/districts');
    }
}
