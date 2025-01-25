<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subService;

class service extends Model
{
    use HasFactory;
    
    protected $fillable = ['key','imagePath','title','description'];

    public function subServices(){

        return $this->hasMany(subService::class);
        
    }
}
