<?php
namespace Rocketeer\Plugins\Laravel\Binaries;

use Rocketeer\Binaries\AbstractBinary;
use Rocketeer\Binaries\Php;
use Rocketeer\Container;

class Artisan extends AbstractBinary
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);

        // Set PHP as parent
        $this->setParent(new Php($this->container));
    }

    /**
     * Get an array of default paths to look for
     *
     * @return string[]
     */
    protected function getKnownPaths()
    {
        return [
            'artisan',
            $this->releasesManager->getCurrentReleasePath().'/artisan',
        ];
    }

    /**
     * Run outstranding migrations
     *
     * @return string
     */
    public function migrate()
    {
        return $this->getCommand('migrate', [], ['--force']);
    }

    /**
     * Seed the database
     *
     * @return string
     */
    public function seed()
    {
        return $this->getCommand('db:seed', [], ['--force']);
    }

    /**
     * Clear the cache
     *
     * @return string
     */
    public function clearCache()
    {
        return $this->getCommand('cache:clear');
    }
}
