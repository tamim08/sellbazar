<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\model\ParentCategory;
use DataTables;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        
        if ($request->ajax()) {
        $data = Category::latest()->with('ParentCategory')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        
                           $btn = '<div class="btn-group"><a href="'.URL::to('/').'/categories/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
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
                <th>Parent Category</th>
                ';
                $columns="{data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'img', name: 'img'},
                {data: 'description', name: 'description'},
                {data: 'parent_category.name', name: 'parent_category.name'},";
                return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'categories','title'=>'Category List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="categories";
        $name="Category";
        $fields=[ 
            [
                "name"=>"parent_category_id",
                "label"=>"Parent Category",
                "type"=>"select",
                "required"=>true,
                "options"=>ParentCategory::all(),
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
    public function store(CategoryRequest $request)
    {
        
        $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('images'), $imageName);
        $request['image'] = $imageName;
        if($request['show_home']){
            $request['home']=1;
        }
        Category::create(
            $request->all()
        );
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $action="categories/$category->id";
        $name="Category";
        $fields=[
            [
                "name"=>"parent_category_id",
                "label"=>"Parent Category",
                "type"=>"select",
                "required"=>true,
                "options"=>ParentCategory::all(),
                "optionlabel"=>"name",
                "value"=>$category->parent_category_id
            ],
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true,
                "value"=>$category->name
            ],
            [
                "name"=>"description",
                "label"=>"Description",
                "type"=>"textarea",
                "required"=>true,
                "value"=>$category->description
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
                "value"=>$category->home
            ]
            
            ];
           
        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
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

        $category->update($request->all());

        return redirect('/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('categories');
    }
}
