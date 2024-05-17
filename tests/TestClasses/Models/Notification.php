<?php

namespace Tractikum\DTO\Tests\TestClasses\Models;

use Illuminate\Database\Eloquent\Model;
use Tractikum\DTO\Services\Workspace\Notification\NotificationData;
use Tractikum\DTO\Services\Workspace\Notification\NotificationType;

class Notification extends Model
{
    protected $casts = [
        'type' => NotificationType::class,
        'data' => NotificationData::class,
    ];

    public $timestamps = false;
}