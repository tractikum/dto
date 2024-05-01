<?php
namespace Tractikum\DTO\Contracts\Services\Tracker\TrafficSource;

use Tractikum\DTO\Services\Tracker\TrafficSource\TrafficSourceParamCollectionDTO;

interface TrafficSourceDTOInterface
{
    public static function create(int $id, TrafficSourceParamCollectionDTO $params = null, string $postback = null): self;
}
