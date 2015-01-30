<?php
namespace Rocketeer\Plugins\Laravel\Binaries;

use Rocketeer\Plugins\Laravel\TestCases\LaravelTestCase;

class ArtisanTest extends LaravelTestCase
{
    public function testCanRunMigrations()
    {
        $php     = $this->binaries['php'];
        $artisan = $this->builder->buildBinary('artisan');

        $commands = $artisan->migrate();
        $this->assertEquals($php.' artisan migrate --force', $commands);
    }

    public function testCanSeedDatabase()
    {
        $php     = $this->binaries['php'];
        $artisan = $this->builder->buildBinary('artisan');

        $commands = $artisan->seed();
        $this->assertEquals($php.' artisan db:seed --force', $commands);
    }
}
