<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Band;

class BandModelTest extends TestCase
{
    /**
     * @test
     * 
     * @return void
     */
    public function stillActiveStringReturnsStringYes()
    {
        $band = factory(Band::class)->make(['still_active' => true]);

        $this->assertEquals($band->still_active_string, 'Yes');
    }

    /**
     * @test
     * 
     * @return void
     */
    public function stillActiveStringReturnsStringNo()
    {
        $band = factory(Band::class)->make(['still_active' => false]);

        $this->assertEquals($band->still_active_string, 'No');
    }
}
