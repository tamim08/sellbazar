<?php

namespace App\Http\Controllers;

use App\Model\ParentCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ParentCategoryRequest;
use App\Http\Resources\ParentCategory\ParentCategoryResource;
use DataTables;
use Illuminate\Support\Facades\URL;
class ParentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = ParentCategory::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            
                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/parentcategories/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';
         
                                return $btn;
                        })
                        ->addColumn('img', function($row){
                            
                            $btn = '<img style="width:60px" src="'.URL::to('/images/'.$row->image).'">';
      
                             return $btn;
                     })
                     ->addColumn('show', function($row){
                            
                            if($row->home==1)
                            {
                                return "<span class='badge bg-success'>Show</span>";
                            }
                            else{
                                return "<span class='badge bg-danger'>Hidden</span>";
                            }
                 })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
            
                    }
                    $thead='<th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Show On Home</th>
                    ';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'img', name: 'img'},
                    {data: 'description', name: 'description'},
                    {data: 'show', name: 'show'},";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'parentcategories','title'=>'Parent Category List']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="parentcategories";
        $name="Parent Category";
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
            ],
            [
                "name"=>"show_home",
                "label"=>"Show On Homepage",
                "type"=>"checkbox",
                "required"=>false
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
    public function store(ParentCategoryRequest $request)
    {
        $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('images'), $imageName);
        $request['image'] = $imageName;
        if($request['show_home']){
            $request['home']=1;
        }
        ParentCategory::create(
            $request->all()
        );
        return redirect('/parentcategories');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParentCategory  $var
     * @return \Illuminate\Http\Response
     */
    public function show(ParentCategory $var)
    {
        return new ParentCategoryResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParentCategory  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(ParentCategory $parentcategory)
    {
        $action="parentcategories/$parentcategory->id";
        $name="Parent Category";
        $fields=[
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true,
                "value"=>$parentcategory->name
            ],
            [
                "name"=>"description",
                "label"=>"Description",
                "type"=>"textarea",
                "required"=>true,
                "value"=>$parentcategory->description
            ],
            [
                "name"=>"img",
                "label"=>"Image",
                "type"=>"file",
                "required"=>false
            ],
            [
                "name"=>"show_home",
                "label"=>"Show On Homepage",
                "type"=>"checkbox",
                "required"=>false,
                "value"=>$parentcategory->home
            ]
            
            ];
           
        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParentCategory  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParentCategory $parentcategory)
    {
        if($request->img){
            $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('images'), $imageName);
        $request['image'] = $imageName;
        }
        $request['home']=0;
        if($request['show_home']){
            $request['home']=1;
        }

        $parentcategory->update($request->all());

        return redirect('/parentcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParentCategory  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParentCategory $parentcategory)
    {
        $parentcategory->delete();
        return redirect('/parentcategories');
    }
}
