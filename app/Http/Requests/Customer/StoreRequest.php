<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'name_en' => 'required|max:150',
            'name_bn' => 'required|max:150',
            'father_name_en' => 'nullable|max:150',
            'father_name_bn' => 'nullable|max:150',
            'phone' => 'required','max:11','min:11',Rule::unique('customers'),
            'trade_name_en' => 'required|max:150',
            'trade_name_bn' => 'required|max:150',
            'address' => 'required|max:150',
            'customer_type_id' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
        ];
    }
}
