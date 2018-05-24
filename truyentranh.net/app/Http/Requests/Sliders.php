<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Sliders extends FormRequest
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
        if(empty($this->request->get('user_id')))
        {
            $this->request->set('user_id', Auth::id());
        }
        return [
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_link' => 'nullable|url|string|max:255',
            'title'      => 'required|string|max:255|unique:sliders,title'. (($this->method() === 'PUT') ? ',' . $this->route()->parameter('slider') : ''),
            'content'    => 'required|string|max:255',
            'url'        => 'required|url|string|max:255',
            'position'   => 'required|integer|max:4',
            'target'     => 'required|integer|max:4',
            'status'     => 'required|integer|max:4',
        ];
    }

    public function attributes()
    {
        return [
            'title'    => 'tiêu đề',
            'content'  => 'nội dung',
            'position' => 'vị trí',
            'status'   => 'trạng thái',
        ];
    }
}
