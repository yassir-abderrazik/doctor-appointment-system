<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class timetableRequest extends FormRequest
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
            'isAvailableOnMonday' => 'required|boolean',
            'mondayStartingTime' => 'requiredIf:isAvailableOnMonday,==,1|nullable|date_format:H:i',
            'mondayClosingTime' => 'requiredIf:isAvailableOnMonday,==,1|nullable|date_format:H:i',
            
            'isAvailableOnTuesday' => 'required|boolean',
            'tuesdayStartingTime' => 'requiredIf:isAvailableOnTuesday,==,1|nullable|date_format:H:i',
            'tuesdayClosingTime' => 'requiredIf:isAvailableOnTuesday,==,1|nullable|date_format:H:i',
            
            'isAvailableOnWednesday' => 'required|boolean',
            'wednesdayStartingTime' => 'requiredIf:isAvailableOnWednesday,==,1|nullable|date_format:H:i',
            'wednesdayClosingTime' => 'requiredIf:isAvailableOnWednesday,==,1|nullable|date_format:H:i',
            
            'isAvailableOnThursday' => 'required|boolean',
            'thursdayStartingTime' => 'requiredIf:isAvailableOnThursday,==,1|nullable|date_format:H:i',
            'thursdayClosingTime' => 'requiredIf:isAvailableOnThursday,==,1|nullable|date_format:H:i',
            
            'isAvailableOnFriday' => 'required|boolean',
            'fridayStartingTime' => 'requiredIf:isAvailableOnFriday,==,1|nullable|date_format:H:i',
            'fridayClosingTime' => 'requiredIf:isAvailableOnFriday,==,1|nullable|date_format:H:i',
            
            
            'isAvailableOnSaturday' => 'required|boolean',
            'saturdayStartingTime' => 'requiredIf:isAvailableOnSaturday,==,1|nullable|date_format:H:i',
            'saturdayClosingTime' => 'requiredIf:isAvailableOnSaturday,==,1|nullable|date_format:H:i',
            
            
            'isAvailableOnSunday' => 'required|boolean',
            'saturdayStartingTime' => 'requiredIf:isAvailableOnSunday,==,1|nullable|date_format:H:i',
            'saturdayClosingTime' => 'requiredIf:isAvailableOnSunday,==,1|nullable|date_format:H:i',
              
            'timeConsultation' => 'required',
        ];
    }
    
}
