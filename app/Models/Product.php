<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table ='tbl_product';

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    
    public function info_module()
    {
        return $this->belongsTo(InfoModule::class,'info_id','id');
    }
    public function description_module()
    {
        return $this->belongsTo(DescriptionModule::class, 'description_id','id');
    }
}