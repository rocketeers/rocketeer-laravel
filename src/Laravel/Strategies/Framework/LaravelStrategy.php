<?php
namespace Rocketeer\Plugins\Laravel\Strategies\Framework;

use Illuminate\Support\Str;
use Rocketeer\Interfaces\Strategies\FrameworkStrategyInterface;
use Rocketeer\Strategies\AbstractStrategy;
use Symfony\Component\Console\Command\Command;

class LaravelStrategy extends AbstractStrategy implements FrameworkStrategyInterface
{
    /**
     * Get the name of the framework
     *
     * @return string
     */
    public function getName()
    {
        return 'laravel';
    }

    /**
     * Whether Rocketeer is used as a dependency of
     * this application or globally
     *
     * @return boolean
     */
    public function isInsideApplication()
    {
        return $this->container->has('artisan');
    }

    /**
     * Clear the application's cache
     *
     * @return void
     */
    public function clearCache()
    {
        $this->artisan()->runForCurrentRelease('clearCache');
    }

    /**
     * Register a command with the application's CLI
     *
     * @param Command $command
     *
     * @return void
     */
    public function registerConsoleCommand(Command $command)
    {
        if ($this->container->has('artisan')) {
            $this->container->get('artisan')->add($command);
        }
    }

    /**
     * Get the path to export the configuration to
     *
     * @return string
     */
    public function getConfigurationPath()
    {
        return $this->getApplicationPath().'/config/packages/anahkiasen/rocketeer';
    }

    /**
     * Get the path to export the plugins configurations to
     *
     * @param string $plugin
     *
     * @return string
     */
    public function getPluginConfigurationPath($plugin)
    {
        $path        = $this->getApplicationPath().'/config/packages/'.$plugin;
        $destination = preg_replace('/packages\/([^\/]+)/', 'packages/rocketeers', $path);

        return $destination;
    }

    /**
     * Apply modifiers to some commands before
     * they're executed
     *
     * @param string $command
     *
     * @return string
     */
    public function processCommand($command) {
        // Add environment flag to commands
        $stage = $this->connections->getCurrentConnectionKey()->stage;
        if (Str::contains($command, 'artisan') && $stage) {
            $command .= ' --env="'.$stage.'"';
        }

        return $command;
    }

    //////////////////////////////////////////////////////////////////////
    ////////////////////////////// HELPERS ///////////////////////////////
    //////////////////////////////////////////////////////////////////////

    protected function getApplicationPath()
    {
        return $this->container->has('path') ? $this->container->get('path') : $this->paths->getUserHomeFolder().'/app';
    }
}
