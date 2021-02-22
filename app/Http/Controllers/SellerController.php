<?php

namespace App\Http\Controllers;

use App\model\ColorProduct;

use App\model\PaymentMethod;
use App\model\Product;
use App\model\ProductImage;
use App\model\ReturnPolicy;
use App\model\SizeProduct;
use App\User;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function home(){
        return view('seller.home.home');
    }

    public function insertProduct(Request $request){
        $request["supplier_id"]=1;
        $product=Product::create($request->all());
        foreach($request->image as $img)
        {
            $imageName = time().'.'.$img->getClientOriginalExtension();
            $image_resize = Image::make($img->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('images/' .$imageName));
            ProductImage::create([
                "src"=>$imageName,
                "product_id"=>$product->id,
                "serial"=>1
            ]);
        }
        foreach($request->colors as $color){
            ColorProduct::create(
                [
                    "product_id"=>$product->id,
                    "color_id"=>$color
                ]
                );
        }
        foreach($request->sizes as $size){
            SizeProduct::create(
                [
                    "product_id"=>$product->id,
                    "size_id"=>$size
                ]
                );
        }
        return view('front-end.product.create_product4',['methods'=>PaymentMethod::all(),'policies'=>ReturnPolicy::all(),"id"=>$product->id]);
    }

    public function createProductFinal(Request $request,Product $product){

    }
    public function createProductSuccess(Product $product){

    }


    protected function seller_signup(Request $request)
    {
        $request->validate( [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $input = $request->all();
        $input['type']=3;
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return redirect('/customer-registration');
    }


    public function login(Request $request){
        if(auth()->attempt(array('email' => $request['email'], 'password' => $request['password'])))
        {
            if(auth()->user()->block==1){
                Auth::logout();
                return redirect('/user-login')
                ->with('error','Your account has been blocked');
            }
            if (auth()->user()->type == 3) {

                return redirect('/seller');
            }
            else if(auth()->user()->type == 2){
                return redirect()->route('admin.home');
            }
            else{
                return redirect('/user');
            }
        }else{
            return redirect('/user-login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }

}
