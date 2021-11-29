<?php

namespace SkylarkSoft\GoRMG\Lab\Requests;

use Illuminate\Foundation\Http\FormRequest;
use SkylarkSoft\GoRMG\Lab\Rules\UniqueBuyerRule;

class FabriccompositionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation messages that apply to the erroneous request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Fabric Composition is required.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'max:50'],
        ];
        return $rules;
    }
}
