<?php

namespace SkylarkSoft\GoRMG\Lab\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockinRequest extends FormRequest
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
//            'buyer_id.required' => 'Buyer is required.',
//            'style_id.required' => 'Style is required.',
//            'zalopo_id.required' => 'Zalopo is required.',
//            'invoice_no.required' => 'Booking No is required.',
//            'date_tb.required' => 'Booking No is required.',
//            'roll_no.required' => 'Booking No is required.',
//            'racklist_id.required' => 'Booking No is required.',
//            'pattern_no.required' => 'Booking No is required.',
//            'lot_no.required' => 'Booking No is required.',
//            'receiving_qty.required' => 'Booking No is required.',
//            'uom_id.required' => 'Booking No is required.'
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
//            'buyer_id' => 'required',
//            'style_id' => ['required', 'max:50'],
//            'zalopo_id' => 'required',
//            'invoice_no' => 'required',
//            'date_tb' => 'required',
//            'roll_no' => 'required',
//            'racklist_id' => 'required',
//            'pattern_no' => 'required',
//            'lot_no' => 'required',
//            'receiving_qty' => 'required',
//            'uom_id' => 'required'
        ];
        return $rules;
    }
}
