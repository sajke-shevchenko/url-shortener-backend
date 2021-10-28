<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class UrlCollection extends BaseCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return array_merge(parent::toArray($request), [
            'results' => UrlResource::collection($this),
        ]);
    }
}
