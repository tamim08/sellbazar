<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    
protected $fillable = [
'id','name','description','image','home','category_id'
];

public function Category(){
    return $this->belongsTo(Category::class);
}
                    
}
