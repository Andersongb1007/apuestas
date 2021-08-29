<?php

namespace App\Observers;

use App\Models\Best;
use Illuminate\Support\Facades\Storage;
class BestObserver
{
    //
    public function created(Best $best){

    }

    public function deleting(Best $best ){

        if($best->image){
            Storage::delete($best->image->url);
        }
    }
}
