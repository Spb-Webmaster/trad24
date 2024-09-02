<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateFormRequest extends FormRequest
{
    /** ok
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string' , 'min:2'],
            'phone' => ['string', 'min:5',  Rule::unique('users')->ignore(auth()->user()->id)],
            'birthdate' => ['date', 'nullable'],
            'id' => ['required','integer'],
        ];


    }

    protected function prepareForValidation()
    {
        $this->merge(
            [
                'email' => str(request('email'))
                    ->squish()
                    ->lower()
                    ->value(),
                'phone' => phone($this->phone),
                'birthdate' => birthdate($this->birthdate),

            ]
        );
    }
}
