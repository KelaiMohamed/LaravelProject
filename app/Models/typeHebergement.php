<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeHebergement extends Model
{
   
    use HasFactory;

    protected $fillable = [
        'type'      
    ];

    public function ads(){
        return $this->hasMany('ad');
    }
}
