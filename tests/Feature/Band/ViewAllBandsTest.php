<?php

namespace Tests\Feature\Band;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Band;

class ViewAllBandsTest extends TestCase
{
    use RefreshDatabase;

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
                'website' => null,
                'still_active' => false
            ])
        ];
    }

    /**
     * @test
     * @return void
     */
    public function canViewAllBandsOnBandIndex()
    {
        $response = $this->get('/bands');

        // Assert we can see all the bands we created
        collect($this->bands)->each(function ($band) use ($response) {
            collect($band)
                ->except([
                    'id',
                    'still_active',
                    'created_at',
                    'updated_at'
                ])->filter(function ($value) {
                    return $value !== null;
                })->each(function ($attribute) use ($response) {
                    $response->assertSee($attribute);
                });
            $response->assertSeeInOrder(['Still Active', $band->still_active_string]);
        });
    }

    /**
     * @test
     * @return void
     */
    public function allBandsSorted()
    {
        $sortdirections = collect(['asc', 'desc']);
        
        $band = $this->bands[0]; // We just need this to grab the attributes.
        
        $sortdirections->each(function ($sortdirection) use ($band) {
            collect($band)->except([
                'id',
                'still_active',
                'created_at',
                'updated_at'
            ])->each(function ($attribute, $a) use ($band, $sortdirection) {
                $response = $this->get("/bands?sort=$a&sortdirection=$sortdirection");
                $response->assertSuccessful();
                $sortedAttributes = collect($this->bands)
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
            $response = $this->get("/bands?sort=still_active&sortdirection=$sortdirection");
            $response->assertSeeInOrder(['Still Active', $band->still_active_string]);
        });
    }
}
