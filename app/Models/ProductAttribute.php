<?php

namespace App\Models;
use App\Models\AttributeValue;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    public $table = 'tbl_product_attribute';
   
    public function attributeValues()
    {

        return $this->hasMany('App\Models\AttributeValue','id');
    }


}