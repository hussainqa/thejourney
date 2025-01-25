<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    use HasFactory;
    protected $fillable=[
        'data_1','data_2','data_3','company_id'
    ];
    public function company()
    {
        return $this->hasMany(company::class,'companies');
    }
    public function scopeDateRange($query, $start_date, $end_date, $companyId)
    {
        return $query->whereDate('created_at', '>=', $start_date)
                     ->whereDate('created_at', '<=', $end_date)
                     ->where('company_id', '=', $companyId);
    }
}
