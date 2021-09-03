<?php

namespace App\Http\Controllers;

use App\Models\Best;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index(Best $best){
        $types= Type::all();

        return view('best.index', compact('best','types'));
    }

    public function success(Request $request , User $user){

        // N to N
        $user->ticket()->attach([
            'transaction_id' => null,//el id que viene por el request,
            'product_id' => null,// id del producto que deberia de enviarse por el request o por la url
            'price' => null , //total pagado
        ]);


        // 1 to N
        $user->ticket()->create([
            'transaction_id' => null,//el id que viene por el request,
            'product_id' => null,// id del producto que deberia de enviarse por el request o por la url
            'price' => null , //total pagado
        ]);


        //return response in json
        return response()->json($request->all());
    }

}
