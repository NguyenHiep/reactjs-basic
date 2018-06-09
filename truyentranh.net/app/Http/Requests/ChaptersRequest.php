<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChaptersRequest extends FormRequest
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
            'book_id'         => 'required|integer',
            'name'            => 'required|string|max:255|unique:chapters,name' . (($this->method() === 'PUT') ? ',' . $this->route()->parameter('chapter') : ''),
            'episodes'        => 'string|max:255',
            'slug'            => 'string|max:255',
            'content'         => 'required|string',
            'sticky'          => 'required|integer|max:4',
            'views'           => 'nullable|integer',
            'status'          => 'required|integer|max:4',
            'created_by'      => 'integer|max:4',
            'seo_title'       => 'nullable|string|max:255',
            'seo_slug'        => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'seo_keywords'    => 'nullable|string|max:255',
        ];
    }
}
