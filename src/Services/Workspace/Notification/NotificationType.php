<?php

namespace Tractikum\DTO\Services\Workspace\Notification;

enum NotificationType: string
{
    case Invitation = 'invitation';
    case Message = 'message';
    case Error = "error";
}