<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class UrlData extends DataTransferObject
{
    /**
     * The target url.
     *
     * @var string
     */
    public $target;

    /**
     * The short url.
     *
     * @var string|null
     */
    public $short;

    /**
     * Whether the url is commercial or not.
     *
     * @var boolean
     */
    public $commercial;

    /**
     * The date/time when the url will be expired.
     *
     * @var string
     */
    public $expired_at;
}
