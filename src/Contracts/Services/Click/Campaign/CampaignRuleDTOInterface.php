<?php
namespace Tractikum\DTO\Contracts\Services\Click\Campaign;

interface CampaignRuleDTOInterface
{
    public static function create(string $k = null, string $p = null, array $v = null, bool $ie = false): self;
}
