<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Brand;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use DataTables;
use Illuminate\Support\Facades\URL;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::latest()->with('SubCategory')->with('Brand')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            
                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/products/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';
         
                                return $btn;
                        })
                        
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
            
                    }
                    $thead='<th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Category</th>
                    <th>Brand</th>
                    ';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'code', name: 'code'},
                    {data: 'price', name: 'price'},
                    {data: 'discount', name: 'discount'},
                    {data: 'description', name: 'description'},
                    {data: 'duration', name: 'duration'},
                    {data: 'sub_category.name', name: 'sub_category.name'},
                    {data: 'brand.name', name: 'brand.name'},";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'seller.master','ajax'=>'products','title'=>'Product List']);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="products";
        $name="Product";
        $fields=[
            [
                "name"=>"sub_category_id",
                "label"=>"Category",
                "type"=>"select",
                "required"=>true,
                "options"=>SubCategory::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"brand_id",
                "label"=>"Brand",
                "type"=>"select",
                "required"=>true,
                "options"=>Brand::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true
            ],
            [
                "name"=>"code",
                "label"=>"Code",
                "type"=>"text",
                "required"=>true
            ],
            [
                "name"=>"price",
                "label"=>"Price",
                "type"=>"number",
                "required"=>true
            ],
            [
                "name"=>"discount",
                "label"=>"Discount",
                "type"=>"number",
                "required"=>true
            ],
            [
                "name"=>"description",
                "label"=>"Description",
                "type"=>"textarea",
                "required"=>true
            ],
            [
                "name"=>"duration",
                "label"=>"Duration",
                "type"=>"number",
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
    public function store(ProductRequest $request)
    {
        Product::create(
            $request->all()
        );
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Product $var)
    {
        return new ProductResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $action="products/$product->id";
        $name="Product";
        $fields=[
            [
                "name"=>"sub_category_id",
                "label"=>"Category",
                "type"=>"select",
                "required"=>false,
                "value"=>$product->sub_category_id,
                "options"=>SubCategory::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"brand_id",
                "label"=>"Brand",
                "type"=>"select",
                "required"=>false,
                "value"=>$product->brand_id,
                "options"=>Brand::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>false,
                "value"=>$product->name
            ],
            [
                "name"=>"code",
                "label"=>"Code",
                "type"=>"text",
                "required"=>false,
                "value"=>$product->code
            ],
            [
                "name"=>"price",
                "label"=>"Price",
                "type"=>"number",
                "required"=>false,
                "value"=>$product->price
            ],
            [
                "name"=>"discount",
                "label"=>"Discount",
                "type"=>"number",
                "required"=>false,
                "value"=>$product->discount
            ],
            [
                "name"=>"description",
                "label"=>"Description",
                "type"=>"textarea",
                "required"=>false,
                "value"=>$product->description
            ],
            [
                "name"=>"duration",
                "label"=>"Duration",
                "type"=>"number",
                "required"=>false, 
                "value"=>$product->duration
            ]
            ];

        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
