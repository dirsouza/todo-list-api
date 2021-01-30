<?php

namespace App\Providers;

use App\Rules\ValidIfNullOrFalseRule;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('valid_if_null_or_false', function ($attribute, $value, $parameters, $validator) {
            list($field) = $parameters;
            $fieldValue =Arr::get($validator->getData(), $field);
            return (new ValidIfNullOrFalseRule($fieldValue))->passes($attribute, $value);
        });

        Validator::replacer('valid_if_null_or_false', function ($message, $attribute, $rule, $parameters, $validator) {
            list($field) = $parameters;
            $field = Arr::get($validator->customAttributes, $field);
            return str_replace(':field', $field, $message);
        });
    }
}
