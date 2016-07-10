<?php
namespace Rocketeer\Plugins\Laravel\Strategies\Migrate;

use Rocketeer\Plugins\Laravel\TestCases\LaravelTestCase;

class ArtisanStrategyTest extends LaravelTestCase
{
    public function testCanMigrate()
    {
        $this->pretend();

        $strategy = $this->builder->buildStrategy('Migrate', 'Artisan');
        $strategy->migrate();

        $this->assertHistory([
            [
                'cd {server}/releases/{release}',
                '{php} artisan migrate --force',
            ],
        ]);
    }

    public function testCanRunSeeds()
    {
        $this->pretend();

        $strategy = $this->builder->buildStrategy('Migrate', 'Artisan');
        $strategy->seed();

        $this->assertHistory([
            [
                'cd {server}/releases/{release}',
                '{php} artisan db:seed --force',
            ],
        ]);
    }
}
