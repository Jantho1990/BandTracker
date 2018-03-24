<?php

namespace Tests\Feature\Album;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\{Album, Band};

class DeleteAlbumTest extends TestCase
{
    use RefreshDatabase;

    public $band;

    public function setUp()
    {
        parent::setUp();
        $this->band = factory(Band::class)->create();
    }

    /**
     * @test
     * 
     * @return void
     */
    public function canDeleteAlbum()
    {
        // Store a album in the DB
        $album = factory(Album::class)->create();

        // Send a delete request to the app
        $response = $this->post("/albums/$album->id", ['_method' => 'DELETE']);

        // Assert we are redirected to the albums index
        $response->assertStatus(302);
        $response->assertRedirect('/albums');

        // Assert the album is no longer in the DB
        $this->assertDatabaseMissing('albums', ['id' => $album->id, 'name' => $album->name]);
    }
}
