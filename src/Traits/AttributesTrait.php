<?php
namespace Tractikum\DTO\Traits;

use Tractikum\DTO\AbstractDTO;
use Tractikum\DTO\AbstractDTOCollection;
use Tractikum\DTO\Contracts\RejectsAttributes;
use Tractikum\DTO\Exceptions\NotDTOInstanceException;
use UnitEnum;

trait AttributesTrait
{
    protected array $attributes;

    protected abstract function getDefaultAttributes(): array;

    public function setAttributes(array $attributes): self
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }
        return $this;
    }

    private function setAttribute(string $key, mixed $value): self
    {
        if ($this->isAcceptedAttribute($key)) {
            $this->attributes[$key] = $value;
        }
        return $this;
    }

    private function isAcceptedAttribute(string $key): bool
    {
        if ($this instanceof RejectsAttributes) {
            return !in_array($key, $this->getRejectedAttributes());
        }
        return true;
    }

    /**
     * @return array
     * @throws NotDTOInstanceException
     */
    public function getAttributes(): array
    {
        $attributes = $this->attributes;
        foreach ($attributes as $key => $value) {
            $attributes[$key] = $this->parseAttribute($value);
        }
        return $attributes;
    }

    /**
     * @param mixed $value
     * @return mixed
     * @throws NotDTOInstanceException
     */
    private function parseAttribute(mixed $value): mixed
    {
        if ($value instanceof UnitEnum) {
            return $value->value;
        }
        if ($value instanceof AbstractDTO) {
            return $value->getAttributes();
        }
        if ($value instanceof AbstractDTOCollection) {
            return $value->getAttributesCollection();
        }
        return $value;
    }
}
