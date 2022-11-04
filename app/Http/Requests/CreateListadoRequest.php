<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;//se agrego para usar request en metodo rules
use Validator;

class CreateListadoRequest extends FormRequest
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
    public function rules(Request $request) //se agrego los request al metodo
    {
        return [

            

            
                'id_asignatura' => Rule::unique('listado')->where(function ($query) use ($request){
                    return $query->where('id_asignatura', $request->id_asignatura)
                    ->where('id_curso', $request->id_curso);
                    
                }),
            

            

           

            
            


        ];
    }

    
}
