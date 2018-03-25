<?php

namespace Tests\Feature\Band;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Band;

class EditBandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function canEditBand()
    {
        // Store a band in the DB
        $band = factory(Band::class)->create();


        // Edit our band and put it
        $data = ['name' => 'The Worthless', 'start_date' => 'July 19, 2001', 'website' => null, '_method' => 'PUT'];
        $responsePost = $this->post("/bands/$band->id", $data);
        $responsePost->assertStatus(302);

        // Assert that our edits were saved in the DB
        $this->assertDatabaseHas('bands', collect($data)->except('_method')->toArray());

        // Assert that our edits were saved
        $response = $this->get($responsePost->getTargetUrl());
        $response->assertSee($data['name']);
        $response->assertSee($data['start_date']);

        // Verify we can see the flash message.
        $response->assertSee(__('app.band.flash.updated'), ['name' => $band->name]);
    }
}
