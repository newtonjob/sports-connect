<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $unique = Rule::unique('users')->ignore($this->user);

        return [
            'email'            => ['email', $unique],
            'phone'            => ['min:10', $unique],
            'username'         => ['min:5', $unique],
            'password'         => 'confirmed|min:5',
            'current_password' => 'required_with:password|current_password',
        ];
    }
}
