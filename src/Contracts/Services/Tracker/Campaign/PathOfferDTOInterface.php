<?php
namespace Tractikum\DTO\Contracts\Services\Tracker\Campaign;

interface PathOfferDTOInterface
{
    public static function create(int $id, int $weight, bool $is_paused = false): self;
}
