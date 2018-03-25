<?php

namespace Tests\Feature\Band;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Band;

class ViewAllBandsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * 
     * @return void
     */
    public function canViewAllBandsOnBandIndex()
    {
        $bands = [
            factory(Band::class)->create(),
            factory(Band::class)->create([
                'name' => 'CRUD',
                'start_date' => 'April 1, 2001',
                'website' => '',
                'still_active' => false
            ])
        ];

        // Load the index page
        $response = $this->get('/bands');

        // Assert we can see all the bands we created
        collect($bands)->each(function ($band) use ($response) {
            collect($band)->only(['name', 'start_date', 'website'])->each(function ($attribute) use ($response) {
                $response->assertSee($attribute);
            });
            $response->assertSeeInOrder(['Still Active', $band->still_active_string]);
        });
    }
}
