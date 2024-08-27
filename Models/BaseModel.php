<?php

declare(strict_types=1);

namespace Modules\Rating\Models;

use Illuminate\Database\Eloquent\Model;
// //use Laravel\Scout\Searchable;
// ---------- traits
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModel.
 */
abstract class BaseModel extends Model
{
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /**
     * @var int
     */
    protected $perPage = 30;

    // use Searchable;

    /** @var string */
    protected $connection = 'rating';

    /** @var list<string> */
    protected $fillable = ['id'];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            // 'published_at' => 'datetime:Y-m-d', // da verificare
        ];
    }

    /**
     * @var string[]
     */
    protected $dates = ['published_at', 'created_at', 'updated_at'];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $incrementing = true;

    /** @var list<string> */
    protected $hidden = [
        // 'password'
    ];

    /** @var bool */
    public $timestamps = true;
}
