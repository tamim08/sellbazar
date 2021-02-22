<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    
protected $fillable = [
'id',
'color_id',
'product_id'
];
  
public function Color(){
    return $this->belongsTo(Color::class);
}  
}
