<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class VisitData extends DataTransferObject
{
    /**
     * The ip address.
     *
     * @var string|null
     */
    public $ip_address;
}
