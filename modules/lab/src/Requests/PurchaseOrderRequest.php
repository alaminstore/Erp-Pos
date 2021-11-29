<?php

namespace SkylarkSoft\GoRMG\Lab\Requests;

use Illuminate\Foundation\Http\FormRequest;
use SkylarkSoft\GoRMG\Lab\Rules\UniquePurchaseOrderRule;

class PurchaseOrderRequest extends FormRequest
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
            'style_id.required' => 'Booking no is required.',
            'name.required' => 'Purchase Order is required.',
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
            'buyer_id' => 'required',
            'style_id' => 'required',
            'name' => ['required', 'max:50', new UniquePurchaseOrderRule()],
        ];
        return $rules;
    }
}
