<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:100',
            'description' => 'nullable|min:5',
            'archived' => 'nullable|boolean|valid_if_null_or_false:completed',
            'completed' => 'nullable|boolean|valid_if_null_or_false:archived'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => trans('messages.tasks.title'),
            'description' => trans('messages.tasks.description'),
            'archived' => trans('messages.tasks.archived'),
            'completed' => trans('messages.tasks.completed')
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => trans('messages.tasks.validation.required', ['attribute' => ':attribute']),
            'min' => trans('messages.tasks.validation.min', ['attribute' => ':attribute', 'min' => ':min']),
            'max' => trans('messages.tasks.validation.max', ['attribute' => ':attribute', 'max' => ':max']),
            'boolean' => trans('messages.tasks.validation.boolean', ['attribute' => ':attribute']),
            'valid_if_null_or_false' => trans('messages.tasks.validation.valid_if_null_or_false', ['attribute' => ':attribute', 'field' => ':field'])
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(Response()->json([
            'success' => false,
            'message' => $validator->errors()->unique(),
            'data' => null,
        ], 422));
    }
}
