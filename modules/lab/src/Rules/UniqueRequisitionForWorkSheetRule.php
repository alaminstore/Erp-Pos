<?php

namespace SkylarkSoft\GoRMG\Lab\Rules;

use Illuminate\Contracts\Validation\Rule;
use SkylarkSoft\GoRMG\Lab\Models\FabricTestWorkSheet;

class UniqueRequisitionForWorkSheetRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return mixed
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

        $fabric_test_work_sheet = FabricTestWorkSheet::where('requisition_id', $value);

        if (request()->route('requisition_id')) {
            $fabric_test_work_sheet = $fabric_test_work_sheet->where('requisition_id', '!=', request()->route('requisition_id'));
        }

        $fabric_test_work_sheet = $fabric_test_work_sheet->first();

        return $fabric_test_work_sheet ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The work sheet for given TRF No already exists.';
    }
}
