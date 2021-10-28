<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitRequest;
use App\Http\Resources\VisitResource;
use App\Services\UrlService;
use App\Services\VisitService;
use Exception;

class VisitController extends Controller
{
    /**
     * Url business-logic service.
     *
     * @var UrlService
     */
    private $urlService;

    /**
     * Visit business-logic service.
     *
     * @var VisitService
     */
    private $visitService;

    /**
     * Visit CRUD controller.
     *
     * @param UrlService $urlService Url business-logic service
     * @param VisitService $visitService Visit business-logic service
     */
    public function __construct(VisitService $visitService, UrlService $urlService)
    {
        $this->urlService = $urlService;
        $this->visitService = $visitService;
    }

    /**
     * Create a new record about visiting.
     *
     * @param string $short The short url
     * @param VisitRequest $request Visit request to validate and get data
     *
     * @return VisitResource
     *
     * @throws Exception
     */
    public function store(string $short, VisitRequest $request): VisitResource
    {
        $url = $this->urlService->getUrlByShort($short);
        $visit = $this->visitService->create($request->getVisitData(), $url);

        return new VisitResource($visit);
    }
}
