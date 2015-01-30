<?php
namespace Rocketeer\Plugins\Laravel\Strategies\Migrate;

use Rocketeer\Abstracts\Strategies\AbstractStrategy;
use Rocketeer\Interfaces\Strategies\MigrateStrategyInterface;

class ArtisanStrategy extends AbstractStrategy implements MigrateStrategyInterface
{
    /**
     * @type string
     */
    protected $description = 'Migrates your database with Laravel\'s Artisan CLI';

    /**
     * Whether this particular strategy is runnable or not
     *
     * @return boolean
     */
    public function isExecutable()
    {
        return (bool) $this->artisan()->getBinary();
    }

    /**
     * Run outstanding migrations
     *
     * @return boolean|null
     */
    public function migrate()
    {
        return $this->artisan()->runForCurrentRelease('migrate');
    }

    /**
     * Seed the database
     *
     * @return boolean|null
     */
    public function seed()
    {
        return $this->artisan()->runForCurrentRelease('seed');
    }
}
