<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
           'name'     => 'required|max:50',
           'document' => 'nullable|file|mimetypes:image/jpeg,image/gif,application/pdf',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'       => 'Document naam is verplicht',
            'name.max'            => 'Naam mag niet langer zijn dan vijftig tekens.',
            'document.mimetypes'  => 'File mag alleen van het type pdf en jpeg',
        ];
    }
}
