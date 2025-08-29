<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check(); // 登录就允许；如要更细角色之后再加 Policy
    }

    public function rules(): array
    {
        $id = $this->route('product')?->id;

        return [
            'title'       => ['required','string','max:150'],
            'slug'        => ['nullable','string','max:160',"unique:products,slug,{$id}"],
            'price_cents' => ['required','integer','min:0','max:99999999'],
            'stock'       => ['required','integer','min:0','max:1000000'],
            'description' => ['nullable','string','max:5000'],
        ];
    }
}
