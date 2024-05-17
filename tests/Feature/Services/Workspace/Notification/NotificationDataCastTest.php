<?php

namespace Tractikum\DTO\Tests\Feature\Services\Workspace\Notification;

use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use JsonException;
use Tractikum\DTO\Services\Workspace\Notification\NotificationData;
use Tractikum\DTO\Services\Workspace\Notification\NotificationType;
use Tractikum\DTO\Tests\Feature\TestCase;
use Tractikum\DTO\Tests\TestClasses\Models\Notification;

class NotificationDataCastTest extends TestCase
{
    public function provideNotificationData(): array
    {
        return [
            'error' => [new NotificationData(type: NotificationType::Error, title: 'Error', body: 'Body')],
            'message' => [new NotificationData(type: NotificationType::Message, title: 'Message', body: 'Body')],
            'invitation' => [new NotificationData(type: NotificationType::Invitation, invitation: 1)],
        ];
    }

    /**
     * @test
     * @dataProvider provideNotificationData
     * @param NotificationData $data
     * @return void
     */
    public function it_sets_type_on_data_cast(NotificationData $data): void
    {
        Notification::forceCreate(['data' => $data]);
        $this->assertDatabaseCount('notifications', 1);
        $this->assertDatabaseHas('notifications', ['type' => $data->getType()->value]);
    }

    /**
     * @test
     * @dataProvider provideNotificationData
     * @param NotificationData $data
     * @return void
     * @throws JsonException
     */
    public function it_casts_to_json(NotificationData $data): void
    {
        Notification::forceCreate(['data' => $data]);
        $this->assertDatabaseCount('notifications', 1);
        $record = DB::table('notifications')->first();
        $this->assertJson($record->data);
        $this->assertJsonStringEqualsJsonString(json_encode($data->getData(), JSON_THROW_ON_ERROR), $record->data);
    }

    /**
     * @test
     * @return void
     */
    public function it_validates_instance(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The given value is not NotificationData instance');
        Notification::forceCreate(['data' => []]);
    }

    /**
     * @test
     * @dataProvider provideNotificationData
     * @param NotificationData $data
     * @return void
     * @throws JsonException
     */
    public function it_casts_to_valid_instances_and_stores_the_structure(NotificationData $data): void
    {
        Notification::query()->insert(['type' => $data->getType()->value, 'data' => json_encode($data->getData(), JSON_THROW_ON_ERROR)]);
        $model = Notification::query()->first();
        $this->assertInstanceOf(NotificationType::class, $model->type);
        $this->assertInstanceOf(NotificationData::class, $model->data);
        $this->assertSame($data->getType(), $model->type);
        $this->assertSame($data->getTitle(), $model->data->getTitle());
        $this->assertSame($data->getBody(), $model->data->getBody());
        $this->assertSame($data->getInvitation(), $model->data->getInvitation());
        $this->assertSame($data->getData(), $model->data->getData());
        $this->assertSame($data->getContent(), $model->data->getContent());
    }
}