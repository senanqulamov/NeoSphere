<?php

use App\Models\User;
use App\Models\KarmaLog;
use App\Notifications\KarmaEarned;
use Tests\TestCase;
use Illuminate\Support\Facades\Notification;

class NotificationTest extends TestCase
{

    public function test_karma_notification_sent(): void
    {
        Notification::fake();

        $user = User::factory()->create();
        $karmaLog = KarmaLog::create(['points' => 75, 'reason' => 'test']); // Ensure points is fillable

        Notification::assertSentTo(
            $user,
            KarmaEarned::class,
            fn($notification) => $notification->points === 75
        );

        $this->assertNotNull($karmaLog->id);
    }
}
