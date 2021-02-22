<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    
protected $fillable = [
'name','phone','email','facebook','address','inside_dhaka_charge',
'outside_dhaka_charge','area_id','supplier_category_id'
];
                    
}
