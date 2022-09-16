<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DeveloperTesterUnique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($developers, $testers)
    {
        $this->developers = $developers;
        $this->testers = $testers;
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
        if (count(array_unique($this->developers)) != 3) {

            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Each developers must be unique';
    }
}