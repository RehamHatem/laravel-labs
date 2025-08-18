<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class LogUserAction implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
      protected $message;
    public function __construct(string $message)
    {
        //
    $this->message = $message;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Log the user action
        Log::info('User Action: ' . $this->message);


    }
}
