<?php
namespace Tractikum\DTO\Services\ClickService\Campaign;

use Tractikum\DTO\AbstractDTO;
use Tractikum\DTO\Contracts\RejectsAttributes;
use Tractikum\DTO\Contracts\Services\Click\Campaign\CampaignDTOInterface;
use Tractikum\DTO\Contracts\Services\Tracker\TrafficSource\TrafficSourceDTOInterface;
use Tractikum\DTO\Exceptions\CreateMethodNotFoundException;
use Tractikum\DTO\Services\Tracker\TrafficSource\TrafficSourceDTO;

class CampaignDTO extends AbstractDTO implements CampaignDTOInterface, RejectsAttributes
{
    public static function create(int $workspace_id, string $campaign_guid, CampaignRuleCollectionDTO $rules = null, TrafficSourceDTOInterface $traffic_source = null, array $cloak = []): self
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
            "workspace_id" => 1,
            "campaign_guid" => 1,
            "rules" => CampaignRuleCollectionDTO::createDefault(),
            "traffic_source" => TrafficSourceDTO::createDefault(),
            "cloak" => [],
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
