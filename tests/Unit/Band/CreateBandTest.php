<?php

namespace Tests\Unit\Band;

use App\Band;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateBandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function bandIsSavedInDB()
    {
        $band = factory(Band::class)->create();
        $this->assertDatabaseHas('bands', ['name' => $band->name]);
        $this->assertDatabaseHas('bands', ['start_date' => $band->start_date]);
        $this->assertDatabaseHas('bands', ['website' => $band->website]);
        $this->assertDatabaseHas('bands', ['still_active' => $band->still_active]);
    }
}
