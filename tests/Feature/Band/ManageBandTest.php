<?php

namespace Tests\Feature\Band;

use App\Band;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

class ManageBandTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     *
     * @return void
     */
    public function canViewBand()
    {
        $band = factory(Band::class)->create();

        // visit the page
        $response = $this->get("/bands/$band->id");

        // assert we can see the data
        $response->assertSee($band->name);
        $response->assertSee($band->start_date);
        $response->assertSee($band->website);
        $response->assertSeeInOrder(['Still Active:', $band->still_active_string]);

    }

    /**
     * @test
     * 
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

        // Asset the band was created by using a get request.
        $response = $this->get($responsePost->getTargetUrl());
        $response->assertSee($band->name);
        $response->assertSee($band->start_date);
        $response->assertSee($band->website);
        $response->assertSeeInOrder(['Still Active:', $band->still_active_string]);
    }

    /**
     * @test
     * 
     * @return void
     */
    public function canEditBand()
    {
        // Store a band in the DB
        $band = factory(Band::class)->create();


        // Edit our band and put it
        $data = ['name' => 'The Worthless', 'start_date' => 'July 19, 2001', '_method' => 'PUT'];
        $responsePost = $this->post("/bands/$band->id", $data);
        $responsePost->assertStatus(302);

        // Assert that our edits were saved
        $response = $this->get($responsePost->getTargetUrl());
        $response->assertSee($data['name']);
        $response->assertSee($data['start_date']);
    }
}
