<?php

namespace App\Http\Requests;

use App\DTO\VisitData;
use App\Models\Visit;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Visit request.
 */
class VisitRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * Returns the visit data.
     *
     * @return VisitData
     */
    public function getVisitData(): VisitData
    {
        return new VisitData([
            Visit::IP_ADDRESS => $this->ip(),
        ]);
    }
}
