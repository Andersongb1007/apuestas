<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    //Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
    //Relacion muchos a muchos

    public function tags(){
        return $this->belongsToMany(tags::class);
    }

    //relacion uno a uno polimorfica

    public function image(){
        return $this->morphOne(image::class,'imageable');
    }
}