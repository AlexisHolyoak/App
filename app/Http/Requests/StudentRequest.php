<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name'=> 'required',
           'dni' => 'required|max:12|min:8',
           'email' => 'required|email',
           'fechanacimiento' => 'date',
           'direccion' => 'required|min:5',
           'telefono' => 'number',
           'celular' => 'number|required',
           'especialidad' => 'required',
           'centrolaboral' => 'required',
           'discapacidad' => 'required'
           'conexion' => 'required',
           'comentarios' => 'max:250|min:10',
        ];
    }
}
