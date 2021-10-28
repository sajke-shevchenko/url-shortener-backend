<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * The visit model.
 *
 * @property string image_url The image url
 * @property string $ip_address The ip address
 *
 * @property-read Url $url Relation with the url model
 */
class Visit extends Model
{
    public const IMAGE_URL = 'image_url';
    public const IP_ADDRESS = 'ip_address';
    public const URL_ID = 'url_id';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        self::IMAGE_URL,
        self::IP_ADDRESS,
    ];

    /**
     * {@inheritdoc}
     */
    protected $dates = [
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    /**
     * Returns the related url.
     *
     * @return BelongsTo
     */
    public function url(): BelongsTo
    {
        return $this->belongsTo(Url::class);
    }
}
