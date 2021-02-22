<?php

namespace App\Http\Controllers;

use App\Model\OfferProduct;
use Illuminate\Http\Request;
use App\Http\Requests\OfferProductRequest;
use App\Http\Resources\OfferProduct\OfferProductResource;
use App\Model\Product;
use App\Model\Offer;
use DataTables;
use Illuminate\Support\Facades\URL;
class OfferProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = OfferProduct::latest()->with('Offer')->with('Product')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/offerProducts/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                   }
                    $thead='<th>ID</th>
                    <th>Product</th>
                    <th>Offer</th>';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'offer.title', name: 'offer.title'},
                    {data: 'product.name', name: 'product.name'},";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'offerproducts','title'=>'Offer Product List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="offerproducts";
        $name="Offer Product";
        $fields=[
            [
                "name"=>"product_id",
                "label"=>"Product",
                "type"=>"select",
                "required"=>true,
                "options"=>Product::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"offer_id",
                "label"=>"Offer",
                "type"=>"select",
                "required"=>true,
                "options"=>Offer::all(),
                "optionlabel"=>"title"
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
    public function store(OfferProductRequest $request)
    {
        OfferProduct::create(
            $request->all()
        );
        return redirect('/offerproducts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OfferProduct  $var
     * @return \Illuminate\Http\Response
     */
    public function show(OfferProduct $var)
    {
        return new OfferProductResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OfferProduct  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(OfferProduct $offerProduct)
    {
        
        $action="offerproducts/$offerProduct->id";
        $name="Offer Product";
        $fields=[
            [
                "name"=>"product_id",
                "label"=>"Product",
                "type"=>"select",
                "required"=>false,
                "value"=>$offerProduct->product_id,
                "options"=>Product::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"offer_id",
                "label"=>"Offer",
                "type"=>"select",
                "required"=>false,
                "value"=>$offerProduct->offer_id,
                "options"=>Offer::all(),
                "optionlabel"=>"title"
            ]
            ];

        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OfferProduct  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfferProduct $offerProduct)
    {
        $offerProduct->update($request->all());

        return redirect('/offerproducts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OfferProduct  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfferProduct $offerProduct)
    {
        $offerProduct->delete();
        return redirect('/offerProducts');
    }
}
