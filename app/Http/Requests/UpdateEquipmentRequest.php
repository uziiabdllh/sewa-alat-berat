<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentRequest extends FormRequest
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
     */
    public function rules(): array
    {
        $equipmentId = $this->route('equipment')->id;

        return [
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|string|max:50|unique:equipments,code,' . $equipmentId,
            'name' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'year' => 'required|digits:4',
            'daily_price' => 'required|numeric|min:0',
            'status' => 'required|in:available,rented,maintenance',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
        ];
    }
}