<?php
namespace Tractikum\DTO\Contracts\Services\Tracker\Campaign;

interface PathLanderDTOInterface
{
    public static function create(int $id, int $weight): self;
}
