<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validateDateTime implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($params)
    {

        $this->a = $params[0];
        $this->b = $params[1];
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
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        dd("ok");
        //return 'The validation error message.';
    }
}