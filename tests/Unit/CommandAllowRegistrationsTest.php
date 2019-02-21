<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommandAllowRegistrationsTest extends TestCase
{
	/** @test */
	function can_activate_registrations()
	{
		$this->artisan('site:register', ['activation' => 'on'])
			->expectsOutput('El registro de nuevos usuarios esta activado');

		$this->assertDatabaseHas('site', [
			'allow_registrations' => true
		]);
	}

	/** @test */
	function can_deactivate_registrations()
	{
		$this->artisan('site:register', ['activation' => 'off'])
			->expectsOutput('El registro de nuevos usuarios esta desactivado');

		$this->assertDatabaseHas('site', [
			'allow_registrations' => false
		]);
	}
}
