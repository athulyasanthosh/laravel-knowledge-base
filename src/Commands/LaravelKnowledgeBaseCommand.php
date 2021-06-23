<?php

namespace Athulya\LaravelKnowledgeBase\Commands;

use Illuminate\Console\Command;

class LaravelKnowledgeBaseCommand extends Command
{
    public $signature = 'laravel-knowledge-base';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
