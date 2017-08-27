<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreRecipe extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'category' => 'required|exists:recipe_category,id',
            'prep_time' => 'required|numeric',
            'cook_time' => 'required|numeric',
            'instructions' => 'required',
            'ingredients.*.id' => 'exists:ingredients',
            'ingredients.*.amount' => 'required|numeric|min:1',
            'ingredients.*.measurement' => 'required|exists:measurements,id',
        ];
    }

    public function messages()
    {
        return [
          'ingredients.*.id.exists' => 'No such ingredient.',
          'ingredients.*.measurement.exists' => 'No such measurements.'
        ];
    }

    // public function failedValidation(Validator $validator)
    // {
    //     dd($this->formatErrors($validator));
    // }
}
