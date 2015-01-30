<?php
namespace Rocketeer\Plugins\Laravel\Strategies\Framework;

use Mockery;
use Rocketeer\Console\Commands\DeployCommand;
use Rocketeer\TestCases\RocketeerTestCase;

class LaravelStrategyTest extends RocketeerTestCase
{
    /**
     * @type LaravelStrategy
     */
    protected $framework;

    public function setUp()
    {
        parent::setUp();

        $this->usesLaravel(true);
        $this->framework = $this->getFramework();
    }

    public function testCanGetName()
    {
        $this->assertEquals('laravel', $this->framework->getName());
    }

    public function testCanClearApplicationCache()
    {
        $this->pretend();

        $this->framework->clearCache();

        $this->assertHistory(array(
            array(
                'cd {server}/releases/{release}',
                '{php} artisan cache:clear'
            ),
        ));
    }

    public function testCanGetPluginConfigurationPath()
    {
        $path = $this->framework->getPluginConfigurationPath('anahkiasen/rocketeer-slack');

        $this->assertEquals($this->app['path'].'/config/packages/rocketeers/rocketeer-slack', $path);
    }

    public function testCanProcessArtisanCommands()
    {
        $this->connections->setStage('staging');

        $this->assertEquals('rm -rf foobar', $this->framework->processCommand('rm -rf foobar'));
        $this->assertEquals('artisan cache:clear --env="staging"', $this->framework->processCommand('artisan cache:clear'));
    }

    public function testCanRegisterCommands()
    {
        $command = new DeployCommand();
        $this->app['artisan'] = Mockery::mock('Artisan')->shouldReceive('add')->with($command)->once()->getMock();

        $this->framework->registerConsoleCommand($command);
    }
}
