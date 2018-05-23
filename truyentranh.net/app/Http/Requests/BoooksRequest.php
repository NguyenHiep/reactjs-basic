<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoooksRequest extends FormRequest
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
        if(empty($this->request->get('created_by')))
        {
            $this->request->set('created_by', Auth::id());
        }
        return [
            'image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_link'  => 'nullable|url|string|max:255',
            'name'        => 'required|string|max:255|unique:books,name' . (($this->method() === 'PUT') ? ',' . $this->route()->parameter('slider') : ''),
            'content'     => 'required|string|max:255',
            'url'         => 'required|url|string|max:255',
            'category_id' => 'required|integer|max:4',
            'status'      => 'required|integer|max:4',
        ];
    }
}
