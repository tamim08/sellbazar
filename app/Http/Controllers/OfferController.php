<?php

namespace App\Http\Controllers;

use App\Model\Offer;
use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
use App\Http\Resources\Offer\OfferResource;
use DataTables;
use Illuminate\Support\Facades\URL;
class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Offer::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            
                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/offers/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';
         
                                return $btn;
                        })
                        ->addColumn('img', function($row){
                            
                            $btn = '<img style="width:60px" src="'.URL::to('/images/'.$row->banner).'">';
      
                             return $btn;
                     })
                    
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
            
                    }
                    $thead='<th>ID</th>
                    <th>Title</th>
                    <th>Banner</th>
                    <th>Description</th>
                    <th>Discount</th>
                    <th>Fixed</th>
                    <th>Start</th>
                    <th>End</th>
                    ';
                    $columns="{data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'img', name: 'img'},
                    {data: 'description', name: 'description'},
                    {data: 'discount', name: 'discount'},
                    {data: 'fixed', name: 'fixed'},
                    {data: 'start', name: 'start'},
                    {data: 'end', name: 'end'},";
                    return view('table.data',["columns"=>$columns,"thead"=>$thead,"layout"=>'admin.master','ajax'=>'offers','title'=>'Offer List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action="offers";
        $name="Offers";
        $fields=[
            [
                "name"=>"title",
                "label"=>"Title",
                "type"=>"text",
                "required"=>true
            ],
            [
                "name"=>"img",
                "label"=>"Banner",
                "type"=>"file",
                "required"=>true
            ],
            [
                "name"=>"description",
                "label"=>"Description",
                "type"=>"textarea",
                "required"=>true
            ],
            [
                "name"=>"discount",
                "label"=>"Discount",
                "type"=>"number",
                "required"=>true
            ],
            [
                "name"=>"fixed",
                "label"=>"Fixed",
                "type"=>"number",
                "required"=>true
            ],
            [
                "name"=>"start",
                "label"=>"Start",
                "type"=>"date",
                "required"=>true
            ],
            
            [
                "name"=>"end",
                "label"=>"End",
                "type"=>"date",
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
    public function store(OfferRequest $request)
    {
        $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('images'), $imageName);
        $request['banner'] = $imageName;
       
        Offer::create(
            $request->all()
        );
        return redirect('/offers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $var
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $var)
    {
        return new OfferResource($var);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $var
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        $action="offers/$offer->id";
        $name="Offer";
        $fields=[
            [
                "name"=>"title",
                "label"=>"Title",
                "type"=>"text",
                "required"=>false,
                "value"=>$offer->title
            ],
            [
                "name"=>"description",
                "label"=>"Description",
                "type"=>"textarea",
                "required"=>false,
                "value"=>$offer->description
            ],
            [
                "name"=>"img",
                "label"=>"Banner",
                "type"=>"file",
                "required"=>false
            ],
            [
                "name"=>"discount",
                "label"=>"Discount",
                "type"=>"number",
                "required"=>false,
                "value"=>$offer->discount
            ],
            [
                "name"=>"fixed",
                "label"=>"Fixed",
                "type"=>"number",
                "required"=>false,
                "value"=>$offer->fixed
            ],
            [
                "name"=>"start",
                "label"=>"Start",
                "type"=>"date",
                "required"=>false,
                "value"=>$offer->start
            ],
            
            [
                "name"=>"end",
                "label"=>"End",
                "type"=>"date",
                "required"=>false,
                "value"=>$offer->end
            ]
            ];
           
        return view('admin.form.edit',["action"=>$action,"name"=>$name,"fields"=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $var
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        if($request->img){
            $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('images'), $imageName);
        $request['banner'] = $imageName;
        }
        
        $offer->update($request->all());

        return redirect('/offers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $var
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect('/offers');
    }
}
