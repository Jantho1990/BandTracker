<?php

namespace Tests\Feature\Album;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Album;
use App\Band;

class EditAlbumTest extends TestCase
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
    public function canEditAlbum()
    {
        // Store a album in the DB
        $album = factory(Album::class)->create();

        // Edit our album and put it
        $data = [
            'band_id' => 1,
            'name' => 'The Worthless Album',
            'number_of_tracks' => 11,
            '_method' => 'PUT'
        ];
        $responsePost = $this->post("/albums/$album->id", $data);
        $responsePost->assertStatus(302);

        // Assert that our edits were saved in the DB
        $this->assertDatabaseHas('albums', collect($data)->except('_method')->toArray());

        // Assert that our edits were saved
        $response = $this->get($responsePost->getTargetUrl());
        $response->assertSee($data['name']);
        $response->assertSee((string)$data['number_of_tracks']);

        // Verify we can see the flash message.
        $response->assertSee(__('app.album.flash.updated', ['name' => $data['name']]));
    }
}
