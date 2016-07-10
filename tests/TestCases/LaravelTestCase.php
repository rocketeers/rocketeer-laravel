<?php
namespace Rocketeer\Plugins\Laravel\TestCases;

use Rocketeer\Plugins\Laravel\LaravelPlugin;
use Rocketeer\TestCases\RocketeerTestCase;

abstract class LaravelTestCase extends RocketeerTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->tasks->plugin(LaravelPlugin::class);
    }
}
