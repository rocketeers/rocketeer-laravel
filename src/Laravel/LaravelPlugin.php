<?php
namespace Rocketeer\Plugins\Laravel;

use Rocketeer\Container;
use Rocketeer\Plugins\AbstractPlugin;
use Rocketeer\Plugins\Laravel\Strategies\Framework\LaravelStrategy;

class LaravelPlugin extends AbstractPlugin
{
    /**
     * Additional lookups to
     * add to Rocketeer
     *
     * @type array
     */
    protected $lookups = [
        'binaries' => [
            'Rocketeer\Plugins\Laravel\Binaries\%s',
        ],
        'strategies' => [
            'Rocketeer\Plugins\Laravel\Strategies\%sStrategy',
        ],
    ];

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function register(Container $container)
    {
        $container->share('rocketeer.strategies.framework', function () use ($container) {
            return $container->get(LaravelStrategy::class);
        });

        return $container;
    }
}
