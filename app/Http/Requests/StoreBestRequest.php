<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

            //
            $best = $this->route()->parameter('best');
            $rules =[
                'name' =>'required',
                'slug' =>'required|unique:bests',
                'status' =>'required|in:1,2,3',
                'file' => 'image'
            ];

            if($this->status == 2){
                $rules = array_merge($rules,[
                    'sport_id'=>'required',
                    'extract'=>'required',
                    'body'=>'required'
                ]);
            }
        return $rules;
    }
}