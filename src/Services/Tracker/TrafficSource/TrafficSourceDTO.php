<?php
namespace Tractikum\DTO\Services\Tracker\TrafficSource;

use Tractikum\DTO\AbstractDTO;
use Tractikum\DTO\Contracts\Services\Tracker\TrafficSource\TrafficSourceDTOInterface;
use Tractikum\DTO\Exceptions\CreateMethodNotFoundException;

class TrafficSourceDTO extends AbstractDTO implements TrafficSourceDTOInterface
{
    public static function create(int $id, TrafficSourceParamCollectionDTO $params = null, string $postback = null): self
    {
        return self::createFromArray(get_defined_vars());
    }

    /**
     * @return array
     * @throws CreateMethodNotFoundException
     */
    public function getDefaultAttributes(): array
    {
        return [
            "id" => 1,
            "params" => TrafficSourceParamCollectionDTO::createDefault(),
            "postback" => "https://ts-postback.com/path"
        ];
    }
}
