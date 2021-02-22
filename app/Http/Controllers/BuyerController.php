<?php

namespace App\Http\Controllers;

use App\Model\Buyer;
use Illuminate\Http\Request;
use App\Http\Requests\BuyerRequest;
use App\Http\Resources\Buyer\BuyerResource;
use App\Model\Area;
use DataTables;
use Illuminate\Support\Facades\URL;
class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data =Buyer::latest()->with('Area')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/buyers/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                   }
                    $thead='<th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Facebook_URL</th>
                    <th>Address</th>
                    <th>Area</th>';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'facebook', name: 'facebook'},
                    {data: 'address', name: 'address'},
                    {data: 'area.name', name: 'area.name'},";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'buyers','title'=>' Buyer List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="buyers";
        $name="Buyer";
        $fields=[
            [
                "name"=>"area_id",
                "label"=>"Area",
                "type"=>"select",
                "required"=>true,
                "options"=>Area::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true
            ],
            [
                "name"=>"phone",
                "label"=>"Phone",
                "type"=>"text",
                "required"=>true
            ],
            [
                "name"=>"facebook",
                "label"=>"Facebook_URL",
                "type"=>"text",
                "required"=>true
            ],
            [
                "name"=>"address",
                "label"=>"Adress",
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
    public function store(BuyerRequest $request)
    {
        Buyer::create(
            $request->all()
        );
        return redirect('/buyers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyer  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $var)
    {
        return new BuyerResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buyer  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyer $buyer)
    {
        $action="buyers/$buyer->id";
        $name="Buyer";
        $fields=[
            [
                "name"=>"area_id",
                "label"=>"Area",
                "type"=>"select",
                "required"=>true,
                "value"=>$buyer->area_id,
                "options"=>Area::all(),
                "optionlabel"=>"name"
            ],
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true,
                "value"=>$buyer->name
            ],
            [
                "name"=>"phone",
                "label"=>"Phone",
                "type"=>"text",
                "required"=>true,
                "value"=>$buyer->phone
            ],
            [
                "name"=>"facebook",
                "label"=>"Facebook_URL",
                "type"=>"text",
                "required"=>true,
                "value"=>$buyer->facebook
            ],
            [
                "name"=>"address",
                "label"=>"Adress",
                "type"=>"text",
                "required"=>true,
                "value"=>$buyer->address
            ]
            
            ];

        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyer  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyer $buyer)
    {
        $buyer->update($request->all());
        return redirect('/buyers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buyer  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $buyer)
    {
        $buyer->delete();
        return redirect('/buyers');
    }
}
