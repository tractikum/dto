<?php
namespace Tractikum\DTO\Services\Tracker\Campaign;

use Tractikum\DTO\AbstractDTOCollection;

class ConditionCollectionDTO extends AbstractDTOCollection
{
    public function getItemClass(): string
    {
        return ConditionDTO::class;
    }
}
