<?php
namespace Tractikum\DTO\Services\Tracker\Campaign;

use Tractikum\DTO\AbstractDTOCollection;

class PathCollectionDTO extends AbstractDTOCollection
{
    public function getItemClass(): string
    {
        return PathDTO::class;
    }
}
