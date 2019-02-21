<?php

use Illuminate\Foundation\Inspiring;
use App\Site;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('site:register_clousure {activation=on}', function () {
	$site = Site::allowRegistrations($this->argument('activation') == 'on');

    $this->info($site->allow_registrations
         ? 'El registro de nuevos usuarios esta activado'
         : 'El registro de nuevos usuarios esta desactivado'
    );
})->describe('Enable or disable new registration');
