<?php
namespace Rocketeer\Plugins\Laravel;

use League\Container\ContainerInterface;
use Rocketeer\Container;
use Rocketeer\Plugins\AbstractPlugin;

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
     * @param Container $app
     *
     * @return Container
     */
    public function register(Container $app)
    {
        $app->share('rocketeer.strategies.framework', function () use ($app) {
            return $app->get(\Rocketeer\Plugins\Laravel\Strategies\Framework\LaravelStrategy::class);
        });

        return $app;
    }
}
