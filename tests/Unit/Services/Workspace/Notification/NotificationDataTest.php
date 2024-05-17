<?php

namespace Tractikum\DTO\Tests\Unit\Services\Workspace\Notification;

use PHPUnit\Framework\TestCase;
use Tractikum\DTO\Services\Workspace\Notification\NotificationData;
use Tractikum\DTO\Services\Workspace\Notification\NotificationType;

class NotificationDataTest extends TestCase
{
    public function provideAllNotificationTypes(): array
    {
        return [
            'error' => [NotificationType::Error],
            'message' => [NotificationType::Message],
            'invitation' => [NotificationType::Invitation],
        ];
    }

    public function provideNotificationTypesWithInvitation(): array
    {
        return [
            'invitation' => [NotificationType::Invitation],
        ];
    }

    public function provideNotificationTypesWithTitleAndBody(): array
    {
        return [
            'error' => [NotificationType::Error],
            'message' => [NotificationType::Message],
        ];
    }

    /**
     * @test
     * @dataProvider provideAllNotificationTypes
     * @param NotificationType $type
     * @return void
     */
    public function it_stores_type(NotificationType $type): void
    {
        $data = new NotificationData(type: $type);
        $this->assertEquals($type, $data->getType());
    }

    /**
     * @test
     * @dataProvider provideNotificationTypesWithInvitation
     * @param NotificationType $type
     * @return void
     */
    public function it_stores_invitation(NotificationType $type): void
    {
        $data = new NotificationData(type: $type, invitation: 1);
        $this->assertEquals(1, $data->getInvitation());
    }

    /**
     * @test
     * @dataProvider provideNotificationTypesWithInvitation
     * @param NotificationType $type
     * @return void
     */
    public function it_removes_title_and_body(NotificationType $type): void
    {
        $data = new NotificationData(type: $type, title: 'Title', body: 'Body');
        $this->assertNull($data->getTitle());
        $this->assertNull($data->getBody());
    }

    /**
     * @test
     * @dataProvider provideNotificationTypesWithTitleAndBody
     * @param NotificationType $type
     * @return void
     */
    public function it_removes_invitation(NotificationType $type): void
    {
        $data = new NotificationData(type: $type, invitation: 1);
        $this->assertNull($data->getInvitation());
    }

    /**
     * @test
     * @dataProvider provideNotificationTypesWithTitleAndBody
     * @param NotificationType $type
     * @return void
     */
    public function it_stores_title(NotificationType $type): void
    {
        $title = 'Title';
        $data = new NotificationData(type: $type, title: $title);
        $this->assertEquals($title, $data->getTitle());
    }

    /**
     * @test
     * @dataProvider provideNotificationTypesWithTitleAndBody
     * @param NotificationType $type
     * @return void
     */
    public function it_stores_body(NotificationType $type): void
    {
        $body = 'Body';
        $data = new NotificationData(type: $type, body: $body);
        $this->assertEquals($body, $data->getBody());
    }

    /**
     * @test
     * @dataProvider provideNotificationTypesWithTitleAndBody
     * @param NotificationType $type
     * @return void
     */
    public function it_returns_data_with_title_and_body(NotificationType $type): void
    {
        $title = 'Title';
        $body = 'Body';
        $data = new NotificationData(type: $type, title: $title, body: $body);
        $result = $data->getData();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('title', $result);
        $this->assertArrayHasKey('body', $result);
        $this->assertEquals($title, $result['title']);
        $this->assertEquals($body, $result['body']);
    }

    /**
     * @test
     * @dataProvider provideNotificationTypesWithInvitation
     * @param NotificationType $type
     * @return void
     */
    public function it_returns_data_with_invitation(NotificationType $type): void
    {
        $data = new NotificationData(type: $type, invitation: 1);
        $result = $data->getData();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('invitation', $result);
        $this->assertEquals(1, $result['invitation']);
    }

    /**
     * @test
     * @dataProvider provideNotificationTypesWithInvitation
     * @param NotificationType $type
     * @return void
     */
    public function it_gets_empty_content(NotificationType $type): void
    {
        $data = new NotificationData(type: $type);
        $this->assertEmpty($data->getContent());
    }

    /**
     * @test
     * @dataProvider provideNotificationTypesWithTitleAndBody
     * @param NotificationType $type
     * @return void
     */
    public function it_gets_title_and_body_in_content(NotificationType $type): void
    {
        $title = 'Title';
        $body = 'Body';
        $data = new NotificationData(type: $type, title: $title, body: $body);
        $content = $data->getContent();
        $this->assertStringContainsString($title, $content);
        $this->assertStringContainsString($body, $content);
    }

    /**
     * @test
     * @dataProvider provideAllNotificationTypes
     * @param NotificationType $type
     * @return void
     */
    public function it_is_stringable(NotificationType $type): void
    {
        $data = new NotificationData(type: $type, title: 'Title', body: 'Body', invitation: 1);
        $this->assertEquals($data->getContent(), (string) $data);
    }
}