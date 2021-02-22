<?php

namespace App\Http\Controllers;

use App\model\Category;
use App\model\ParentCategory;
use App\model\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->type==2){
            return redirect('/admin');
        }
        return view('home');
    }









    public function categoryDetails($name){
            return view('front-end.customer.category',['category'=>Category::where('name','=',$name)->first()]) ;
    }
    public function subCategoryDetails($name){
        return view('front-end.customer.subcategory',['subCategory'=>SubCategory::where('name','=',$name)->first()]) ;
        
    }
    public function parentCategoryDetails($name){
        return view('front-end.customer.parentcategory',['parentCategory'=>ParentCategory::where('name','=',$name)->first()]) ;
        
    }
}
