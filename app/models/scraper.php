<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Scraper
 *
 * @property int $id
 * @property string $site
 * @property string $item_id
 * @property string $title
 * @property string $image
 * @property string $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Scraper newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scraper newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scraper query()
 * @method static \Illuminate\Database\Eloquent\Builder|Scraper whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scraper whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scraper whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scraper whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scraper whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scraper whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scraper whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scraper whereUrl($value)
 * @mixin Eloquent
 */
class Scraper extends Model
{
    use HasFactory;

    protected $fillable = [
        'site',
        '$item_id',
        'title',
        'image',
        'url',
    ];
}
