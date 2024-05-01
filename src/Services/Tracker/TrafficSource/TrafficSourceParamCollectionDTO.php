<?php
namespace Tractikum\DTO\Services\Tracker\TrafficSource;

use Tractikum\DTO\AbstractDTOCollection;

class TrafficSourceParamCollectionDTO extends AbstractDTOCollection
{
    public function getItemClass(): string
    {
        return TrafficSourceParamDTO::class;
    }
}
