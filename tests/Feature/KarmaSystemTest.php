<?php

use App\Models\Event;
use App\Models\Job;
use App\Models\User;
use Tests\TestCase;

class KarmaSystemTest extends TestCase
{
    public function test_event_hosting_awards_karma(): void
    {
        $event = Event::factory()->create();
        $event->user()->associate(User::factory()->create()); // Ensure the user relationship exists
        $event->save();

        $this->assertEquals(50, $event->user->karma_points);
    }

    public function test_job_completion_awards_karma(): void
    {
        $job = Job::factory()->create(['karma_reward' => 50]); // Ensure the karma_reward column exists
        $job->complete();

        $this->assertEquals(50, $job->user->karma_points);
    }
}
