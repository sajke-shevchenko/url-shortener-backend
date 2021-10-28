<?php

namespace App\Http\Requests;

use App\DTO\PaginationData;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Page request.
 */
class PageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'page' => ['required', 'int'],
            'per_page' => ['required', 'int'],
        ];
    }

    /**
     * Returns pagination data.
     *
     * @return PaginationData
     */
    public function getPaginationData(): PaginationData
    {
        return new PaginationData([
            PaginationData::PAGE => (int)$this->get(PaginationData::PAGE),
            PaginationData::PER_PAGE => (int)$this->get(PaginationData::PER_PAGE),
        ]);
    }
}
