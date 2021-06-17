<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use \App\Models\Shoe;

class ShoeSKU implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($shoe_id)
    {
        $this->shoe_id = $shoe_id;
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
       return (Shoe::where('sku', $value)->doesntExist() || ($sku = Shoe::where('id', $this->shoe_id)->first()->sku) == $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The SKU should be unique or same as old SKU';
    }
}
