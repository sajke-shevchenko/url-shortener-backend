<?php

namespace App\Http\Resources;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            Url::SHORT => $this->getShortUrl(),
            Url::TARGET => $this->target,
            Url::CREATED_AT => $this->created_at,
            Url::EXPIRED_AT => $this->expired_at,
            'history' => $this->visits,
            'unique_count' => $this->getUniqueVisits(),
        ];
    }
}
