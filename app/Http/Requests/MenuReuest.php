<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuReuest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $menuId = $this->route('menu')->id;

        return [
            'title' => 'required|min:5|unique:menus,title,' . $menuId,
            'description' => 'required|min:5',
            'image' => 'image|mimes:png,jpg,jpeg|max:10250',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric'
        ];
    }
}
