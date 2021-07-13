<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use \App\Models\User;

class UserContact implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
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
        return (User::where('contact_number', $value)->doesntExist() || ($contact_number = User::where('user_id', $this->user_id)->first()->contact_number) == $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Contact Number should be unique or same as old one';
    }
}
