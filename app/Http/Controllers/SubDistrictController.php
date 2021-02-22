<?php

namespace App\Http\Controllers;

use App\Model\SubDistrict;
use App\Model\District;
use Illuminate\Http\Request;
use App\Http\Requests\SubDistrictRequest;
use App\Http\Resources\SubDistrict\SubDistrictResource;
use DataTables;
use Illuminate\Support\Facades\URL;
class SubDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SubDistrict::latest()->with('District')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/subDistricts/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
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
                    {data: 'district.name', name: 'district.name'},
                    {data: 'name', name: 'name'},";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'subdistricts','title'=>' SubDistrict List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $action="subdistricts";
        $name="SubDistrict";
        $fields=[
            [
                "name"=>"district_id",
                "label"=>"District",
                "type"=>"select",
                "required"=>true,
                "options"=>District::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"name",
                "label"=>"SubDistrict",
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
    public function store(SubDistrictRequest $request)
    {
        SubDistrict::create(
            $request->all()
        );
        return redirect('/subdistricts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubDistrict  $var
     * @return \Illuminate\Http\Response
     */
    public function show(SubDistrict $var)
    {
        return new SubDistrictResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubDistrict  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(SubDistrict $subDistrict)
    {
        $action="subdistricts/$subDistrict->id";
        $name="SubDistrict";
        $fields=[
            [
                "name"=>"division_id",
                "label"=>"Division",
                "type"=>"select",
                "required"=>true,
                "value"=>$subDistrict->district_id,
                "options"=>District::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true,
                "value"=>$subDistrict->name
            ],
            ];

        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubDistrict  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubDistrict $subDistrict)
    {
        $subDistrict->update($request->all());
        return redirect('/subdistricts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubDistrict  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubDistrict $subDistrict)
    {
        $subDistrict->delete();
        return redirect('/subDistricts');
    }
}
