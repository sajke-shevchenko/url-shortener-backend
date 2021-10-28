<?php

namespace App\Services;

use App\DTO\VisitData;
use App\Exceptions\ServiceException;
use App\Models\Url;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Visit business-logic service.
 */
class VisitService
{
    /**
     * Record a user visit.
     *
     * @param VisitData $visitData Visit data to create
     *
     * @return Visit|Model
     *
     * @throws ServiceException
     */
    public function create(VisitData $visitData, Url $url): Visit
    {
        if ($url->expired_at <= Carbon::now()) {
            throw new ServiceException("That short url was expired.");
        }

        $visit = new Visit($visitData->toArray());
        $visit->url()->associate($url);

        if ($url->commercial) {
            $images = Storage::disk('images')->allFiles();
            $visit->image_url = $images[array_rand($images)];
        }

        $visit->save();

        return $visit;
    }
}
