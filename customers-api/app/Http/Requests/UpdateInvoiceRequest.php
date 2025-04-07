<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInvoiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }

    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'customerId' => ['required', 'integer'],
                'amount' => ['required', 'numeric'],
                'status' => ['required', Rule::in(['B', 'P', 'V', 'b', 'p', 'v'])],
                'billedDate' => ['required', 'date_format:Y-m-d H:i:s'],
                'paidDate' => ['required', 'date_format:Y-m-d H:i:s'],
            ];
        }

        return [
            'customerId' => ['sometimes', 'required', 'integer'],
            'amount' => ['sometimes', 'required', 'numeric'],
            'status' => ['sometimes', 'required', Rule::in(['B', 'P', 'V', 'b', 'p', 'v'])],
            'billedDate' => ['sometimes', 'required', 'date_format:Y-m-d H:i:s'],
            'paidDate' => ['sometimes', 'required', 'date_format:Y-m-d H:i:s'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'customer_id' => $this->customerId,
            'billed_date' => $this->billedDate,
            'paid_date' => $this->paidDate,
        ]);
    }
}
