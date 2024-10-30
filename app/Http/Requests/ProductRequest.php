<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->route()->getName() === 'bulk_insert') {
            return $this->bulkInsertRules();
        }

        if ($this->route()->getName() === 'update_data_bulk') {
            return $this->bulkUpdateRules();
        }

        return $this->singleInsertRules();
    }

    private function singleInsertRules(): array
    {
        return [
            'phone_name' => 'required|string',
            'seller_id' => 'required|exists:sellers,id',
            'display_size' => 'required|numeric',
            'quantity' => 'required|integer',
            'cost' => 'required|numeric',
        ];
    }

    private function bulkInsertRules(): array
    {
        return [
            'products' => 'required|array',
            'products.*.phone_name' => 'required|string',
            'products.*.seller_id' => 'required|exists:sellers,id',
            'products.*.display_size' => 'required|numeric',
            'products.*.quantity' => 'required|integer',
            'products.*.cost' => 'required|numeric',
        ];
    }

    private function bulkUpdateRules(): array
    {
        return [
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:products,id',
            'cost' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'phone_name.required' => 'The phone name is required.',
            'seller_id.required' => 'The seller ID is required.',
            'seller_id.exists' => 'The provided seller ID does not exist.',
            'display_size.required' => 'The display size is required.',
            'quantity.required' => 'The quantity is required.',
            'cost.required' => 'The cost is required.',
            'products.required' => 'The products array is required for bulk insert.',
            'ids.required' => 'The IDs array is required for bulk update.',
            'ids.*.exists' => 'One or more product IDs do not exist.',
        ];
    }
}
