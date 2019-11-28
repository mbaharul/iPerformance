<?php

namespace App\Http\Requests\Backend\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class DepartmentStoreRequest extends FormRequest
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
        $rules = $this->rules;
        $weightage = Input::get('weightage');
        $weightageTotal = (string)(array_sum($weightage));
        
        $rules = [
            'weightage.*' => 'sometimes|required',
            'weightageTotal' => "in:$weightageTotal",
        ];
        
        return $rules;
    }

    public function messages()
    {
        $weightage = Input::get('weightageTotal');
        
        return [
            'weightage.*.required' => 'Weightage field is required. Please put 0 if not relevant',
            'weightageTotal.in' => "Total percent of weightage must be $weightage%",
        ];
    }
}
