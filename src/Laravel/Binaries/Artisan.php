<?php
namespace Rocketeer\Plugins\Laravel\Binaries;

use Rocketeer\Container;
use Rocketeer\Binaries\AbstractBinary;
use Rocketeer\Binaries\Php;

class Artisan extends AbstractBinary
{
    /**
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        parent::__construct($app);

        // Set PHP as parent
        $php = new Php($this->app);
        $this->setParent($php);
    }

    /**
     * Get an array of default paths to look for
     *
     * @return string[]
     */
    protected function getKnownPaths()
    {
        return array(
            'artisan',
            $this->releasesManager->getCurrentReleasePath().'/artisan',
        );
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
