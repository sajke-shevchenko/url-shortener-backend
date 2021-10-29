<?php

namespace App\Services;

use App\DTO\PaginationData;
use App\DTO\UrlData;
use App\Models\Url;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Env;
use Illuminate\Support\Str;

/**
 * Url business-logic service.
 */
class UrlService
{
    /**
     * Get all urls.
     *
     * @param PaginationData $paginationData Pagination data
     *
     * @return LengthAwarePaginator
     */
    public function all(PaginationData $paginationData): LengthAwarePaginator
    {
        return Url::query()->orderByDesc(Url::CREATED_AT)
            ->paginate($paginationData->per_page, ['*'], 'page', $paginationData->page);
    }

    /**
     * Create a new url.
     *
     * @param UrlData $urlData Url data to create
     *
     * @return Url|Model
     *
     * @throws Exception
     */
    public function create(UrlData $urlData): Url
    {
        $url = new Url($urlData->toArray());
        $url->short = $url->short ?: Str::random(6);
        $url->save();

        return $url;
    }

    /**
     * Returns the stats url.
     *
     * @param Url $url The url to get stats url
     *
     * @return string
     */
    public function getStatsUrl(Url $url): string
    {
        return Env::get('APP_URL') . "/urls/$url->id";
    }

    /**
     * Returns url model by given short.
     *
     * @param string $short The short to get url
     *
     * @return Url|Model
     */
    public function getUrlByShort(string $short): Url
    {
        return Url::query()->where(Url::SHORT, '=', $short)->firstOrFail();
    }
}
