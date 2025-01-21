<?php

declare(strict_types=1);

namespace Modules\Activity\Models;

/**
 * Class StoredEvent.
 *
 * Represents a stored event in the activity module.
 *
 * @mixin \Eloquent
 */
class StoredEvent extends BaseStoredEvent
{
    /** @var array<string> */
    protected $fillable = [
        'id',
        'aggregate_uuid',
        'aggregate_version',
        'event_version',
        'event_class',
        'event_properties',
        'meta_data',
        'created_at',
        'updated_by',
        'created_by',
    ];

    protected string $connection = 'activity';
}
