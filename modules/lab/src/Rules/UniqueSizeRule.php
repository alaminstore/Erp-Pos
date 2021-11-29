<?php

namespace SkylarkSoft\GoRMG\Lab\Rules;

use Illuminate\Contracts\Validation\Rule;
use SkylarkSoft\GoRMG\Lab\Models\Size;

class UniqueSizeRule implements Rule
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

        $size = Size::where('name', $value);

        if (request()->route('id')) {
            $size = $size->where('id', '!=', request()->route('id'));
        }

        $size = $size->first();

        return $size ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This size already exists.';
    }
}
