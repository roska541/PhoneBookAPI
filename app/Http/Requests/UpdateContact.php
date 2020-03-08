<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContact extends FormRequest
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
        $id = $this->request->get('id');
        return [
            'first_name' => 'max:255',
            'last_name' => 'max:255',
            'address' => 'string',
            'company' => 'string',
            'phone_number' => 'string|phone|unique:contacts,phone_number,'.$id,
        ];
    }
}
