<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Colours extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:colours';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'coloured msgs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('White msg line');
        $this->info('Green msg info');
        $this->error('Red msg error');
    }
}
