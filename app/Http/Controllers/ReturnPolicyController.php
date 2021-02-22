<?php

namespace App\Http\Controllers;

use App\Model\ReturnPolicy;
use Illuminate\Http\Request;
use App\Http\Requests\ReturnPolicyRequest;
use App\Http\Resources\ReturnPolicy\ReturnPolicyResource;
use DataTables;
use Illuminate\Support\Facades\URL;
class ReturnPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = ReturnPolicy::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            
                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/returnpolicies/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';
         
                                return $btn;
                        })
                     ->addColumn('cust', function($row){
                            
                            if($row->custom==1)
                            {
                                return "<span class='badge bg-success'>Yes</span>";
                            }
                            else{
                                return "<span class='badge bg-danger'>No</span>";
                            }
                 })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
            
                    }
                    $thead='<th>ID</th>
                    <th>Title</th>
                    <th>Day</th>
                    <th>Custom</th>
                    ';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'day', name: 'day'},
                    {data: 'cust', name: 'cust'},";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'returnpolicies','title'=>'Parent Category List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="returnpolicies";
        $name="Return Policy";
        $fields=[
            [
                "name"=>"title",
                "label"=>"Title",
                "type"=>"text",
                "required"=>true
            ],
            [
                "name"=>"day",
                "label"=>"Day",
                "type"=>"text",
                "required"=>true
            ],

            [
                "name"=>"cust",
                "label"=>"Custom",
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
    public function store(ReturnPolicyRequest $request)
    {
      
        if($request['cust']){
            $request['custom']=1;
        }
        ReturnPolicy::create(
            $request->all()
        );
        return redirect('/returnpolicies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReturnPolicy  $var
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnPolicy $var)
    {
        return new ReturnPolicyResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReturnPolicy  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturnPolicy $returnpolicy)
    {
        $action="returnpolicies/$returnpolicy->id";
        $name="Parent Category";
        $fields=[
            [
                "name"=>"title",
                "label"=>"Title",
                "type"=>"text",
                "required"=>true,
                "value"=>$returnpolicy->title
            ],
            [
                "name"=>"day",
                "label"=>"Day",
                "type"=>"text",
                "required"=>true,
                "value"=>$returnpolicy->day
            ],
            [
                "name"=>"cust",
                "label"=>"Show On Homepage",
                "type"=>"checkbox",
                "required"=>false,
                "value"=>$returnpolicy->custom
            ]
            
            ];
           
        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReturnPolicy  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturnPolicy $returnpolicy)
    {
        $request['custom']=0;
        if($request['cust']){
            $request['custom']=1;
        }

        $returnpolicy->update($request->all());

        return redirect('/returnpolicies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReturnPolicy  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnPolicy $returnpolicy)
    {
        $returnpolicy->delete();
        return redirect('/returnpolicies');
    }
}
