<?php
namespace Tractikum\DTO\Services\Tracker\Campaign;

use Tractikum\DTO\AbstractDTOCollection;

class PathLanderCollectionDTO extends AbstractDTOCollection
{
    public function getItemClass(): string
    {
        return PathLanderDTO::class;
    }
}
