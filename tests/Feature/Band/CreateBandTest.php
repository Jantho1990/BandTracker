<?php

namespace Tests\Feature\Band;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Band;

class CreateBandTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     * @return void
     */
    public function canCreateBand()
    {
        // Create a band and get the data in an array so we can post it.
        $band = factory(Band::class)->make();
        $postData = $band->toArray();
        
        // Send a post request to create a new band
        $responsePost = $this->post('/bands', $postData);
        // dd($responsePost);
        $responsePost->assertStatus(302);

        // Assert the band is in the DB
        $this->assertDatabaseHas('bands', $band->toArray());

        // Asset the band was created by using a get request.
        $response = $this->get($responsePost->getTargetUrl());
        $response->assertSee($band->name);
        $response->assertSee($band->start_date);
        $response->assertSee($band->website);
        $response->assertSeeInOrder(['Still Active:', $band->still_active_string]);

        // Verify we can see the flash message.
        $response->assertSee(__('app.band.flash.saved', ['name' => $band->name]));
    }
}
