<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

protected $fillable = [
'id','name','division_id'
];
public function Division(){
    return $this->belongsTo(Division::class);
}
public function SubDistricts(){
    return $this->hasMany(SubDistrict::class);
}
}
