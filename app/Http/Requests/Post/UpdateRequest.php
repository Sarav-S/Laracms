<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends StoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = decode(request()->segment(3));

        return [
            'title'          => 'required|max:255',
            'slug'           => 'required|max:255|unique:posts,slug,'.$id,
            'description'    => 'required',
            'category_id'    => 'nullable|exists:categories,id',
            'featured_image' => 'nullable|image'
        ];
    }
}
