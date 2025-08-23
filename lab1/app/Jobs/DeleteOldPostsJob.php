<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DeleteOldPostsJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
     {
        
        $oldPosts = Post::onlyTrashed()
                        ->where('deleted_at', '<=', now()->subDays(30))
                        ->get();

        // Log for reference
        info('Deleting old posts: ', $oldPosts->pluck('id')->toArray());

        // Permanently delete
        Post::onlyTrashed()
            ->where('deleted_at', '<=', now()->subDays(30))
            ->forceDelete();
    }
}
