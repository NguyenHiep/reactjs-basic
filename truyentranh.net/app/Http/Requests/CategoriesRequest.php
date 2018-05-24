<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
        if(empty($this->request->get('slug')))
        {
            $this->request->set('slug', str_slug($this->request->get('name')));
        }
        return [
            'name'      => 'required|string|max:255|unique:categories,name'. (($this->method() === 'PUT') ? ',' . $this->route()->parameter('category') : ''),
            'status'     => 'required|integer|max:4',
        ];
    }

    public function attributes()
    {
        return [
          'name' => 'thể loại'
        ];
    }
}
