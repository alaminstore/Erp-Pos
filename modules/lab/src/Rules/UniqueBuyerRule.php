<?php

namespace SkylarkSoft\GoRMG\Lab\Rules;

use Illuminate\Contracts\Validation\Rule;
use SkylarkSoft\GoRMG\Lab\Models\Buyer;

class UniqueBuyerRule implements Rule
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

        $buyer = Buyer::where('name', $value);

        if (request()->route('id')) {
            $buyer = $buyer->where('id', '!=', request()->route('id'));
        }

        $buyer = $buyer->first();

        return $buyer ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This buyer already exists.';
    }
}
