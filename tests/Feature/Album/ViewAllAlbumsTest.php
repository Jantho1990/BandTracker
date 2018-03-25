<?php

namespace Tests\Feature\Album;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Album;
use App\Band;

class ViewAllAlbumsTest extends TestCase
{
    use RefreshDatabase;

    protected $albums;
    protected $bands;

    /**
     * Run before each test.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->bands = [
            factory(Band::class)->create(),
            factory(Band::class)->create([
                'name' => 'CRUD',
                'start_date' => 'April 1, 2001',
                'website' => '',
                'still_active' => false
            ])
        ];
        $this->albums = [
            factory(Album::class)->create(),
            factory(Album::class)->create([
                'band_id' => 2,
                'name' => 'LOLUSUK',
                'recorded_date' => null,
                'release_date' => '2012',
                'number_of_tracks' => 41,
                'label' => 'Ugh Sounds',
                'producer' => 'Don re Likaer',
                'genre' => 'Crap Rock',
            ])
        ];
    }

    /**
     * @test
     * @return void
     */
    public function canViewAllAlbumsOnAlbumIndex()
    {
        $response = $this->get('/albums');

        // Assert we can see all the albums we created
        collect($this->albums)->each(function ($album) use ($response) {
            collect($album)->except([
                'id',
                'band_id',
                'number_of_tracks',
                'created_at',
                'updated_at'
            ])->filter(function ($value) {
                return $value !== null;
            })->each(function ($attribute, $a) use ($response) {
                $response->assertSee($attribute);
            });
            $response->assertSee((string)($album->number_of_tracks));
            $response->assertSeeInOrder(['Band Name', $album->band->name]);
        });
    }

    /**
     * @test
     * @return void
     */
    public function canViewAllAlbumsByBand()
    {
        $response = $this->get('/albums?band_id=1');

        $this->bands[0]->albums->each(function ($album) use ($response) {
            $response->assertSee($album->name);
        });

        $response->assertDontSee('<a href="/bands/'.$this->bands[1]->id.'">'.$this->bands[1]->name.'</a>');
    }

    /**
     * @test
     * @return void
     */
    public function allAlbumsSorted()
    {
        $sortdirections = collect(['asc', 'desc']);
        
        $album = $this->albums[0]; // We just need this to grab the attributes.
        
        $sortdirections->each(function ($sortdirection) use ($album) {
            collect($album)->except([
                'id',
                'band_id',
                'created_at',
                'updated_at'
            ])->each(function ($attribute, $a) use ($album, $sortdirection) {
                $response = $this->get("/albums?sort=$a&sortdirection=$sortdirection");
                $response->assertSuccessful();
                $sortedAttributes = collect($this->albums)
                    ->pluck($a)
                    ->filter(function ($value) {
                        return $value !== null;
                    })->sort(function ($a, $b) use ($sortdirection) {
                        return ($a >= $b)
                            ? ($sortdirection === 'asc' ? 1 : -1)
                            : ($sortdirection === 'asc' ? -1 : 1);
                    })->prepend($a)
                    ->toArray();
                $response->assertSeeInOrder($sortedAttributes);
            });
        });
    }
}
