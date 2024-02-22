<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Precisamos passar o valor TRUE para validar
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            // Passo os valores como required, para ser algo obrigatório, e a quantidade de caractéres, e defino seu valor como único.
            'subject' => 'required|min:3|max:255|unique:supports',

            //Passo os valores como required, para ser algo obrigatório, e a quantidade de caractéres,porém com um array, pois também consigo.
            'body' => [
                'required',
                'min:3',
                'max:1000',
            ]
        ];

        if($this->method() === 'PUT' || $this->method() === 'PATCH') {
           // $id = $this->support ?? $this->id; Método alternativo
            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                //Quando eu for tentar editar o próprio assunto e for o mesmo permita, mas se eu for colocar o mesmo assunto em outro tópico não aceite
                //"unique:supports,subject,{$this->id},id",
                Rule::unique('supports')->ignore($this->support ?? $this->id),
            ];
        }
        return $rules;
    }
}
