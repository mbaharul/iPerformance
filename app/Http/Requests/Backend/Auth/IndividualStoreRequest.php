<?php

namespace App\Http\Requests\Backend\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class IndividualStoreRequest extends FormRequest
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
        if(is_array($weightage))
            $weightage = (string)(array_sum($weightage));

        $new_weightage = Input::get('new_weightage');
        if(is_array($new_weightage))
            $new_weightage = (string)(array_sum($new_weightage));

        $weightageTotal = $weightage + $new_weightage;
        
        $rules = [
            'kpi_objective.*' => 'sometimes|required',
            'weightage.*' => 'sometimes|required',
            'measurement.*' => 'sometimes|required',
            'base.*' => 'sometimes|required',
            'stretched_target.*' => 'sometimes|required',
            'mid_year.*' => 'sometimes|required',
            'year_end.*' => 'sometimes|required',
            'new_kpi_objective.*' => 'sometimes|required',
            'new_weightage.*' => 'sometimes|required',
            'new_measurement.*' => 'sometimes|required',
            'new_base.*' => 'sometimes|required',
            'new_stretched_target.*' => 'sometimes|required',
            'weightageTotal' => "in:$weightageTotal",
            'new_goal.*' => 'sometimes|required',
        ];
        
        //checking at least 1 goal type is quality
        $goal = Input::get('goal_type');
        if(isset($goal)){
            if(!in_array(5, $goal)){
                $rules['goal'] = 'required';
            }
        }
        
        return $rules;
    }

    public function messages()
    {
        $weightage = Input::get('weightageTotal');
        
        return [
            'kpi_objective.*.required' => 'Goal field is required',
            'weightage.*.required' => 'Weightage field is required',
            'measurement.*.required' => 'Measurement field is required',
            'base.*.required' => 'Base field is required',
            'stretched_target.*.required' => 'Stretched_target field is required',
            'mid_year.*.required' => 'Mid Year field is required',
            'year_end.*.required' => 'Year End field is required',
            'new_kpi_objective.*.required' => 'Goal field is required',
            'new_weightage.*.required' => 'Weightage field is required',
            'new_measurement.*.required' => 'Measurement field is required',
            'new_base.*.required' => 'Base field is required',
            'new_stretched_target.*.required' => 'Stretched_target field is required',
            'weightageTotal.in' => "Total percent of weightage must be $weightage%",
            'goal.required' => 'At least one goal type must be Quality',
        ];
    }
}
