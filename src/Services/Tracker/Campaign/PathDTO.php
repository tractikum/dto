<?php
namespace Tractikum\DTO\Services\Tracker\Campaign;

use App\Models\Enums\Tracker\PathType;
use Tractikum\DTO\AbstractDTO;
use Tractikum\DTO\Contracts\Services\Tracker\Campaign\PathDTOInterface;
use Tractikum\DTO\Exceptions\CreateMethodNotFoundException;
use UnitEnum;

class PathDTO extends AbstractDTO implements PathDTOInterface
{
    public static function create(string $name, UnitEnum $type, PathLanderCollectionDTO $landers = null, PathOfferCollectionDTO $offers = null, int $weight = null, bool $is_paused = false): self
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
            "name" => 'Path 1',
            "type" => PathType::LanderOffer,
            "landers" => PathLanderCollectionDTO::createDefault(),
            "offers" => PathOfferCollectionDTO::createDefault(),
            "weight" => 100,
            "is_paused" => false
        ];
    }
}
