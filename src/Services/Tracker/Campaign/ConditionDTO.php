<?php
namespace Tractikum\DTO\Services\Tracker\Campaign;

use Tractikum\DTO\AbstractDTO;
use Tractikum\DTO\Contracts\Services\Tracker\Campaign\ConditionDTOInterface;

class ConditionDTO extends AbstractDTO implements ConditionDTOInterface
{
    public static function create(string $key, string $predicate, array $values = []): self
    {
        return self::createFromArray(get_defined_vars());
    }

    protected function getDefaultAttributes(): array
    {
        return [
            "key" => "country",
            "predicate" => "IS",
            "values" => []
        ];
    }
}
