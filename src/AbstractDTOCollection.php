<?php
namespace Tractikum\DTO;

use Tractikum\DTO\Exceptions\CreateMethodNotFoundException;
use Tractikum\DTO\Exceptions\NotCorrectInstanceException;
use Tractikum\DTO\Exceptions\NotDTOInstanceException;

abstract class AbstractDTOCollection
{
    protected array $items;

    public abstract function getItemClass(): string;

    /**
     * @param array $items
     * @return static
     * @throws NotCorrectInstanceException
     */
    public static function create(array $items): static
    {
        $instance = new static();
        $item_class = $instance->getItemClass();
        foreach ($items as $item) {
            if (!$item instanceof $item_class) {
                throw new NotCorrectInstanceException($item_class);
            }
            $instance->setItem($item);
        }
        return $instance;
    }

    /**
     * @return static
     * @throws CreateMethodNotFoundException
     */
    public static function createDefault(): static
    {
        $instance = new static();
        $item_class = $instance->getItemClass();
        if (!method_exists($item_class, 'createDefault')) {
            throw new CreateMethodNotFoundException();
        }
        $instance->setItem($item_class::createDefault());
        return $instance;
    }

    protected function setItem(AbstractDTO $item): self
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * @return array
     * @throws NotDTOInstanceException
     */
    public function getAttributesCollection(): array
    {
        $attributes = [];
        foreach ($this->items as $item) {
            if (!$item instanceof AbstractDTO) {
                throw new NotDTOInstanceException();
            }
            $attributes[] = $item->getAttributes();
        }
        return $attributes;
    }
}
