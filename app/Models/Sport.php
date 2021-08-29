<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    //asignacion masiva

    protected $fillable=['name','slug'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    //relacion uno a muchos
    public function best(){
        return $this->hasMany(Best::class);
    }
}
