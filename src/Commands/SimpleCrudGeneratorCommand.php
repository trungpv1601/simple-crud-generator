<?php

namespace Trungpv1601\SimpleCrudGenerator\Commands;

use Illuminate\Console\Command;

class SimpleCrudGeneratorCommand extends Command
{
    public $signature = 'simple-crud-generator';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
