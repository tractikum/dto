<?php
namespace Tractikum\DTO\Contracts\Services\Tracker\Campaign;

use Tractikum\DTO\Services\Tracker\Campaign\PathLanderCollectionDTO;
use Tractikum\DTO\Services\Tracker\Campaign\PathOfferCollectionDTO;
use UnitEnum;

interface PathDTOInterface
{
    public static function create(string $name, UnitEnum $type, PathLanderCollectionDTO $landers = null, PathOfferCollectionDTO $offers = null, int $weight = null, bool $is_paused = false): self;
}
