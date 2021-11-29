<?php

namespace SkylarkSoft\GoRMG\Lab\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockoutRequest extends FormRequest
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
//            'delivery.required' => 'Delivery is required.',
//            'req_no.required' => 'Request No is required.',
//            'date.required' => 'Booking No is required.',
//            'buyer.required' => 'Buyer is required.',
//            'style.required' => 'Style is required.',
//            'zalopo.required' => 'Zalopo is required',
//            'racklist.required' => 'Booking No is required.',
//            'pattern_no.required' => 'Booking No is required.',
//            'color.required' => 'Booking No is required.',
//            'fabric_comp.required' => 'Booking No is required.',
//            'uom.required' => 'Booking No is required.',
//            'lot_no.required' => 'Booking No is required.',
//            'dia.required' => 'Dia is required.',
//            'roll_no.required' => 'Booking No is required.',
//            'delivery_qty.required' => 'Delivery Quantity is required.'
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
//            'delivery'=>'required',
//            'req_no'=>'required',
//            'date' => 'required',
//            'buyer' => 'required',
//            'style' => ['required', 'max:50'],
//            'zalopo' => 'required',
//            'racklist' => 'required',
//            'pattern_no' => 'required',
//            'color' => 'required',
//            'fabric_comp' => 'required',
//            'uom' => 'required',
//            'lot_no' => 'required',
//            'dia' => 'required',
//            'roll_no' => 'required',
//            'delivery_qty' => 'required'
        ];
        return $rules;
    }
}
