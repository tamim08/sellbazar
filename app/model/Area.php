<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    
protected $fillable = [
'id','name','sub_district_id' 
];
public function SubDistrict(){
    return $this->belongsTo(SubDistrict::class);
}                  
}
