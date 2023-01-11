<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearLogrosRequest extends FormRequest
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
            
            'logro1'       =>'required|unique:logro,logro1',
            'logro2'       =>'required|unique:logro,logro2',
            'logro3'       =>'required|unique:logro,logro3',
            'logro4'       =>'required|unique:logro,logro4',
            'logro5'       =>'required|unique:logro,logro5',
            'logro6'       =>'required|unique:logro,logro6',
        ];
    }
}
