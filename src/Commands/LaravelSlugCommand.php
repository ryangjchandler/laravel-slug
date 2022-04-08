<?php

namespace RyanChandler\Slug\Commands;

use Illuminate\Console\Command;

class LaravelSlugCommand extends Command
{
    public $signature = 'laravel-slug';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
