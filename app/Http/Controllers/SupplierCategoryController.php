<?php

namespace App\Http\Controllers;

use App\Model\SupplierCategory;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierCategoryRequest;
use App\Http\Resources\SupplierCategory\SupplierCategoryResource;
use DataTables;
use Illuminate\Support\Facades\URL;
class SupplierCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = SupplierCategory::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/supplierCategories/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                    }
                    $thead='<th>ID</th>
                    <th>Name</th>
                    <th>Details</th>
                    ';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'}, 
                    {data: 'details', name: 'details'},";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'supplierCategories','title'=>'SupplierCategory List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="supplierCategories";
        $name="SupplierCategory";
        $fields=[
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true
            ],
            [
                "name"=>"details",
                "label"=>"Details",
                "type"=>"textarea",
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
    public function store(SupplierCategoryRequest $request)
    {
        SupplierCategory::create(
            $request->all()
        );
        return redirect('/supplierCategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupplierCategory  $var
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierCategory $var)
    {
        return new SupplierCategoryResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupplierCategory  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierCategory $supplierCategory)
    {
        $action="supplierCategories/$supplierCategory->id";
        $name="SupplierCategory";
        $fields=[
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>false,
                "value"=>$supplierCategory->name
            ],
            [
                "name"=>"details",
                "label"=>"Details",
                "type"=>"textarea",
                "required"=>false,
                "value"=>$supplierCategory->details
            ]

            ];

        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupplierCategory  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplierCategory $supplierCategory)
    {
        $supplierCategory->update($request->all());
        return redirect('/supplierCategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupplierCategory  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierCategory $supplierCategory)
    {

        $supplierCategory->delete();
        return redirect('/supplierCategories');
    }
}
