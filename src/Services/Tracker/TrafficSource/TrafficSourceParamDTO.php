<?php
namespace Tractikum\DTO\Services\Tracker\TrafficSource;

use Tractikum\DTO\AbstractDTO;
use Tractikum\DTO\Contracts\Services\Tracker\TrafficSource\TrafficSourceParamDTOInterface;

class TrafficSourceParamDTO extends AbstractDTO implements TrafficSourceParamDTOInterface
{
    public static function create(string $token, string $ts_param, string $ts_token): self
    {
        return self::createFromArray(get_defined_vars());
    }

    public function getDefaultAttributes(): array
    {
        return [
            "token" => "external_id",
            "ts_param" => "ext_id",
            "ts_token" => "{ext_id}"
        ];
    }
}
