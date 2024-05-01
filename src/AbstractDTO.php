<?php
namespace Tractikum\DTO;

use Tractikum\DTO\Exceptions\CreateMethodNotFoundException;
use Tractikum\DTO\Traits\AttributesTrait;

abstract class AbstractDTO
{
    use AttributesTrait;

    private static function makeInstance(): static
    {
        return new static();
    }

    private static function canCreate(): bool
    {
        return method_exists(static::class, 'create');
    }

    protected static function createFromArray(array $attributes): static
    {
        $instance = static::makeInstance();
        $instance->setAttributes($attributes);
        return $instance;
    }

    /**
     * @return static
     * @throws CreateMethodNotFoundException
     */
    public static function createDefault(): static
    {
        if (!static::canCreate()) {
            throw new CreateMethodNotFoundException();
        }

        $instance = static::makeInstance();
        return static::create(...$instance->getDefaultAttributes());
    }
}
