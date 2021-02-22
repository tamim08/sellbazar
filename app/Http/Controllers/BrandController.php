<?php

namespace App\Http\Controllers;

use App\Model\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Resources\Brand\BrandResource;
use DataTables;
use Illuminate\Support\Facades\URL;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if (request()->ajax()) {
            $data = Brand::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/brands/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })
                        ->addColumn('img', function($row){

                            $btn = '<img style="width:60px" src="'.URL::to('/images/'.$row->image).'">';

                             return $btn;
                     })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                    }
                    $thead='<th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>

                    ';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'img', name: 'img'},
                    {data: 'description', name: 'description'},";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'brands','title'=>'Brand List']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="brands";
        $name="Brand";
        $fields=[
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true
            ],
            [
                "name"=>"description",
                "label"=>"Description",
                "type"=>"textarea",
                "required"=>true
            ],
            [
                "name"=>"img",
                "label"=>"Image",
                "type"=>"file",
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
    public function store(BrandRequest $request)
    {
        $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('images'), $imageName);
        $request['image'] = $imageName;
        Brand::create(
            $request->all()
        );
        return redirect('/brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $var)
    {
        return new BrandResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $action="brands/$brand->id";
        $name="Brand";
        $fields=[
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true,
                "value"=>$brand->name
            ],
            [
                "name"=>"description",
                "label"=>"Description",
                "type"=>"textarea",
                "required"=>true,
                "value"=>$brand->description
            ],
            [
                "name"=>"img",
                "label"=>"Image",
                "type"=>"file",
                "required"=>false
            ],
            ];

        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        if($request->img){
            $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('images'), $imageName);
        $request['image'] = $imageName;
        }
        $brand->update($request->all());

        return redirect('/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect('/brands');
    }
}
