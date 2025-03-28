<?php

namespace App\Observers;

use App\Models\KarmaLog;
use App\Models\User;
use App\Notifications\KarmaEarned;

class KarmaLogObserver
{
    /**
     * Handle the KarmaLog "created" event.
     */
    public function created(KarmaLog $karmaLog)
    {
        // Update user's total karma
        $user = User::find($karmaLog->user_id);
        $user->increment('karma_points', $karmaLog->points);

        $user->notify(new KarmaEarned(
            $karmaLog->points,
            $karmaLog->reason
        ));
    }

    /**
     * Handle the KarmaLog "updated" event.
     */
    public function updated(KarmaLog $karmaLog): void
    {
        //
    }

    /**
     * Handle the KarmaLog "deleted" event.
     */
    public function deleted(KarmaLog $karmaLog)
    {
        // Rollback karma on deletion
        $user = User::find($karmaLog->user_id);
        $user->decrement('karma_points', $karmaLog->points);
    }

    /**
     * Handle the KarmaLog "restored" event.
     */
    public function restored(KarmaLog $karmaLog): void
    {
        //
    }

    /**
     * Handle the KarmaLog "force deleted" event.
     */
    public function forceDeleted(KarmaLog $karmaLog): void
    {
        //
    }
}
