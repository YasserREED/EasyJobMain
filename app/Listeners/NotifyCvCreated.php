<?php

namespace App\Listeners;

use App\Events\CvServiceCreated;

class NotifyCvCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CvServiceCreated $event): void
    {
        $cv = $event->cvService->load('user');

        // Log CV creation
        \Log::info('CV Service created', [
            'user_id' => $cv->user_id,
            'cv_id' => $cv->id,
            'plan' => $cv->plan,
        ]);

        // You can add notifications here
        // $cv->user->notify(new CvCreatedNotification($cv));
    }
}
