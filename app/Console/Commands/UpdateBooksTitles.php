<?php

namespace App\Console\Commands;

use App\Models\Book;
use Faker\Factory;
use Illuminate\Console\Command;

class UpdateBooksTitles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-books-titles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates books title to a sentence of 5 - 20 words';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Retrieving books for update.');

        $books = Book::where('title_is_updated', false)
            ->limit(1000)
            ->get();

        \App\Jobs\UpdateBooksTitles::dispatch($books);

        $this->info(count($books) . ' books retrieved and queue job was dispatched.');
    }
}
