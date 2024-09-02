<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class VideoFormRequest extends FormRequest
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
            'title_video' => ['required', 'string' , 'min:2'],
            'video' => ['required', 'string' , 'min:10'],


        ];


    }

    protected function prepareForValidation()
    {
        $this->merge(
            [

                'title' => strip_tags($this->title),

            ]
        );
    }
}
