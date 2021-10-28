<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Http\Requests\UrlRequest;
use App\Http\Resources\UrlCollection;
use App\Http\Resources\UrlResource;
use App\Models\Url;
use App\Services\UrlService;
use Exception;

class UrlController extends Controller
{
    /**
     * Url business-logic service.
     *
     * @var UrlService
     */
    private $urlService;

    /**
     * Url CRUD controller.
     *
     * @param UrlService $urlService Url business-logic service
     */
    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    /**
     * Returns all urls.
     *
     * @param PageRequest $request Page request to get pagination data
     *
     * @return UrlCollection
     */
    public function index(PageRequest $request): UrlCollection
    {
        return UrlCollection::make($this->urlService->all($request->getPaginationData()));
    }

    /**
     * Retrieve url data with visits history.
     *
     * @param Url $url
     *
     * @return UrlResource
     */
    public function show(Url $url): UrlResource
    {
        return new UrlResource($url);
    }

    /**
     * Create a new url.
     *
     * @param UrlRequest $request Short url request to validate and get data
     *
     * @return UrlResource
     *
     * @throws Exception
     */
    public function store(UrlRequest $request): UrlResource
    {
        $url = $this->urlService->create($request->getUrlData());

        return UrlResource::make($url)->additional([
            'stats_url' => $this->urlService->getStatsUrl($url),
        ]);
    }
}
