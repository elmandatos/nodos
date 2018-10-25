<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    public $rules = [
        "nombres" => "required",
        "apellidos" => "required",
        "telefono" => "required",
        "email" => "required|email",
        "carrera" => "required",
        "rol" => "required",
        "matricula" => "",
        "tipoDeUsuario" => "required|in:administrador,asistente,usuario",
        "foto" => "",
    ];

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
        if($this->__isset("password")){
            $this->rules["password"] = "required";
            $this->rules["confirmarContraseña"] = "required";
            // dd($this->rules);
        }
        // echo "nada";
        return $this->rules;
    }
}
