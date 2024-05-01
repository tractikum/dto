<?php
namespace Tractikum\DTO\Services\Tracker\Campaign;

use Tractikum\DTO\AbstractDTO;
use Tractikum\DTO\Contracts\Services\Tracker\Campaign\GroupDTOInterface;
use Tractikum\DTO\Exceptions\CreateMethodNotFoundException;

class GroupDTO extends AbstractDTO implements GroupDTOInterface
{
    public static function create(string $name, PathCollectionDTO $paths = null, ConditionCollectionDTO $conditions = null, bool $is_paused = false): self
    {
        return self::createFromArray(get_defined_vars());
    }

    /**
     * @return array
     * @throws CreateMethodNotFoundException
     */
    protected function getDefaultAttributes(): array
    {
        return [
            "name" => "GLOBAL",
            "paths" => PathCollectionDTO::createDefault(),
            "conditions" => ConditionCollectionDTO::createDefault(),
            "is_paused" => false
        ];
    }
}
