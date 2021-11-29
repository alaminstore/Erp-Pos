<?php

namespace SkylarkSoft\GoRMG\Lab\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
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
     * Get the validation messages that apply to the erroneous request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'company_id.required' => 'Company field is required.',
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
            'first_name' => 'required|max:50',
            'department' => 'nullable',
            'company_id' => 'nullable|numeric',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'email' => 'required|max:55|unique:users,email,' . request()->route('id'),
        ];
        return $rules;
    }
}
