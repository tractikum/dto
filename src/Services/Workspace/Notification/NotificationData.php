<?php

namespace Tractikum\DTO\Services\Workspace\Notification;

use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class NotificationData implements Castable
{
    public function __construct(
        protected NotificationType  $type,
        protected ?string $title = null,
        protected ?string $body = null,
        protected ?int    $invitation = null)
    {
        if ($type === NotificationType::Invitation) {
            $this->title = null;
            $this->body = null;
        } else {
            $this->invitation = null;
        }
    }

    /**
     * @return NotificationType
     */
    public function getType(): NotificationType
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @return int|null
     */
    public function getInvitation(): ?int
    {
        return $this->invitation;
    }

    public function getData(): array
    {
        if ($this->type === NotificationType::Invitation) {
            return ['invitation' => $this->invitation];
        }
        return ['title' => $this->title, 'body' => $this->body];
    }

    public function getContent(): string
    {
        if ($this->type === NotificationType::Invitation) {
            return '';
        }

        return implode('. ', [$this->title ?? '', $this->body ?? '']);
    }

    public function __toString(): string
    {
        return $this->getContent();
    }

    public static function castUsing(array $arguments): CastsAttributes
    {
        return new class implements CastsAttributes
        {
            public function get($model, string $key, $value, array $attributes): NotificationData
            {
                $value = json_decode($value, true, 512, JSON_THROW_ON_ERROR);
                return new NotificationData(
                    type: NotificationType::from($attributes['type']),
                    title: $value['title'] ?? null,
                    body: $value['body'] ?? null,
                    invitation: $value['invitation'] ?? null,
                );
            }

            public function set($model, string $key, $value, array $attributes): array
            {
                if (!$value instanceof NotificationData) {
                    throw new InvalidArgumentException('The given value is not NotificationData instance');
                }
                return [
                    'type' => $value->getType()->value,
                    $key => json_encode($value->getData(), JSON_THROW_ON_ERROR),
                ];
            }
        };
    }
}