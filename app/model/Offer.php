<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    
protected $fillable = [
'id','title','banner','description','discount','fixed','start','end'
];
                    
}
