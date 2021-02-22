<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    
protected $fillable = [
'id','image','body','serial'
,'status'
,'button'
,'url'
];
                    
}
