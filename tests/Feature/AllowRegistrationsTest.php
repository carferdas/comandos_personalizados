<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AllowRegistrationsTest extends TestCase
{
	/** @test */
	function a_user_cannot_register_if_the_registration_is_deactivated()
	{
	    \App\Site::first()->update(['allow_registrations' => false]);

	    $this->get('/register')
	        ->assertRedirect('/')
	        ->assertSessionHas('error', 'El registro esta desactivado');
	}

	/** @test */
	function a_user_can_register_if_the_registration_is_activated()
	{
	    \App\Site::first()->update(['allow_registrations' => true]);

	    $this->get('/register')
	        ->assertSee('Register');
	}
}
