<?php

namespace Tests\Feature\Band;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Album;
use App\Band;

class DeleteBandTest extends TestCase
{
    use RefreshDatabase;

    protected $band;

    /**
     * Run before each test.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->band = factory(Band::class)->create();
    }

    /**
     * @test
     * @return void
     */
    public function canDeleteBand()
    {

        // Send a delete request to the app
        $response = $this->post("/bands/".$this->band->id, ['_method' => 'DELETE']);

        // Assert we are redirected to the bands index
        $response->assertStatus(302);
        $response->assertRedirect('/bands');

        // Assert the band is no longer in the DB
        $this->assertDatabaseMissing('bands', ['id' => $this->band->id, 'name' => $this->band->name]);
    }

    /**
     * @test
     * @return void
     */
    public function destroyAlbumsWhenBandDeleted()
    {
        $album = factory(Album::class)->create();

        // Send a delete request to the app
        $response = $this->post("/bands/" . $this->band->id, ['_method' => 'DELETE']);

        $response->assertStatus(302);

        $this->assertDatabaseMissing('albums', ['id' => $album->id]);
    }
}
