<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'project_id' => ['required', 'integer', 'exists:projects.id,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:pendiente,en_progreso,completado'],
            'due_date' => ['nullable', 'date'],
            'belongsTo' => ['required', 'string'],
        ];
    }

    public function attributes(){
        return [
            'name' => 'nombre',
            'description' => 'descripcion',
            'status' => 'estado',
        ];
    }
}
