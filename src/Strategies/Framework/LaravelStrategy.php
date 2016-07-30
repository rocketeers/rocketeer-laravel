<?php
namespace Rocketeer\Plugins\Laravel\Strategies\Framework;

use Illuminate\Support\Str;
use Rocketeer\Strategies\AbstractStrategy;
use Rocketeer\Strategies\Framework\FrameworkStrategyInterface;

class LaravelStrategy extends AbstractStrategy implements FrameworkStrategyInterface
{
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
     * Apply modifiers to some commands before
     * they're executed
     *
     * @param string $command
     *
     * @return string
     */
    public function processCommand($command)
    {
        // Add environment flag to commands
        $stage = $this->connections->getCurrentConnectionKey()->stage;
        if (Str::contains($command, 'artisan') && $stage) {
            $command .= ' --env="'.$stage.'"';
        }

        return $command;
    }
}
