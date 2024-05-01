<?php
namespace Tractikum\DTO\Contracts\Services\Click\Campaign;

use Tractikum\DTO\Contracts\Services\Tracker\TrafficSource\TrafficSourceDTOInterface;
use Tractikum\DTO\Services\ClickService\Campaign\CampaignRuleCollectionDTO;

interface CampaignDTOInterface
{
    public static function create(int $workspace_id, string $campaign_guid, CampaignRuleCollectionDTO $rules = null, TrafficSourceDTOInterface $traffic_source = null, array $cloak = []): self;
}
