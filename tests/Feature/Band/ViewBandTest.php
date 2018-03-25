<?php

namespace Tests\Feature\Band;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Album;
use App\Band;

class ViewBandTest extends TestCase
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
    public function canViewBand()
    {
        $response = $this->get("/bands/".$this->band->id);

        $response->assertSee($this->band->name);
        $response->assertSee($this->band->start_date);
        $response->assertSee($this->band->website);
        $response->assertSeeInOrder(['Still Active:', $this->band->still_active_string]);
    }

    /**
     * @test
     * @return void
     */
    public function canViewAlbumTitleFromBandView()
    {
        $album = factory(Album::class)->create([
            'band_id' => $this->band->id
        ]);

        $response = $this->get("/bands/" . $this->band->id);

        $response->assertSeeInOrder(['Albums:', $album->name]);
    }
}
