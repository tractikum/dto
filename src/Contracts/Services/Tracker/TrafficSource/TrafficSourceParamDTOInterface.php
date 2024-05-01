<?php
namespace Tractikum\DTO\Contracts\Services\Tracker\TrafficSource;

interface TrafficSourceParamDTOInterface
{
    public static function create(string $token, string $ts_param, string $ts_token): self;
}
