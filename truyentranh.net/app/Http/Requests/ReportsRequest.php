<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportsRequest extends FormRequest
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
            'content' => 'required|string',
            'status'  => 'required|integer|max:4',
        ];
    }

    public function attributes()
    {
        return [
          'content' => 'Nội dung',
          'status'  => 'Trạng thái',
        ];
    }
}
