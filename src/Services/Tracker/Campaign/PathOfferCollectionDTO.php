<?php
namespace Tractikum\DTO\Services\Tracker\Campaign;

use Tractikum\DTO\AbstractDTOCollection;

class PathOfferCollectionDTO extends AbstractDTOCollection
{
    public function getItemClass(): string
    {
        return PathOfferDTO::class;
    }
}
