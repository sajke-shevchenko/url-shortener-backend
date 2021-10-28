<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Env;

/**
 * The url model.
 *
 * @property string $target The target url
 * @property string $short The short url
 * @property boolean $commercial Whether the url is commercial or not
 * @property Carbon|null $expired_at The date/time when the url will be expired
 *
 * @property-read Visit[] $visits Returns all visits this url
 */
class Url extends Model
{
    public const TARGET = 'target';
    public const SHORT = 'short';
    public const COMMERCIAL = 'commercial';
    public const EXPIRED_AT = 'expired_at';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        self::TARGET,
        self::SHORT,
        self::COMMERCIAL,
        self::EXPIRED_AT,
    ];

    /**
     * {@inheritdoc}
     */
    protected $dates = [
        self::CREATED_AT,
        self::UPDATED_AT,
        self::EXPIRED_AT,
    ];

    /**
     * Returns related visits.
     *
     * @return HasMany
     */
    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }

    /**
     * Get short url.
     *
     * @return string
     */
    public function getShortUrl(): string
    {
        return Env::get('APP_URL') . "/$this->short";
    }

    /**
     * Returns count of unique visits by past 14 days.
     *
     * @return int
     */
    public function getUniqueVisits(): int
    {
        $startDate = Carbon::now()->add('days', -14);
        $endDate = Carbon::now();

        return $this->visits()->whereBetween(Visit::CREATED_AT, [$startDate, $endDate])
            ->distinct()
            ->count(Visit::IP_ADDRESS);
    }
}
