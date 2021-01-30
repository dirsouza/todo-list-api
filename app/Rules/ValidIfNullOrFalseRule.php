<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidIfNullOrFalseRule implements Rule
{
    protected $fieldValue;

    /**
     * Create a new rule instance.
     *
     * @param mixed $fieldValue
     */
    public function __construct($fieldValue)
    {
        $this->fieldValue = $fieldValue;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !($value === $this->fieldValue);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('messages.tasks.validation.valid_if_null_or_false', ['attribute' => ':attribute', 'field' => ':field']);
    }
}
