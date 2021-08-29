<?php

namespace App\Http\Controllers;

use App\Models\Best;
use App\Models\Type;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index(Best $best){
        $types= Type::all();

        return view('best.index', compact('best','types'));
    }

    public function success($details){
        return $details;
    }

}