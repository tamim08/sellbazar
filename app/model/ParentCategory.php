<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    
protected $fillable = [
    'id','name','description','image','home'
];
public function Categories(){
    return $this->hasMany(Category::class);
}
                    
}
