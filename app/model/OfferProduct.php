<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    
protected $fillable = [
'id','product_id','offer_id'
];
public function Product(){
    return $this->belongsTo(Product::class);
}     
public function Offer(){
    return $this->belongsTo(Offer::class);
}           
}
