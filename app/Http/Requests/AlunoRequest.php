<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'curso' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome do aluno.',
            'nome.string' => 'O nome deve ser um texto.',
            'nome.max' => 'O nome deve ter no máximo 255 caracteres.',
            'email.required' => 'Informe o email do aluno.',
            'email.email' => 'Informe um email válido.',
            'email.max' => 'O email deve ter no máximo 255 caracteres.',
            'curso.required' => 'Informe o curso do aluno.',
            'curso.string' => 'O curso deve ser um texto.',
            'curso.max' => 'O curso deve ter no máximo 255 caracteres.',
        ];
    }
}
