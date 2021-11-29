<?php

namespace SkylarkSoft\GoRMG\Lab\Rules;

use Illuminate\Contracts\Validation\Rule;
use SkylarkSoft\GoRMG\Lab\Models\Color;

class UniqueColorRule implements Rule
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

        $color = Color::where('name', $value);

        if (request()->route('id')) {
            $color = $color->where('id', '!=', request()->route('id'));
        }

        $color = $color->first();

        return $color ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This color already exists.';
    }
}
