<?php

namespace Tests\Feature\Album;

use App\{Album, Band};
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageAlbumTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     *
     * @return void
     */
    public function canViewAlbumTitleFromBandView()
    {
        $band = factory(Band::class)->create();
        $album = factory(Album::class)->create([
            'band_id' => $band->id
        ]);

        // visit the page
        $response = $this->get("/bands/$band->id");

        // assert we can see the data
        $response->assertSeeInOrder(['Albums:', $album->name]);
    }
}
