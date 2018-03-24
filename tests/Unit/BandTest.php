<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Band;

class BandTest extends TestCase
{
    /**
     * @test
     * 
     * @return void
     */
    public function stillActiveStringReturnsStringTrue()
    {
        $band = factory(Band::class)->make(['still_active' => true]);

        $this->assertEquals($band->still_active_string, 'True');
    }

    /**
     * @test
     * 
     * @return void
     */
    public function stillActiveStringReturnsStringFalse()
    {
        $band = factory(Band::class)->make(['still_active' => false]);

        $this->assertEquals($band->still_active_string, 'False');
    }
}
