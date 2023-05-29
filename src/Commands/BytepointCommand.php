<?php

namespace FlixtechsLabs\Bytepoint\Commands;

use Illuminate\Console\Command;

class BytepointCommand extends Command
{
    public $signature = 'laravel-bytepoint';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
