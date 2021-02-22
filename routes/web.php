<?php

use App\model\Brand;
use App\model\Color;
use App\model\Division;
use App\model\ParentCategory;
use App\model\PaymentMethod;
use App\model\ReturnPolicy;
use App\model\Size;
use App\model\WeightType;
use Illuminate\Support\Facades\Route;
use App\model\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','ShotovaghController@index')->name('/');
Route::get('/404','ShotovaghController@error')->name('/error');
Route::get('/about','ShotovaghController@about')->name('about');
Route::get('/contact','ShotovaghController@contact')->name('contact');
Route::get('/faq','ShotovaghController@faq')->name('faq');

//customer section
Route::get('/customer-login','CustomerController@customer_login')->name('customer_login');
Route::get('/customer-registration','CustomerController@customer_registration')->name('customer_registration');
Route::get('/customer-account','CustomerController@customer_account')->name('customer_account');
Route::get('/customer-order','CustomerController@customer_order')->name('customer_order');
Route::get('/customer-wishlist','CustomerController@customer_wishlist')->name('customer_wishlist');
Route::get('/basket','CustomerController@basket')->name('basket');


Route::get('/checkout1','CheckoutController@checkout1')->name('checkout1');
Route::get('/checkout2','CheckoutController@checkout2')->name('checkout2');
Route::get('/checkout3','CheckoutController@checkout3')->name('checkout3');
Route::get('/checkout4','CheckoutController@checkout4')->name('checkout4');


//product section

Route::get('/create-product',function (){

    return view('front-end.product.create_product',["parentCategories"=>ParentCategory::all()]);
})->name('create_product');

Route::get('/create-product2',function (){
    return view('front-end.product.create_product2',["divisions"=>Division::all()]);
})->name('create_product2');

Route::get('/create-product3',function (){
    return view('front-end.product.create_product3',['brands'=>Brand::all(),'colors'=>Color::all(),'sizes'=>Size::all(),'weightTypes'=>WeightType::all()]);
})->name('create_product3');

Route::get('/create-product4',function (){
    return view('front-end.product.create_product4',['methods'=>PaymentMethod::all(),'policies'=>ReturnPolicy::all()]);
})->name('create_product4');

Route::get('/product-details/{id}',function ($id){
    $porduct=Product::find($id);
    
    return view('front-end.product.product_details',['product' =>$porduct,'parentCategories'=>ParentCategory::all()]);
})->name('product_details');

Route::post('/create-product-final/{product}','SellerController@createProductFinal');
Route::get('/create-product-success/{product}','SellerController@createProductSuccess');

Route::post('/user-login','SellerController@login');


//Admin
// Route::get('/admin',function (){
//     return view('admin.home.home');
// });
Route::get('/admin','AdminController@home');
Route::get('/seller','SellerController@home');
Route::get('/seller/update-profile','SupplierController@update_profile')->name('update_profile');
Route::get('/seller/update-info','SupplierController@update_info')->name('update_info');
Route::post('/seller/save-data','SupplierController@save_data')->name('save_data');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::resource('/suppliers', 'SupplierController');


Route::resource('/categories', 'CategoryController');//->middleware('is_admin');

Route::resource('/subcategories', 'SubCategoryController');

Route::resource('/brands', 'BrandController');

Route::resource('/suppliers', 'SupplierController');

Route::resource('/products', 'ProductController');

Route::resource('/areas', 'AreaController');

Route::resource('/subdistricts', 'SubDistrictController');

Route::resource('/districts', 'DistrictController');

Route::resource('/divisions', 'DivisionController');

Route::resource('/paymentmethods', 'PaymentMethodController');

Route::resource('/productpaymentmethods', 'ProductPaymentMethodController');



Route::resource('/productImages', 'ProductImageController');

Route::resource('/orders', 'OrderController');

Route::resource('/orderLines', 'OrderLineController');

Route::resource('/orderpaymentmehods', 'OrderPaymentMehodController');

Route::resource('/supplierCategorys', 'SupplierCategoryController');

Route::resource('/sizes', 'SizeController');

Route::resource('/sizeProducts', 'SizeProductController');

Route::resource('/colors', 'ColorController');

Route::resource('/colorProducts', 'ColorProductController');

Route::resource('/offers', 'OfferController');

Route::resource('/offerproducts', 'OfferProductController');

Route::resource('/sliders', 'SliderController');

Route::resource('/ads', 'AdController');

Route::resource('/boosts', 'BoostController');

Route::resource('/themes', 'ThemeController');

Route::resource('/buyers', 'BuyerController');

Route::resource('/productreviews', 'ProductReviewController');

Route::resource('/supplierreviews', 'SupplierReviewController');

Route::resource('/supplierchats', 'SupplierChatController');

Route::resource('/supplierfollows', 'SupplierFollowController');

Route::resource('/tags', 'TagController');
Route::resource('/weighttypes', 'WeightTypeController');


Route::resource('/producttags', 'ProductTagController');

Route::resource('/parentcategories', 'ParentCategoryController');

Route::post('/add-product','SellerController@insertProduct');
Route::resource('/returnpolicies', 'ReturnPolicyController');

Route::post('/seller-signup','SellerController@seller_signup');

Route::resource('/ProductReturnPolicys', 'ProductReturnPolicyController');













































Route::get('/facebook/redirect', 'SocialAuthController@redirect');
Route::get('/facebook/callback', 'SocialAuthController@callback');


































Route::get('/category/{name}','HomeController@categoryDetails');
Route::get('/subcategory/{name}','HomeController@subCategoryDetails');
Route::get('/type/{name}','HomeController@parentCategoryDetails');
