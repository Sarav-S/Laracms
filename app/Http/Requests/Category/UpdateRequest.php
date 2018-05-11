<?php

namespace App\Http\Requests\Category;

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
            'name'   => 'required|max:255|unique:categories,name,'.$id,
            'status' => 'required'
        ];
    }
}
