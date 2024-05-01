<?php
namespace Tractikum\DTO\Services\ClickService\Campaign;

use Tractikum\DTO\AbstractDTOCollection;

class CampaignRuleCollectionDTO extends AbstractDTOCollection
{
    public function getItemClass(): string
    {
        return CampaignRuleDTO::class;
    }
}
