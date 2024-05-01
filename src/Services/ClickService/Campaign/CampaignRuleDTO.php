<?php
namespace Tractikum\DTO\Services\ClickService\Campaign;

use Tractikum\DTO\AbstractDTO;
use Tractikum\DTO\Contracts\Services\Click\Campaign\CampaignRuleDTOInterface;

class CampaignRuleDTO extends AbstractDTO implements CampaignRuleDTOInterface
{
    public static function create(string $k = null, string $p = null, array $v = null, bool $ie = false): self
    {
        return self::createFromArray(get_defined_vars());
    }

    public function getDefaultAttributes(): array
    {
        return [
            "k" => "os",
            "p" => "IS",
            "v" => [
                "10^^Mac",
                "20^^Ubuntu"
            ],
            "ie" => true
        ];
    }
}
