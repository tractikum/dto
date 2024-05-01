<?php
namespace Tractikum\DTO\Contracts\Services\Tracker\Campaign;

interface ConditionDTOInterface
{
    public static function create(string $key, string $predicate, array $values = []): self;
}
