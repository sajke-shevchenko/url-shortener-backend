<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class PaginationData extends DataTransferObject
{
    public const PAGE = 'page';
    public const PER_PAGE = 'per_page';

    /**
     * The target url.
     *
     * @var int
     */
    public $page;

    /**
     * The short url.
     *
     * @var int
     */
    public $per_page;
}
