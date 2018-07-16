<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name'         => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:users,email' . (($this->method() === 'PUT') ? ',' . $this->route()->parameter('user') : ''),
            'new_password' => 'nullable|string|min:6|confirmed',
            'avatar'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=200',
            'level'        => 'required|integer|max:4',
            'fullname'     => 'required|string|max:191',
            'card'         => 'nullable|numeric|digits:11',
            'phone'        => 'nullable|numeric|digits_between:10,15',
            'birthday'     => 'nullable|date_format:d/m/Y',
            "sign"         => "nullable|string",
            'status'       => 'required|integer|max:4',
        ];
    }

    public function attributes()
    {
        return [
            'name'   => 'Tên đăng nhập',
            'status' => 'Trạng thái',
        ];
    }
}
