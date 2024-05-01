<?php
namespace Tractikum\DTO\Services\Tracker\Campaign;

use Tractikum\DTO\AbstractDTOCollection;

class GroupCollectionDTO extends AbstractDTOCollection
{
    public function getItemClass(): string
    {
        return GroupDTO::class;
    }
}
