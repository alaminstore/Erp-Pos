<?php

namespace SkylarkSoft\GoRMG\Lab\Rules;

use Illuminate\Contracts\Validation\Rule;
use SkylarkSoft\GoRMG\Lab\Models\Style;

class UniqueBookingRule implements Rule
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

        $style = Style::where('booking_no', $value);

        if (request()->route('id')) {
            $style = $style->where('id', '!=', request()->route('id'));
        }

        $style = $style->first();

        return $style ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This Booking No already exists.';
    }
}
