<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitUpdateRequest extends FormRequest
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
            'unit_identity' => 'required|string|max:20|unique:units,unit_identity,' . $this->id,
            'unit_name' => 'required|string|max:255',
            'unit_description' => 'nullable',
            'owner_id' => 'required',
        ];
    }
}
