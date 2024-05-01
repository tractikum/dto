<?php
namespace Tractikum\DTO\Services\Tracker\Campaign;

use App\Models\Enums\Tracker\CampaignType;
use Tractikum\DTO\AbstractDTO;
use Tractikum\DTO\Contracts\RejectsAttributes;
use Tractikum\DTO\Contracts\Services\Tracker\Campaign\CampaignDTOInterface;
use Tractikum\DTO\Exceptions\CreateMethodNotFoundException;
use UnitEnum;

class CampaignDTO extends AbstractDTO implements CampaignDTOInterface, RejectsAttributes
{
    public static function create(string $name, string $guid, UnitEnum $type, int $flow_id = null, int $traffic_source_id = null, int $domain_id = null, array $auto_cost = null, int $cloak_id = null, int $wp_flow_id = null, bool $auto_optimization = false, string $optimize_by = null, array $tags = null, PathCollectionDTO $paths = null, GroupCollectionDTO $groups = null, string $note = null): self
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
            "guid" => 1,
            'name' => 'Campaign 1',
            'type' => CampaignType::Path,
            "flow_id" => null,
            "traffic_source_id" => null,
            "domain_id" => null,
            "auto_cost" => null,
            "cloak_id" => null,
            "wp_flow_id" => null,
            "auto_optimization" => false,
            "optimize_by" => null,
            "tags" => [
                "Tag1",
                "Tag2",
                "Tag3"
            ],
            "paths" => PathCollectionDTO::createDefault(),
            'groups' => GroupCollectionDTO::createDefault(),
            "note" => null,
        ];
    }

    public function getRejectedAttributes(): array
    {
        return [
            "attributes",
            "request_data",
        ];
    }
}
