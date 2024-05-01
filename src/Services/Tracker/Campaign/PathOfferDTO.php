<?php
namespace Tractikum\DTO\Services\Tracker\Campaign;

use Tractikum\DTO\AbstractDTO;
use Tractikum\DTO\Contracts\Services\Tracker\Campaign\PathOfferDTOInterface;

class PathOfferDTO extends AbstractDTO implements PathOfferDTOInterface
{
    public static function create(int $id, int $weight, bool $is_paused = false): self
    {
        return self::createFromArray(get_defined_vars());
    }

    protected function getDefaultAttributes(): array
    {
        return [
            "id" => 1,
            "weight" => 100,
            "is_paused" => false
        ];
    }
}
