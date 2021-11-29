<?php

namespace SkylarkSoft\GoRMG\Lab\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FabricbookingRequest extends FormRequest
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
            'supplier_id.required' => 'Supplier must not be is empty.',
            'buyer_id.required' => 'Buyer must not be is empty.',
            'season_id.required' => 'Season must not be is empty.',
            'fabric.required' => 'Fabric must not be is empty.',
//            'lc.required' => 'Lc must not be is empty.',
//            'zalopo_id.required' => 'Zalopo must not be is empty.',
//            'style_id.required' => 'Style must not be is empty.',
//            'fabriccomposition_id.required' => 'Fabric Composition must not be is empty.',
//            'color_id.required' => 'Color must not be is empty.',
//            'gsm.required' => 'Color must not be is empty.',
//            'dia.required' => 'Color must not be is empty.',
//            'booking_qty.required' => 'Booking Quantity must not be is empty.',
//            'value.required' => 'Value must not be is empty.',
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
            'buyer_id' =>'required',
            'supplier_id' => 'required',
            'season_id' => 'required',
            'fabric' => 'required',
            'lc' => 'required',
//            'zalopo_id' => 'required',
//            'style_id' => 'required',
//            'fabriccomposition_id' => 'required',
//            'color_id' => 'required',
//            'gsm'=>'required',
//            'dia'=>'required',
//            'booking_qty' => 'required',
//            'value' => 'required',


        ];
        return $rules;
    }
}
