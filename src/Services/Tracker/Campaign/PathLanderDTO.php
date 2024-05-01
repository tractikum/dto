<?php
namespace Tractikum\DTO\Services\Tracker\Campaign;

use Tractikum\DTO\AbstractDTO;
use Tractikum\DTO\Contracts\Services\Tracker\Campaign\PathLanderDTOInterface;

class PathLanderDTO extends AbstractDTO implements PathLanderDTOInterface
{
    public static function create(int $id, int $weight): self
    {
        return self::createFromArray(get_defined_vars());
    }

    protected function getDefaultAttributes(): array
    {
        return [
            "id" => 1,
            "weight" => 100
        ];
    }
}
