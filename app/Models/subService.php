<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\service;

class subService extends Model
{
    use HasFactory;
    protected $fillable = ['service_key', 'sub_key', 'name', 'icon', 'title', 'text', 'image', 'title1', 'text1', 'image1', 'title2', 'text2', 'image2'];

    public function service(){

        return $this->belongsTo(service::class);

    }
}
