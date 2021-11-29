<?php

namespace SkylarkSoft\GoRMG\Lab\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use SkylarkSoft\GoRMG\Lab\Rules\UniqueRequisitionForWorkSheetRule;

class WorkSheetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation messages that apply to the erroneous request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'requisition_id.required' => 'The TRF No is required.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'requisition_id' => ['required'],
        ];
    }
}
