<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
protected $fillable = [
'id','name','description','image','home','parent_category_id'
];
public function ParentCategory(){
    return $this->belongsTo(ParentCategory::class);
}
public function SubCategories(){
    return $this->hasMany(SubCategory::class);
}
                    
}
