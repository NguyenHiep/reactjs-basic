<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        if(empty($this->request->get('slug')))
        {
            $this->request->set('slug',str_slug($this->request->get('name')));
        }
        return [
            'name'            => 'required|string|max:255|unique:books,name' . (($this->method() === 'PUT') ? ',' . $this->route()->parameter('book') : ''),
            'categories'      => 'required|array',
            'author'          => 'nullable|string|max:255',
            'slug'            => 'string|max:255',
            'name_dif'        => 'nullable|string|max:255',
            'image'           => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_link'      => 'nullable|url|string|max:255',
            'content'         => 'required|string|max:1024',
            'progress'        => 'required|integer',
            'teams_translate' => 'nullable|string|max:255',
            'sticky'          => 'required|integer|max:4',
            'views'           => 'nullable|integer',
            'status'          => 'required|integer|max:4',
            'created_by'      => 'integer|max:4',
        ];
    }

    public function attributes()
    {
        return [
            'name'        => 'tên truyện',
            'content'     => 'mô tả',
            'categories'  => 'thể loại'
        ];
    }
}
