<?php

namespace Tests\Feature\Album;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Album;
use App\Band;

class DeleteAlbumTest extends TestCase
{
    use RefreshDatabase;

    public $band;

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
    public function canDeleteAlbum()
    {
        // Store a album in the DB
        $album = factory(Album::class)->create();

        // Send a delete request to the app
        $responsePost = $this->post("/albums/$album->id", ['_method' => 'DELETE']);

        // Assert we are redirected to the albums index
        $responsePost->assertStatus(302);
        $responsePost->assertRedirect('/albums');

        // Assert the album is no longer in the DB
        $this->assertDatabaseMissing('albums', ['id' => $album->id, 'name' => $album->name]);

        // Verify we can see the flash message.
        $response = $this->get($responsePost->getTargetUrl());
        $response->assertSee(__('app.album.flash.deleted', ['name' => $album->name]));
    }
}
