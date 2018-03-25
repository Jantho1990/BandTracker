<?php

namespace Tests\Feature\Album;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\{Album, Band};

class ViewAllAlbumsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * 
     * @return void
     */
    public function canViewAllAlbumsOnAlbumIndex()
    {
        $bands = [
            factory(Band::class)->create(),
            factory(Band::class)->create([
                'name' => 'CRUD',
                'start_date' => 'April 1, 2001',
                'website' => '',
                'still_active' => false
            ])
        ];
        $albums = [
            factory(Album::class)->create(),
            factory(Album::class)->create([
                'band_id' => 2,
                'name' => 'LOLUSUK',
                'recorded_date' => '2011',
                'release_date' => '2012',
                'number_of_tracks' => 41,
                'label' => 'Ugh Sounds',
                'producer' => 'Don re Likaer',
                'genre' => 'Crap Rock',
            ])
        ];

        // Load the index page
        $response = $this->get('/albums');

        // Assert we can see all the albums we created
        collect($albums)->each(function ($album) use ($response) {
            collect($album)->except(['id', 'band_id', 'number_of_tracks', 'created_at', 'updated_at'])->each(function ($attribute, $a) use ($response) {
                $response->assertSee($attribute);
            });
            $response->assertSee((string)($album->number_of_tracks));
            $response->assertSeeInOrder(['Band Name', $album->band->name]);
        });
    }
}
