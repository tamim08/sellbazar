<?php

namespace App\Http\Controllers;

use App\Model\ColorProduct;
use Illuminate\Http\Request;
use App\Http\Requests\ColorProductRequest;
use App\Http\Resources\ColorProduct\ColorProductResource;
use App\model\Color;
use App\model\Product;
use DataTables;
use Illuminate\Support\Facades\URL;

class ColorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ColorProduct::latest()->with('Color')->with('Product')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/colorProducts/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                   }
                    $thead='<th>ID</th>
                    <th>Color</th>
                    <th>Product</th>
                    <th>Name</th>';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'color.name', name: 'color.name'},
                    {data: 'product.name', name: 'product.name'},
                    {data: 'name', name: 'name'},";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'colorProducts','title'=>'Color Product List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="colorProducts";
        $name="Color Product";
        $fields=[
            [
                "name"=>"color_id",
                "label"=>"Color",
                "type"=>"select",
                "required"=>true,
                "options"=>Color::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"product_id",
                "label"=>"Product",
                "type"=>"select",
                "required"=>true,
                "options"=>Product::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"name",
                "label"=>"Name",
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
    public function store(ColorProductRequest $request)
    {
        ColorProduct::create(
            $request->all()
        );
        return redirect('/colorProducts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ColorProduct  $var
     * @return \Illuminate\Http\Response
     */
    public function show(ColorProduct $var)
    {
        return new ColorProductResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ColorProduct  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(ColorProduct $colorProduct)
    {
        $action="colorProducts/$colorProduct->id";
        $name="Color Product";
        $fields=[
            [
                "name"=>"color_id",
                "label"=>"Color",
                "type"=>"select",
                "required"=>true,
                "value"=>$colorProduct->color_id,
                "options"=>Color::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"product_id",
                "label"=>"Product",
                "type"=>"select",
                "required"=>true,
                "value"=>$colorProduct->product_id,
                "options"=>Product::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true,
                "value"=>$colorProduct->name
            ]
            ];

        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ColorProduct  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ColorProduct $colorProduct)
    {

        $colorProduct->update($request->all());

        return redirect('/colorProduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ColorProduct  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(ColorProduct $colorProduct)
    {
        $colorProduct->delete();
        return redirect('/colorProducts');
    }
}
