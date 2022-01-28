<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'title',
        'time_in_days',
        'price',
        'ville',
        'pays_id',
        'typeHebergement_id'
    ];

    public function pays(){
        return $this->belongsTo('pays');
    }
    public function typeHebergement(){
        return $this->belongsTo('typeHebergement');
    }
    public function reservation(){
        return $this->hasMany('reservation');
    }
}
