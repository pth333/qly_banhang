<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // bail dùng để lỗi ở đâu thì dừng hiển thị lỗi ở đó
            'name' => 'bail|required|unique:products|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'name.unique' => 'Tên không được phép để trùng',
            'name.max' => 'Tên không được phép quá 255 ký tự',
            'price.required' => 'Giá không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'content.required' => 'Nội dung không được để trống',
        ];
    }
}
