<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDocenteRequest extends FormRequest
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
        return [
            
            // 'nombres'   =>'required|regex:/^[\pL\s\-]+$/u|max:30',
            // 'apellidos' =>'required|regex:/^[\pL\s\-]+$/u|max:30',
            // 'documento' => ['required','digits_between:8,10','min:8|max:10'],
            // 'telefono'  => 'required|digits:10',
            // 'direccion' =>['required','max:35'],
            // 'password'  => ['required','confirmed','min:8|max:20','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],//debe contener un numero, minuscula y mayuscula
            // 'lugarDeResidencia'=>'required|regex:/^[\pL\s\-]+$/u|max:40',
            'email'       =>'required|max:50|unique:docente,email',
            // 'id_escalafon'=>'required',
            // 'id_categoria'=>'required',
            // 'id_perfil'   =>'required',
            // 'id_nivel'    =>'required',
            'roles'       =>'required'
        ];
    }
}
