<?php

namespace Tests\Feature\Album;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Album;
use App\Band;

class CreateAlbumTest extends TestCase
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
    public function canCreateAlbum()
    {
        // Create a album and get the data in an array so we can post it.
        $album = factory(Album::class)->make();
        $postData = $album->toArray();
        
        // Send a post request to create a new album
        $responsePost = $this->post('/albums', $postData);
        // dd($responsePost);
        $responsePost->assertStatus(302);

        // Assert the album is in the DB
        $this->assertDatabaseHas('albums', $album->toArray());

        // Asset the album was created by using a get request.
        $response = $this->get($responsePost->getTargetUrl());
        $response->assertSee($album->name);
        $response->assertSee($album->recorded_date);
        $response->assertSee($album->release_date);
        $response->assertSee((string)($album->number_of_tracks));
        $response->assertSee($album->label);
        $response->assertSee($album->producer);
        $response->assertSee($album->genre);

        // Verify we can see the flash message.
        $response->assertSee(__('app.album.flash.saved'), ['name' => $album->name]);
    }

    /**
     * @test
     * @return void
     */
    public function cannotCreateAlbumWithNoBand()
    {
        $album = factory(Album::class)->create([
            'band_id' => 2
        ]);
        $postData = $album->toArray();

        // Send a post request to create a new album
        $response = $this->post('/albums', $postData);
        $response->assertStatus(302);

        // Assert we got an error about not having a band.
        $response->assertSessionHasErrors(['band_id']);
    }
}
