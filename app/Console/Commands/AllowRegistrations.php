<?php

namespace App\Console\Commands;

use App\Site;
use Illuminate\Console\Command;

class AllowRegistrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:register {activation=on}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enable or disable new registration';

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
     * @return mixed
     */
    public function handle()
    {
        $site = Site::allowRegistrations($this->argument('activation') == 'on');

        $this->info($site->allow_registrations
             ? 'El registro de nuevos usuarios esta activado'
             : 'El registro de nuevos usuarios esta desactivado'
        );
    }
}
