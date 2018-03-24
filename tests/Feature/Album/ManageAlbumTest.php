<?php

namespace Tests\Feature\Album;

use App\{Album, Band};
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageAlbumTest extends TestCase
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
    public function canViewAlbumTitleFromBandView()
    {
        $album = factory(Album::class)->create([
            'band_id' => $this->band->id
        ]);

        // visit the page
        $response = $this->get("/bands/".$this->band->id);

        // assert we can see the data
        $response->assertSeeInOrder(['Albums:', $album->name]);
    }

    /**
     * @test
     *
     * @return void
     */
    public function canViewAlbum()
    {
        $album = factory(Album::class)->create();

        // visit the page
        $response = $this->get("/albums/$album->id");

        // assert we can see the data
        $response->assertSee($album->name);
        $response->assertSee($album->recorded_date);
        $response->assertSee($album->release_date);
        $response->assertSee((string)($album->number_of_tracks));
        $response->assertSee($album->label);
        $response->assertSee($album->producer);
        $response->assertSee($album->genre);
    }

    /**
     * @test
     * 
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
    }

    /**
     * @test
     * 
     * @return void
     */
    public function canEditAlbum()
    {
        // Store a album in the DB
        $album = factory(Album::class)->create();

        // Edit our album and put it
        $data = [
            'band_id' => 1,
            'name' => 'The Worthless Filler Album',
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
