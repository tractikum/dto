<?php
namespace Tractikum\DTO\Contracts\Services\Tracker\Campaign;

use Tractikum\DTO\Services\Tracker\Campaign\ConditionCollectionDTO;
use Tractikum\DTO\Services\Tracker\Campaign\PathCollectionDTO;

interface GroupDTOInterface
{
    public static function create(string $name, PathCollectionDTO $paths = null, ConditionCollectionDTO $conditions = null, bool $is_paused = false): self;
}
