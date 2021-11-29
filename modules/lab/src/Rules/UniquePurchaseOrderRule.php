<?php

namespace SkylarkSoft\GoRMG\Lab\Rules;

use Illuminate\Contracts\Validation\Rule;
use SkylarkSoft\GoRMG\Lab\Models\PurchaseOrder;

class UniquePurchaseOrderRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return bool
     */
    public function __construct()
    {
        return auth()->check();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = strtoupper($value);

        $purchase_order = PurchaseOrder::where('name', $value);

        if (request()->route('id')) {
            $purchase_order = $purchase_order->where('id', '!=', request()->route('id'));
        }

        $purchase_order = $purchase_order->first();

        return $purchase_order ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This purchase order already exists.';
    }
}
