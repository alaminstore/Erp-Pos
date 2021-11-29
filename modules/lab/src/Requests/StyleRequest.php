<?php

namespace SkylarkSoft\GoRMG\Lab\Requests;

use Illuminate\Foundation\Http\FormRequest;
use SkylarkSoft\GoRMG\Lab\Rules\UniqueStyleRule;
use SkylarkSoft\GoRMG\Lab\Rules\UniqueBookingRule;

class StyleRequest extends FormRequest
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
            'buyer_id.required' => 'Buyer is required.',
            'name.required' => 'Style is required.',
            'booking_no.required' => 'Booking No is required.',
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
            'name' => 'required',
            'style' => ['required', 'max:50', new UniqueStyleRule()],

        ];
        return $rules;
    }
}
