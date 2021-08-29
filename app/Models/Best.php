<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Best extends Model
{
    use HasFactory;

    protected $guarded = [
        'id','created_at','updated_at'
    ];


    //Relacion uno a muchos inversa

    public function sport(){
        return $this->belongsTo(Sport::class);
    }

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    //relacion uno a uno polimorfica

    public function image(){
        return $this->morphOne(image::class,'imageable');
    }
}
