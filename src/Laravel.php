<?php
namespace Rocketeer\Plugins\Laravel;

use Rocketeer\Services\Container\Container;
use Rocketeer\Plugins\AbstractPlugin;
use Rocketeer\Plugins\Laravel\Strategies\Framework\LaravelStrategy;

class Laravel extends AbstractPlugin
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
     * {@inheritdoc}
     */
    public function register()
    {
        $this->container->share('rocketeer.strategies.framework', function () {
            return $this->container->get(LaravelStrategy::class);
        });
    }
}
