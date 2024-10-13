<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
{
    // Determina si el usuario está autorizado para hacer esta solicitud
    public function authorize()
    {
        return true;
    }

    // Reglas de validación para la solicitud
    public function rules()
    {
        return [
            'nombre' => 'required|alpha|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|string|min:10|max:200'
        ];
    }

    // Mensajes personalizados para las reglas de validación
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.alpha' => 'El nombre solo debe contener letras.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El formato del email no es válido.',
            'mensaje.required' => 'El mensaje es obligatorio.',
            'mensaje.min' => 'El mensaje debe tener al menos 10 caracteres.',
            'mensaje.max' => 'El mensaje no puede exceder los 200 caracteres.'
        ];
    }
}
