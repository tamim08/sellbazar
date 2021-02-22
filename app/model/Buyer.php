<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    
protected $fillable = [
'id','name','phone','facebook','','address','area_id'
];
public function Area(){
    return $this->belongsTo(Area::class);
}                
}
