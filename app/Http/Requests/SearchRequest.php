<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SearchRequest
 * @package App\Http\Requests
 */
class SearchRequest extends FormRequest
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
        return [
            'name' => 'present|nullable|string|max:255',
            'min_price' => 'present|nullable|integer',
            'max_price' => 'present|nullable|integer',
            'bedrooms' => 'present|nullable|integer',
            'bathrooms' => 'present|nullable|integer',
            'storeys' => 'present|nullable|integer',
            'garages' => 'present|nullable|integer'
        ];
    }
}
