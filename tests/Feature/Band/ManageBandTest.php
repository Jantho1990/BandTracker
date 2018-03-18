<?php

namespace Tests\Feature\Band;

use App\Band;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
        $response->assertSeeInOrder(['Still Active:', $band->stillActiveString]);

    }
}
