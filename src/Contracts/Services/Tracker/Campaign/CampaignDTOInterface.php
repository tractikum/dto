<?php
namespace Tractikum\DTO\Contracts\Services\Tracker\Campaign;

use UnitEnum;
use Tractikum\DTO\Services\Tracker\Campaign\GroupCollectionDTO;
use Tractikum\DTO\Services\Tracker\Campaign\PathCollectionDTO;

interface CampaignDTOInterface
{
    public static function create(string $name, string $guid, UnitEnum $type, int $flow_id = null, int $traffic_source_id = null, int $domain_id = null, array $auto_cost = null, int $cloak_id = null, int $wp_flow_id = null, bool $auto_optimization = false, string $optimize_by = null, array $tags = null, PathCollectionDTO $paths = null, GroupCollectionDTO $groups = null, string $note = null): self;
}
