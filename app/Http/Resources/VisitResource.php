<?php

namespace App\Http\Resources;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitResource extends JsonResource
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
            Visit::IP_ADDRESS => $this->ip_address,
            Visit::IMAGE_URL => $this->image_url,
            Visit::CREATED_AT => $this->created_at,
            'url' => new UrlResource($this->url),
        ];
    }
}
