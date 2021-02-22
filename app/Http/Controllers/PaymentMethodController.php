<?php

namespace App\Http\Controllers;

use App\Model\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentMethodRequest;
use App\Http\Resources\PaymentMethod\PaymentMethodResource;
use DataTables;
use Illuminate\Support\Facades\URL;
class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = PaymentMethod::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            
                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/paymentmethods/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
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
                    <th>Details</th>
                   
                    ';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'img', name: 'img'},
                    {data: 'details', name: 'details'},
                    ";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'paymentmethods','title'=>'Payment Method List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="paymentmethods";
        $name="Payment Methods";
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
    public function store(PaymentMethodRequest $request)
    {
        $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('images'), $imageName);
        $request['image'] = $imageName;
        PaymentMethod::create(
            $request->all()
        );
        return redirect('/paymentmethods');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentMethod  $var
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $var)
    {
        return new PaymentMethodResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentMethod  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentmethod)
    {
        $action="paymentmethods/$paymentmethod->id";
        $name="Payment Method";
        $fields=[
            [
                "name"=>"name",
                "label"=>"Name",
                "type"=>"text",
                "required"=>true,
                "value"=>$paymentmethod->name
            ],
            [
                "name"=>"details",
                "label"=>"Details",
                "type"=>"textarea",
                "required"=>true,
                "value"=>$paymentmethod->details
            ],
            [
                "name"=>"img",
                "label"=>"Image",
                "type"=>"file",
                "required"=>false
            ]
            
            ];
           
        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentMethod  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentmethod)
    {
        if($request->img){
            $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('images'), $imageName);
        $request['image'] = $imageName;
        }
      

        $paymentmethod->update($request->all());

        return redirect('/paymentmethods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentMethod  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentmethod)
    {
        $paymentmethod->delete();
        return redirect('/paymentmethods');

        
    }
}
