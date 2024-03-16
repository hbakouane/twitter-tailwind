<?php

namespace App\Jobs;

use Faker\Factory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateBooksTitles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $books;

    /**
     * Create a new job instance.
     */
    public function __construct($books)
    {
        $this->books = $books;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->books as $book) {
            $book->update([
                'title' => Factory::create()->words(5, 16),
                'title_is_updated' => true
            ]);
        }
    }
}
