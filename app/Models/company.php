<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','type','UrlName','logo','ad_1','ad_2','ad_3'
    ];
    public function data()
    {
        return $this->hasMany(data::class,'data');
    }
}
