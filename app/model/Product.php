<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
protected $fillable = [
'id','name','code','price','discount','short_description','description','duration','status',
'sub_category_id','brand_id','area_id','weight','weight_type_id','quantity','product_condition',"supplier_id"
];
public function ProductImages(){
    return $this->hasMany(ProductImage::class);
}
public function SubCategory(){
    return $this->belongsTo(SubCategory::class);
}
public function Brand(){
    return $this->belongsTo(Brand::class);
}     

public function Area(){
    return $this->belongsTo(Area::class);
}  
public function WeightType(){
    return $this->belongsTo(WeightType::class);
}       
public function Supplier(){
    return $this->belongsTo(Supplier::class);
}
public function ColorProducts(){
    return $this->hasMany(ColorProduct::class);
}  
public function SizeProducts(){
    return $this->hasMany(SizeProduct::class);
}  
}
