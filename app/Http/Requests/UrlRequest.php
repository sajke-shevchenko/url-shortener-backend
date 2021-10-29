<?php

namespace App\Http\Requests;

use App\DTO\UrlData;
use App\Models\Url;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Url request.
 */
class UrlRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            Url::TARGET => ['required', 'string', 'max:255'],
            Url::SHORT => ['string', 'max:255', 'unique:urls', 'nullable'],
            Url::COMMERCIAL => ['required', 'boolean'],
            Url::EXPIRED_AT => ['required', 'date', 'after:now'],
        ];
    }

    /**
     * Returns the url data.
     *
     * @return UrlData
     */
    public function getUrlData(): UrlData
    {
        return new UrlData([
            Url::TARGET => $this->get(Url::TARGET),
            Url::SHORT => $this->get(Url::SHORT),
            Url::COMMERCIAL => $this->get(Url::COMMERCIAL),
            Url::EXPIRED_AT => $this->get(Url::EXPIRED_AT),
        ]);
    }
}
