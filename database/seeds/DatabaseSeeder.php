<?php

use App\Site;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Site::create([
            'allow_registrations' => true
        ]);
    }
}