<?php

namespace App\Http\Controllers;

use App\Models\Best;
use App\Models\Sport;
use App\Models\Type;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class BestController extends Controller
{
    //
        public function index(){
        $bests = Best::where('status',2,3)->latest('id')->paginate(9);
        return view('home.index', compact('bests'));
    }

    public function show(Best $best){
        $sports = Sport::all();
        $types = Type::all();
        $sports = Sport::all();
        $similares = Best::where('sport_id',$best->sport_id)->where('status',2)->where('id','!=',$best->id)->latest('id')->take(4)->get();
        return view('home.show',compact('best','similares','sports','types'));
    }

    public function sport(Sport $sport){
        $bests = Best::where('sport_id',$sport->id)->where('status',2)->latest('id')->paginate('6');
        return view('home.sport',compact('bests','sport'));
    }

}
