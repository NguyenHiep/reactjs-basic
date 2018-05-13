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
            'image_path' => 'image|mimes:jpeg,bmp,png',
            'image_link' => 'max:255',
            'title'      => 'required|max:255',
            'content'    => 'required|max:255',
            'url'        => 'max:255',
            'position'   => 'required|integer|max:4',
            'target'     => 'required|integer|max:4',
            'status'     => 'required|integer|max:4',
        ];
    }
}
