<?php

namespace Tests\Feature\Album;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Album;
use App\Band;

class ViewAlbumTest extends TestCase
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
}
