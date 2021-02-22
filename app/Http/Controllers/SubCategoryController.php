<?php

namespace App\Http\Controllers;

use App\Model\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Resources\SubCategory\SubCategoryResource;
use App\model\Category;
use DataTables;
use Illuminate\Support\Facades\URL;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SubCategory::latest()->with('Category')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            
                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/subcategories/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
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
                    <th>Category</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'category.name', name: 'category.name'},
                    {data: 'name', name: 'name'},
                    {data: 'img', name: 'img'},
                    {data: 'description', name: 'description'},";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'subcategories','title'=>'Category List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="subcategories";
        $name="Subcategory";
        $fields=[
            [
                "name"=>"category_id",
                "label"=>"Category",
                "type"=>"select",
                "required"=>true,
                "options"=>Category::all(),
                "optionlabel"=>"name"
            ],
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
    public function store(SubCategoryRequest $request)
    {
        $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('images'), $imageName);
        $request['image'] = $imageName;
        if($request['show_home']){
            $request['home']=1;
        }
        SubCategory::create(
            $request->all()
        );
        return redirect('/subcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $var
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $var)
    {
        return new SubCategoryResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
      
        $action="subcategories/$subcategory->id";
        $name="Category";
        $fields=[
            [
                "name"=>"category_id",
                "label"=>"Category",
                "type"=>"select",
                "required"=>true,
                "value"=>$subcategory->category_id,
                "options"=>Category::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true,
                "value"=>$subcategory->name
            ],
            [
                "name"=>"description",
                "label"=>"Description",
                "type"=>"textarea",
                "required"=>true,
                "value"=>$subcategory->description
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
                "value"=>$subcategory->home
            ]
            
            ];
           
        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
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

        $subcategory->update($request->all());

        return redirect('/subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect('subcategories');
    }
}
