<?php
namespace Rocketeer\Plugins\Laravel;

use Illuminate\Contracts\Container\Container;
use Rocketeer\Abstracts\AbstractPlugin;

class LaravelPlugin extends AbstractPlugin
{
    /**
     * Additional lookups to
     * add to Rocketeer
     *
     * @type array
     */
    protected $lookups = array(
        'binaries'   => array(
            'Rocketeer\Plugins\Laravel\Binaries\%s',
        ),
        'strategies' => array(
            'Rocketeer\Plugins\Laravel\Strategies\%sStrategy',
        ),
    );

    /**
     * @param Container $app
     *
     * @return Container
     */
    public function register(Container $app)
    {
        $app->singleton('rocketeer.strategies.framework', 'Rocketeer\Plugins\Laravel\Strategies\Framework\LaravelStrategy');

        return $app;
    }
}
